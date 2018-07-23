<?php

namespace App\Http\Controllers;

use App\Officewriter;
use App\Notify;
use Auth;
use Illuminate\Http\Request;

class OfficewriterController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $wroffice = Officewriter::where('id_programa', 2)->paginate(1);
      $wrmenu   = Officewriter::where('id_programa', 2)->get();
      $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();

      return view('tutos.officewr', compact(['wroffice', 'wrmenu', 'notificacion']));
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
     * @param  \App\tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function show(Tutorial $tutorial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function edit(Tutorial $tutorial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tutorial $tutorial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tutorial $tutorial)
    {
        //
    }
}
