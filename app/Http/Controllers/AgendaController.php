<?php

namespace App\Http\Controllers;

use App\Agenda;
use Auth;
use Illuminate\Http\Request;

class AgendaController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    try {
      
      $nombre_agenda = $request->input('nombre_agenda');
      $col1 = $request->input('col1');
      $col2 = $request->input('col2');
      $col3 = $request->input('col3');
      $col4 = $request->input('col4');
      $col5 = $request->input('col5');
      $col6 = $request->input('col6');
      $col7 = $request->input('col7');
      $col8 = $request->input('col8');
      $col9 = $request->input('col9');

        Agenda::create([
          'nombre_agenda' => $nombre_agenda,
          'col1' => $col1,
          'col2' => $col2,
          'col3' => $col3,
          'col4' => $col4,
          'col5' => $col5,
          'col6' => $col6,
          'col7' => $col7,
          'col8' => $col8,
          'col9' => $col9,
          'id_usr_agenda' => Auth::user()->id
        ]);

        return back()->with('success', 'Agenda creada correctamente.');
    } catch (Exception $e) {
      return back()->with('error', 'Error: '.$e->getMessage());
    }


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
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        //
    }
}
