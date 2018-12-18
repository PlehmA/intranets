<?php

namespace App\Http\Controllers;

use App\Recordatory;
use App\Calendar;
use Auth;
use Illuminate\Http\Request;


class RecordatoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request){
        $recordatory = new Recordatory;

        $recordatory->id_user = $request->id_user;
        $recordatory->user_email = $request->user_email;
        $recordatory->text = $request->text;
        $recordatory->username = $request->username;
        $recordatory->notification_name = $request->notification_name;
        $recordatory->fecha_hora = $request->fecha." ".$request->hora;

        $recordatory->save();


        $event = new Calendar;
        $event->id_usuario = Auth::user()->id;
        $event->title = '* '.$request->notification_name;
        $event->descripcion = $request->text;
        $event->start = $request->fecha." ".$request->hora;
        $event->end = $request->fecha." ".$request->hora;
        $event->color = $request->recordcolor;
        $event->textcolor = '#ffffff';
        $event->allday = false;

        $event->save();


        return back();
    }
}
