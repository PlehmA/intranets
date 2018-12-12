<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\News;
use App\Modal;
use App\Notify;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class InicioController extends Controller
{


    public function index(Request $request)
    {
       //if(1 == $request->input('acept')){
            $ip = $_SERVER['REMOTE_ADDR'];
            $user = DB::table('users')->where('ip_maquina', $ip)->first();

           
                if ($user == "")
            {
                return view('inicioder');
            }else{
                if ($user->terminos === true) {
                $identificacion=$user->id;

                if (Auth::loginUsingId($identificacion))
                {
                    $user = User::find($identificacion);

                    $user->terminos = true;

                    $user->save();

                    $news = News::take(6)->get();
                    $modal = Modal::where('user_id', Auth::user()->id)->count();
                    $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();
                    $newsblack = News::where('new', true)->get();
                    return view('dashboard', compact('news', 'modal', 'notificacion', 'newsblack'));
                }
            }elseif (1 == $request->input('acept')) {
                $identificacion=$user->id;

                if (Auth::loginUsingId($identificacion))
                {
                    $user = User::find($identificacion);

                    $user->terminos = true;

                    $user->save();

                    $news = News::take(6)->get();
                    $modal = Modal::where('user_id', Auth::user()->id)->count();
                    $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();
                    $newsblack = News::where('new', true)->get();
                    return view('dashboard', compact('news', 'modal', 'notificacion', 'newsblack'));
                }
            }else{
                    return back()->with('error', 'Debe aceptar los terminos y condiciones');
                }
            }
           

    }

    public function show()
    {
      return view('inicioder');
    }
}
