<?php

namespace App\Http\Controllers;

use \App\Calendar;
use Auth;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
      $eventos = \App\Calendar::where('id_usuario', Auth::user()->id)->get();

        return view('calendario.calendar', compact('eventos'));

    }

    public function store(Request $request)
    {
      if ($request->ajax()) {

        $calendar = new Calendar;

        $calendar->id_usuario = Auth::user()->id;
        $calendar->title = $request->input('title');
        $calendar->descripcion = $request->input('descripcion');
        $calendar->start = $request->input('start')." ".$request->input('startime');
        $calendar->end = $request->input('end')." ".$request->input('endtime');
        $calendar->color = $request->input('color');
        $calendar->textcolor = $request->input('textcolor');
        $calendar->allDay = $request->input('allDay');

        $calendar->save();

        return back()->json([
          'success' => 'Cargo Bien'
        ]);



      }

    }

    public function destroy(Request $request, $id)
    {
      if ($request->ajax()) {
        $evento = Calendar::find($id);
        $evento->delete();

        return response()->json([
          'success' => 'Borrado correctamente',
        ]);
      }
    }
}
