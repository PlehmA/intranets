<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notify;
use Auth;

class MailController extends Controller
{
    public function index()
    {
        $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();

        return view('mail.index', compact(['notificacion']));
    }
}
