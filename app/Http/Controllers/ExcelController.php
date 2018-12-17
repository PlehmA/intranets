<?php

namespace App\Http\Controllers;

use App\Excel;
use Auth;
use App\Notify;
use Illuminate\Http\Request;

class ExcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wroffice = Excel::where('id_programa', 6)->paginate(1);
        $wrmenu   = Excel::where('id_programa', 6)->get();
        $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();
  
        return view('tutos.excel', compact(['wroffice', 'wrmenu', 'notificacion']));
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
     * @param  \App\Excel  $excel
     * @return \Illuminate\Http\Response
     */
    public function show(Excel $excel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Excel  $excel
     * @return \Illuminate\Http\Response
     */
    public function edit(Excel $excel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Excel  $excel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Excel $excel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Excel  $excel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Excel $excel)
    {
        //
    }
}
