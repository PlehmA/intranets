<?php

namespace App\Http\Controllers;

use App\Onedrive;
use App\Notify;
use Auth;
use Illuminate\Http\Request;

class OnedriveController extends Controller
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

        $onedrive = Onedrive::where('id_programa', 5)->paginate(1);
        $odmenu   = Onedrive::where('id_programa', 5)->get();

        $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();

        return view('tutos.onedrive', compact(['notificacion', 'onedrive', 'odmenu']));

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
     * @param  \App\Onedrive  $onedrive
     * @return \Illuminate\Http\Response
     */
    public function show(Onedrive $onedrive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Onedrive  $onedrive
     * @return \Illuminate\Http\Response
     */
    public function edit(Onedrive $onedrive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Onedrive  $onedrive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Onedrive $onedrive)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Onedrive  $onedrive
     * @return \Illuminate\Http\Response
     */
    public function destroy(Onedrive $onedrive)
    {
        //
    }
}
