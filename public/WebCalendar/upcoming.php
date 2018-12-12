<?php
/* $Id: upcoming.php,v 1.82.2.15 2013/01/07 16:42:11 cknudsen Exp $
 *
 * Description:
 * Show a list of upcoming events (and possibly tasks).
 *
 * This script is intended to be used outside of normal WebCalendar
 * use, typically as an iframe in another page.
 *
 * You must have public access enabled in System Settings to use this
 * page (unless you modify the $public_must_be_enabled setting below
 * in this file).
 *
 * Typically, this is how you would reference this page from another:
 *
 * <iframe height="250" width="300"
 *  scrolling="yes" src="upcoming.php"></iframe>
 *
 * By default (if you do not edit this file), events for the public
 * calendar will be loaded for either:
 *   - the next 30 days
 *   - the next 10 events
 *
 * The output of this page conforms to the hCalendar standard for events.
 * You can read more about hCalendar at:
 *  http://microformats.org/wiki/hcalendar
 *
 * Input parameters:
 * You can override settings by changing the URL parameters:
 *   - days: number of days ahead to look for events
 *   - cat_id: specify a category id to filter on
 *   - user: login name of calendar to display (instead of public
 *     user), if allowed by System Settings. You must have the
 *     following System Settings configured for this:
 *       Allow viewing other user's calendars: Yes
 *       Public access can view others: Yes
 *   - tasks: specify a value of '1' to show just tasks (if permitted
 *       by system settings and config settings below). This will
 *       show only tasks and not show any events.
 *   - showTitle (boolean, set to 1 or 0) whether the page title is shown or not
 *   - upcoming_title: The page title to print. There is a default but this overrides it.
 *     Of course it will only be printed if showTitle so indicates.
 *   - showMore (boolean, set to 1 or 0) whether "more" at the end is shown or not,
 *         with a link to your main calendar page
 *   - showTime ((boolean, set to 1 or 0) whether the event time should be shown
 *
 * if calling as an include file can pre-set these variables in your PHP file
 * before including upcoming.php (you can't use URL parameters when calling
 * an include file). Remember that after debugging you can use @include to suppress
 * PHP warnings.
 *     $numDays               default 30
 *     $cat_id                default ALL
 *     $username              default __public__
 *     $maxEvents             default 10
 *     $showTasks bool        default true
 *     $showTitle bool        default false
 *     $upcoming_title        default "Upcoming Events"
 *     $showMore bool         default true
 *     $showTime bool         default false
 *     $showPopups bool       default true
 *     $hcalendar_output bool default false
 *
 * To do: Cache results, used cached results mostly, only update occasionally. This
 * is pretty simple to do and greatly speeds up the include file if you have a large
 * calendar.
 *
 * Security:
 * TBD
 */

