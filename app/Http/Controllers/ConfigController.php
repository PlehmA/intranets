<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;


/**
 * Class ConfigController
 * @package App\Http\Controllers
 */
class ConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('configuracion');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      if ($request->ajax()) {
        if (bcrypt($request->input('verifyPass')) == Auth::user()->password ) {
          if ($request->input('newPass') == $request->input('confirmPass')) {
            $input = $request->input('newPass');

             $hashedinput = bcrypt($input);
             DB::table('users')
                 ->where('id', Auth::user()->id)
                 ->update(['password' => $hashedinput]);
             return response()->json([ 'success' => 'Contraseña modificada correctamente!' ]);
          }else {
            return response()->json([ 'error' => 'Las contraseñas no coinciden' ]);
          }
        }else {
          return response()->json([ 'error' => 'Contraseña incorrecta' ]);
        }

      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
