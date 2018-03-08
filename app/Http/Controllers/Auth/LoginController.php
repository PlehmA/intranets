<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;


class LoginController extends Controller
{
    public function login()
    {
        $credentials = $this->validate(request(), [
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($credentials))
        {
            return redirect()->route('dashboard');
        }
        return back()
            ->withErrors(['username' => trans('auth.failed')])
            ->withInput(request(['username']));
    }
}
