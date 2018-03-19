<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    public function login()
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
        }else{
            return back()
                ->withErrors(['username' => trans('auth.failed')])
                ->withInput(request(['username']));
        }

    }
}