//only go through the requires & includes & function declarations once,
// in case upcoming.php is included twice on one page
//this trick allows the upcoming events to be displayed twice on one page
//(perhaps with different parameters) without causing problems if
if ( empty ($upcoming_initialized)) {
  $upcoming_initialized=true;
//The following lines allow this include file to be called from another directory
//it saves the current working directory (to be restored just before exiting)
//and then changes the working directory to the dir that this file is currently
//in. That allows this file to load its includes normally even if called
//from some other directory.
$save_current_working_dir= getcwd ();
chdir(dirname(__FILE__));

include_once 'includes/translate.php';
require_once 'includes/classes/WebCalendar.class';
require_once 'includes/classes/Event.class';
require_once 'includes/classes/RptEvent.class';

$WebCalendar = new WebCalendar ( __FILE__ );

include 'includes/config.php';
include 'includes/dbi4php.php';
include 'includes/formvars.php';
include 'includes/functions.php';

$WebCalendar->initializeFirstPhase ();

include 'includes/' . $user_inc;
include 'includes/site_extras.php';

//set default hCalendar but allow it to be overridden
//this will include hidden values that can gleaned by hCalendar
// clients
$hcalendar_output = getGetValue ( 'hcalendar_output' );
if ( empty ( $hcalendar_output ) )
  $hcalendar_output = false;

//added to support hCalendar
if ( $hcalendar_output )
 include 'includes/xcal.php';

$WebCalendar->initializeSecondPhase ();
//This must contain the file name that this file is saved under. It is
//used to determine whether the file is being run independently or
//as an include file. Change as necessary!
//Note that if you use any other name than "upcoming.php" you must
//also change the corresponding line in includes/classes/WebCalendar.class, about
//line 54, like this:
//    '/^(nulogin|login|freebusy|publish|register|rss|upcoming|upcoming-.*|week_ssi|minical|controlpanel)\.php$/' =>
//Using upcoming-.* allows you to use names like upcoming-1.php, upcoming-2.php etc.
//if you want have different upcoming-*.php files with variants.

$name_of_this_file='/upcoming.php/';

//echo "$showTitle $showMore $maxEvents $numDays $cat_id<p>";

load_global_settings ();

$error = '';

// Make sure 'Upcoming Events' is enabled in System Settings.
if ( empty ( $UPCOMING_EVENTS ) || $UPCOMING_EVENTS != 'Y' ) {
  $error = print_not_auth ();
}

$WebCalendar->setLanguage ();

// Print the details of an upcoming event
// This function is here, inside the 'if' that runs only the first time this
// file is included within an external document, so that the function isn't
// declared twice in case of this file being included twice or more within the same doc.
function print_upcoming_event ( $e, $date ) {
  global $display_link, $link_target, $SERVER_URL, $charset, $login,
    $display_tzid, $showTime, $showPopups, $eventinfo, $username,
    $hcalendar_output, $UPCOMING_DISPLAY_CAT_ICONS;

  $popupid = 'pop' . $e->getId () . '-' . $date;

  $private = $confidential = false;
  // Access: P=Public, R=Private, C=Confidential
  if ( $e->getAccess () == 'R' ) {
    // not a public event, so we will just display "Private"
    $private = true;
  }
  else if ( $e->getAccess () == 'C' ) {
    // not a public event, so we will just display "Confidential"
    $confidential = true;
  }

  if ( ! empty ( $SERVER_URL ) && ! $private && ! $confidential) {
    echo "<div class=\"vevent\">\n";
      if ( $display_link ) {
        if ( $showPopups ) {
          $timestr = '';
          if ( $e->isAllDay () ) {
            $timestr = translate ( 'All day event' );
          } else if ( $e->getTime () >= 0 ) {
            $timestr = display_time ( $e->getDatetime () );
            if ( $e->getDuration () > 0 ) {
              $timestr .= ' - ' . display_time ( $e->getEndDateTime () );
            }
          }
          $eventinfo .= build_entry_popup ( 'eventinfo-' . $popupid, $username,
            $e->getDescription (), $timestr, site_extras_for_popup ( $e->getId () ),
            $e->getLocation (), $e->getName (), $e->getId () );
        }
        $link = "<a class=\"entry\" id=\"$popupid\" title=\"" .
          htmlspecialchars ( $e->getName () ) . '" href="' .
          $SERVER_URL . 'view_entry.php?id=' .
          $e->getID () . "&amp;date=$date&amp;user=" . $e->getLogin ();
        if ( ! empty ( $link_target ) ) {
          $link .= "\" target=\"$link_target\"";
        }
        $link .= '>';
        if ( empty ( $UPCOMING_DISPLAY_CAT_ICONS ) ||
          $UPCOMING_DISPLAY_CAT_ICONS != 'N' ) {
          $catNum = abs ( $e->getCategory () );
          if ( $catNum > 0 ) {
            $catIcon = 'icons/cat-' . $catNum . '.gif';
            if ( file_exists ( $catIcon ) )
              echo $link .
                '<img src="' . $catIcon . '" alt="category icon" border="0"/></a>';
      }
    }
    echo $link;
    }
  }
  if ( $private ) {
    echo '[' . translate ( 'Private' ) . ']';
  } else if ( $confidential ) {
    echo '[' . translate ( 'Confidential' ) . ']';
  } else {
    echo '<span class="summary">' . htmlspecialchars ( $e->getName () ) . '</span>';
  }
  if ( $display_link && ! empty ( $SERVER_URL ) && ! $private ) {
    echo '</a>';
  }

  //added for hCalendar
  if ( $hcalendar_output ) {
    echo '<abbr class="dtstart" title="'. export_ts_utc_date ($e->getDateTimeTS () )
      .'">' . $e->getDateTime () . "</abbr>\n";
    echo '<abbr class="dtend" title="'. export_ts_utc_date ($e->getEndDateTimeTS () )
      . '">' . $e->getEndDateTimeTS () . "</abbr>\n";
    echo '<span class="description">' . $e->getDescription () . "</span>\n";
    if ( strlen ( $e->getLocation () ) > 0 )
    echo '<span class="location">' . $e->getLocation () . "</span>\n";
    $categories = get_categories_by_id ( $e->getId (), $username );
    $category = implode ( ', ', $categories);
    if ( strlen ( $category  ) > 0 )
      echo '<span class="categories">' . $category . "</span>\n";
    if ( strlen ( $e->getUrl () ) > 0 )
      echo '<span class="url">' . $e->getUrl () . "</span>\n";
    $rrule = export_recurrence_ical( $e->getId () );
    if ( strlen ( $rrule ) > 6 )
      echo '<span class="rrule">' . substr ( $rrule, 6 ) . "</span>\n";
  }

  if ( $showTime ) {  //show event time if requested (default=don't show)
    if ( $e->isAllDay () ) {
      echo ' (' . translate ( 'All day event' ) . ")\n";
    } else if ( $e->getTime () != -1 ) {
      echo ' (' . display_time ( $e->getDateTime (), $display_tzid ) . ")\n";
    }
  }

  echo "</div>\n";

 }  //end function

} //end condition initialization

