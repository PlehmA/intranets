<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\Notify;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    public function login(Request $request)
    {
      $username = $request->input('username');
      $password = $request->input('password');

      $user = User::where('username', $username)->where('password', $password)->count();


      if ($user >= 1) {

        $usuario = User::where('username', $username)->where('password', $password)->first();
        $notificacion = Notify::where('user_recibe_id', $usuario->id)->where('leido', false)->get();
        Auth::loginUsingId($usuario->id);



         return view('dashboard', compact(['notificacion']));
      }
      // $credentials = $this->validate(request(), [
      //   'username' => 'required|string',
      //   'password' => 'required|string'
      // ]);
      //
      // if(Auth::attempt($credentials))
      // {
      //   $user= User::where($credentials)
      //   ->get();
      //   return 'hola';
      //   // return redirect()->route('dashboard', compact('user'));
      // }
      //   $user= User::where($credentials)
      //       ->count();

        if($user == 0)
        {
          return redirect('inicioder')->with('errorses', 'Usuario y/o Contraseña incorrectos.');
        }


    }
    public function showLoginForm()
    {
        return view('/welcome');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('login');
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
