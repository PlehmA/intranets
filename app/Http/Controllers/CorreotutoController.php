<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Notify;

class CorreotutoController extends Controller
{
    public function index()
    { 
        $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();
        return view('tutos.correo', compact(['notificacion']));
    }
}