/*
 *
 * Configurable settings for this file. You may change the settings
 * below to change the default settings.
 * This settings will likely move into the System Settings in the
 * web admin interface in a future release.
 *
 */

// Set this to false if you still want to access this page even
// though you do not have public access enabled.
// Set this to true to require public access enabled for this page to
// function at all.
$public_must_be_enabled = false;

// Do we include a link to view the event?  If so, what target
// should we use.
$display_link = ( empty ( $UPCOMING_DISPLAY_LINKS ) ||
  $UPCOMING_DISPLAY_LINKS == 'Y' );
$link_target = '_top';

// Default time window of events to load
// Can override with "upcoming.php?days=60"
//bhugh, 1/28/2006, if(empty and !== false constructions allow these vars to be passed
//from another php program in case upcoming.php is called as an include file
//(you can't pass ?days=60 type parameters when you use include)
$numDays = getIntValue ( 'numDays' );
if (empty ($numDays))  $numDays = 30;
$showTitle = ( getGetValue ( 'showTitle', "[01]", true ) == '1' );
$showTitle = ( ! empty ( $showTitle ) && $showTitle !== false ? true : false );
$showMore = getGetValue ( 'showMore', "[01]", true );
$showMore = ( ! empty ( $showMore ) && $showMore !== false ? true : false );
$showTime = getGetValue ( 'showTime', "[01]", true );
$showTime = ( ! empty ( $showTime ) && $showTime !== false ? true : false );

//sets the URL used in the (optional) page title and
//(optional) "...more" tag at the end. If you want them to
//go to a different URL you can specify that here.
$title_more_url=$SERVER_URL;

//set default upcoming title but allow it to be overridden
$upcoming_title = getValue ( 'upcoming_title' );
if (empty ($upcoming_title)) $upcoming_title= '<a href="'.
   $title_more_url . '">Upcoming Events</a>';

//echo "$numDays $showTitle $maxEvents <p>";

// Max number of events (including tasks) to display
$maxEvents = getIntValue ( 'maxEvents' );
if (empty ($maxEvents)) $maxEvents = 10;

// Should we include tasks?
// (Only relavant if tasks are enabled in system settings AND enabled for
// display in calendar view for this user. So, this is really
// a way to disable tasks from showing up. It will not display
// them if specified user has not enabled "Display tasks in Calendars"
// in their preferences.)
$showTasks = getValue ( 'showTasks' );
if ( empty ( $showTasks ) ) $showTasks = false;

// Show event popups
$showPopups = ( empty ( $UPCOMING_DISPLAY_POPUPS ) ||
  $UPCOMING_DISPLAY_POPUPS == 'Y' );
if ( getGetValue ( 'showPopups' ) != '' ) {
  $showPopups = ( getGetValue ( 'showPopups', "[01]", true ) != '0' );
}

// Allow the URL to override the user setting such as
// "upcoming.php?user=craig"
$allow_user_override = ( ! empty ( $UPCOMING_ALLOW_OVR ) &&
  $UPCOMING_ALLOW_OVR == 'Y' );

// Load layers
$load_layers = ( ! empty ( $UPCOMING_DISPLAY_LAYERS ) &&
  $UPCOMING_DISPLAY_LAYERS == 'Y' );

// Load just a specified category (by its id)
// Leave blank to not filter on category (unless specified in URL)
// Can override in URL with "upcoming.php?cat_id=4"
$cat_id = getIntValue ( 'cat_id' );

// Display timezone abbrev name
// 1 = Display all times as GMT wo/TZID
// 2 = Adjust times by user's GMT offset Show TZID
// 3 = Display all times as GMT w/TZID
$display_tzid = 2;

