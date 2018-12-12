<?php

namespace App\Http\Controllers;

use App\Organig;
use App\Notify;
use Auth;
use Illuminate\Http\Request;

class OrganigController extends Controller
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
        $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();

        return view('organigrama.index', compact(['notificacion']));
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
     * @param  \App\Organig  $organig
     * @return \Illuminate\Http\Response
     */
    public function show(Organig $organig)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Organig  $organig
     * @return \Illuminate\Http\Response
     */
    public function edit(Organig $organig)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organig  $organig
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organig $organig)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Organig  $organig
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organig $organig)
    {
        //
    }
}
