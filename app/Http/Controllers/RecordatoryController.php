<?php

namespace App\Http\Controllers;

use App\Recordatory;
use App\Calendar;
use App\User;
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


        if ($request->invitados != 0) {
            $invitado= $request->invitados;
    foreach ($invitado as $invi) {
        $user = User::find($invi);

            $recordatory = new Recordatory;

            $recordatory->id_user = $user->id;
            $recordatory->user_email = $user->email;
            $recordatory->text = $request->text;
            $recordatory->username = $user->name;
            $recordatory->notification_name = $request->notification_name;
            $recordatory->fecha_hora = $request->fecha." ".$request->hora;

            $recordatory->save();

            $event = new Calendar;
            $event->id_usuario = $user->id;
            $event->title = '* '.$request->notification_name;
            $event->descripcion = $request->text;
            $event->start = $request->fecha." ".$request->hora;
            $event->end = $request->fecha." ".$request->hora;
            $event->color = $request->recordcolor;
            $event->textcolor = '#ffffff';
            $event->allday = false;

            $event->save();
            
           }
            
        }

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
