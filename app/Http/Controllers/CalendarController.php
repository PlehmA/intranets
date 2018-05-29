<?php

namespace App\Http\Controllers;

use \App\Calendar;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
      $eventos = \App\Calendar::all();

        return view('calendario.calendar', compact('eventos'));
    }

    public function show()
    {
      $events = \App\Calendar::all();

      return response()->json();
    }
}
