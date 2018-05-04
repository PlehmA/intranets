<?php

namespace App\Http\Controllers;

use App\Directory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DirectoryController extends Controller
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
    public function index(Request $request)
    {
      $name  = $request->get('name');
      $email = $request->get('email');
      $area  = $request->get('area');

      $usuarios = User::orderBy('id', 'ASC')
                                            ->name($name)
                                            ->email($email)
                                            ->area($area)
                                            ->paginate(15);
        return view('directorio.index', compact(['usuarios']));
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
     * @param  \App\Directory  $directory
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      $contactos = DB::table('directories')->get();
        return view('directorio.index2', compact(['contactos']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Directory  $directory
     * @return \Illuminate\Http\Response
     */
    public function edit(Directory $directory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Directory  $directory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Directory $directory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Directory  $directory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Directory $directory)
    {
        //
    }
}
