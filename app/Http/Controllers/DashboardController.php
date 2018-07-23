<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Notify;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();

        return view('dashboard', compact(['notificacion']));
    }


}