// End configurable settings...

// Login of calendar user to use
// '__public__' is the login name for the public user
$username = '__public__';
if ( $allow_user_override ) {
  $username = getValue ( 'user' );
  if (empty ($username)) $username = '__public__';
} else {
  if ( getValue ( 'user' ) != '' ) {
    $error = print_not_auth ();
  }
}


// Set for use elsewhere as a global
$login = $username;
// Load user preferences for DISPLAY_UNAPPROVED
load_user_preferences ();

if ( $public_must_be_enabled && $PUBLIC_ACCESS != 'Y' ) {
  $error = print_not_auth (21);
}

if ( $error == '' ) {
  if ( $allow_user_override ) {
    $u = getValue ( 'user', "[A-Za-z0-9_\.=@,\-]+", true );
    if ( ! empty ( $u ) ) {
      $username = $u;
      $login = $u;
      $TIMEZONE = get_pref_setting ( $username, 'TIMEZONE' );
      $DISPLAY_UNAPPROVED = get_pref_setting ( $username, 'DISPLAY_UNAPPROVED' );
      $DISPLAY_TASKS_IN_GRID =
        get_pref_setting ( $username, 'DISPLAY_TASKS_IN_GRID' );
      // We also set $login since some functions assume that it is set.
    }
  }

  $get_unapproved = ( ! empty ( $DISPLAY_UNAPPROVED ) && $DISPLAY_UNAPPROVED == 'Y' );

  if ( $CATEGORIES_ENABLED == 'Y' ) {
    $x = getValue ( 'cat_id', '-?[0-9]+', true );
    if ( ! empty ( $x ) ) {
      $cat_id = $x;
    }
  }

    $x = getGetValue ( 'upcoming_title', true );
    if ( ! empty ( $x ) ) {
      $upcoming_title = $x;
    }

    $x = getGetValue ( 'showMore', true );
    if ( strlen(  $x ) > 0 ) {
      $showMore= $x;
    }

    $x = getGetValue ( 'showTime', true );
    if ( strlen(  $x ) > 0 ) {
      $showTime= $x;
    }

    $x = getGetValue ( 'showTitle', true );
    if ( strlen(  $x ) > 0 ) {
      $showTitle = $x;
    }

  if ( $load_layers ) {
    load_user_layers ( $username );
  }

  //load_user_categories ();

  // Calculate date range
  $date = getValue ( 'date', '-?[0-9]+', true );
  if ( empty ( $date ) || strlen ( $date ) != 8 ) {
    // If no date specified, start with today
    $date = date ( 'Ymd' );
  }
  $thisyear = substr ( $date, 0, 4 );
  $thismonth = substr ( $date, 4, 2 );
  $thisday = substr ( $date, 6, 2 );

  $startDate = mktime ( 0, 0, 0, $thismonth, $thisday, $thisyear );

  $x = getValue ( 'days', '-?[0-9]+', true );
  if ( ! empty ( $x ) ) {
    $numDays = $x;
  }
  // Don't let a malicious user specify more than 365 days
  if ( $numDays > 365 ) {
    $numDays = 365;
  }
  $endDate = mktime ( 23, 59, 59, $thismonth, $thisday + $numDays,
    $thisyear );

  // If 'showEvents=0' is in URL, then just include tasks in list
  $show_events = getGetValue ( 'showEvents', "[01]", true );
  $tasks_only = ( $show_events == '0' );

  if ( $tasks_only ) {
    $repeated_events = $events = array ();
  } else {

    /* Pre-Load the repeated events for quckier access */
    $repeated_events = read_repeated_events ( $username, $startDate, $endDate, $cat_id );

    /* Pre-load the non-repeating events for quicker access */
    $events = read_events ( $username, $startDate, $endDate, $cat_id );
  }

  // Pre-load tasks for quicker access */
  if ( ( ( empty ( $DISPLAY_TASKS_IN_GRID ) || $DISPLAY_TASKS_IN_GRID == 'Y' ) )
    || $showTasks ) {
    /* Pre-load tasks for quicker access */
    $tasks = read_tasks ( $username, $endDate, $cat_id );
  }
}

