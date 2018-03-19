<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InicioController extends Controller
{


    public function index()
    {

            $ip = $_SERVER['REMOTE_ADDR'];
            $user = DB::table('users')->where('ip_maquina', $ip)->first();
            if ($user == "")
            {
                return view('inicioder');
            }else{
                $identificacion=$user->id;

                if (Auth::loginUsingId($identificacion))
                {
                    Session::put('ip', $ip);

                    return redirect()->route('dashboard');
                }
            }


    }
}
