// $(function() {
//
// // page is now ready, initialize the calendar...
//
// $('#calendar').fullCalendar({
//    locale: 'es',
//    header: {
//       left: 'prev,next today',
//       center: 'title',
//       right: 'month,agendaWeek,agendaDay,listWeek'
//     },
//     editable: true,
//     eventLimit: true, // allow "more" link when too many events
//     navLinks: true,
//    events: [
//     {
//       title:  'Reunion loca(llevar faso)',
//       start:  '2018-05-16',
//       end: '2018-50-20',
//       description: 'This is a cool event',
//     }
//     // other events here...
//   ],
//   timeFormat: 'H(:mm)', // uppercase H for 24-hour clock
//   monthNames: [
//     'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
//   'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
//   ],
//   displayEventTime: true,
// })
//
// });
$(document).ready(function() {

		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();

		var calendar = $('#calendar').fullCalendar({
      locale: 'es',
      monthNames: [
         'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
        'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
        ],
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay,listWeek'
			},
			selectable: true,
			selectHelper: true,
        eventRender: function(event, element){
          element.popover({
              animation:true,
              delay: 300,
              content: '<b>Inicio</b>:'+event.start+"<b>Fin</b>:"+event.end,
              trigger: 'hover'
          });
        },
			select: function(start, end, allDay) {
				var title = prompt('Nombre del evento:');
				if (title) {
					calendar.fullCalendar('renderEvent',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay
						},
						true // make the event "stick"
					);
				}
				calendar.fullCalendar('unselect');
			},
			editable: true,
			events: [
				{
					title: 'All Day Event',
					start: new Date(y, m, 1)
				},
				{
					title: 'Long Event',
					start: new Date(y, m, d-5),
					end: new Date(y, m, d-2)
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d-3, 16, 0),
					allDay: false
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d+4, 16, 0),
					allDay: false
				},
				{
					title: 'Meeting',
					start: new Date(y, m, d, 10, 30),
					allDay: false
				},
				{
					title: 'Lunch',
					start: new Date(y, m, d, 12, 0),
					end: new Date(y, m, d, 14, 0),
					allDay: false
				},
				{
					title: 'Birthday Party',
					start: new Date(y, m, d+1, 19, 0),
					end: new Date(y, m, d+1, 22, 30),
					allDay: false
				},
				{
					title: 'Click for Google',
					start: new Date(y, m, 28),
					end: new Date(y, m, 29),
					url: 'https://google.com/'
				}
			]
		});

	});