// Determine if this script is being called directly, or via an include.
if ( empty ( $PHP_SELF ) && ! empty ( $_SERVER ) &&
  ! empty ( $_SERVER['PHP_SELF'] ) ) {
  $PHP_SELF = $_SERVER['PHP_SELF'];
}
// If called directly print  header stuff.
if ( ! empty ( $PHP_SELF ) && preg_match ( $name_of_this_file, $PHP_SELF ) ) {
// Print header without custom header and no style sheet.
echo send_doctype ( generate_application_name () );

?>
<!-- This style sheet is here mostly to make it easier for others
     to customize the appearance of the page.
     In the not too distant future, the admin UI will allow configuration
     of the stylesheet elements on this page.
-->
<style type="text/css">
body {
  background-color: #ffffff;
}
dt {
  font-family: arial,helvetica;
  font-weight: bold;
  font-size: 12px;
  color: #000000;
}
dd {
  font-family: arial,helvetica;
  color: #3030a0;
  font-size: 12px;
}
a {
  font-family: arial,helvetica;
  color: #3030a0;
}
a:hover {
  font-family: arial,helvetica;
  color: #ffffff;
  background-color: #3030a0;
}
.popup {
  color: #ffffff;
  background-color: #3030a0;
  text-decoration: none;
  position: absolute;
  z-index: 20;
  visibility: hidden;
  top: 0px;
  left: 0px;
  border: 1px solid #000000;
  padding: 3px;
}
.popup dl {
  margin: 0px;
  padding: 0px;
}
.popup dt {
  font-size: 10px;
  font-weight: bold;
  margin: 0px;
  padding: 0px;
  color: #ffffff;
}
.popup dd {
  font-size: 10px;
  margin-left: 20px;
  color: #ffffff;
}
.dtstart,
.dtend,
.description,
.location,
.categories,
.url,
.rrule {
  visibility:hidden;
}
</style>

<?php
if ( ! empty ( $showPopups ) && empty ( $error ) ) {
  echo '<script type="text/javascript" src="includes/js/util.js"></script>' . "\n";

  echo '<script type="text/javascript">' . "\n";
  include_once 'includes/js/popups.php';
  echo "</script>\n";
}
?>
</head>
<body>
<?php } //end test for direct call

if ( ! empty ( $error ) ) {
  echo print_error ( $error );
  echo "</body></html>";

  //restore previous working directory before exit
  if (strlen($save_current_working_dir)) chdir($save_current_working_dir);

  exit;
}

if ($showTitle) echo '<h3 class="cal_upcoming_title">'. translate ($upcoming_title) . '</h3>';
?>

<div class="vcalendar">
<?php
echo "<dl>\n";

echo "<!-- \nstartTime: $startDate\nendTime: $endDate\nstartDate: " .
  "$date\nnumDays: $numDays\nuser: $username\nevents: " .
  count ( $events ) . "\nrepeated_events: " .
  count ( $repeated_events ) . " -->\n";

$eventinfo = '';
$numEvents = 0;
$endDateYmd = date ( 'Ymd', $endDate );
for ( $i = $startDate; date ( 'Ymd', $i ) <= $endDateYmd &&
  $numEvents < $maxEvents; $i += ONE_DAY ) {
  $d = date ( 'Ymd', $i );
  $entries = get_entries ( $d, $get_unapproved );
  $rentries = get_repeating_entries ( $username, $d, $get_unapproved );
  $ev = combine_and_sort_events ( $entries, $rentries );
  $tentries = get_tasks ( $d, $get_unapproved );
  $ev = combine_and_sort_events ( $ev, $tentries );
  $ev_cnt = count ( $ev );

  echo "<!-- $d " . count ( $ev ) . " -->\n";

  if ( $ev_cnt > 0 ) {
    echo "<!-- XXX -->\n";
    //print "<dt>" . date_to_str ( $d,  translate ( '__month__ __dd__' ), true, true ) . "</dt>\n<dd>";
    echo '<dt>' . date_to_str ( $d ) . "</dt>\n<dd>";
    for ( $j = 0; $j < $ev_cnt && $numEvents < $maxEvents; $j++ ) {
      print_upcoming_event ( $ev[$j], $d );
      $numEvents++;
    }
    echo "</dd>\n";
  }
}

echo "</dl>\n";

if ( $showMore ) echo '<center><i><a href="'. $title_more_url . '"> . . . ' .
   translate ( 'more' ) . '</a></i></center>';
?>
</div>
<?php
echo $eventinfo;
if ( ! empty ( $PHP_SELF ) && preg_match ( $name_of_this_file, $PHP_SELF ) ) {
  echo "</body>\n</html>";
}

//restore previous working directory before exit
if (strlen($save_current_working_dir)) chdir($save_current_working_dir);

?>
