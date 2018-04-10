<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $this->validate(request(), [
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        if(Auth::attempt($credentials))
        {
            $user= DB::table('users')
                ->where($credentials)
                ->get();

            return redirect()->route('dashboard', compact('user'));
        }

        $user= DB::table('users')
            ->where($credentials)
            ->count();

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
