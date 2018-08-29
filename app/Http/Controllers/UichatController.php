<?php

namespace App\Http\Controllers;

use App\Uichat;
use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Notify;
use App\Events\ChatEvent;

class UichatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();

        return view('uichat.index', compact('notificacion'));
    }

   /* public function send(Request $request){

        $user = User::find(Auth::user()->id);

        event(new ChatEvent($request->message, $user));
    } */

    public function send(){

        $message = 'Hello';

        $user = User::find(Auth::user()->id);

        event(new ChatEvent($message, $user));
    }

}
