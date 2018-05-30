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
        Agenda::create([
          'nombre_agenda' => $nombre_agenda,
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
    public function show($agenda)
    {
      if ($agenda != Auth::user()->id) {
        // code...

        /*$userAgenda = Agenda::where('id_usr_agenda', $id)
                            ->where('nombre_agenda', $agenda)
                            ->get();*/
        $agendas = Agenda::all()
                          ->where('id_usr_agenda', Auth::user()->id);
        return view('directorio.agendapers', compact(['userAgenda', $agenda, 'agendas']));
      }else{
        return redirect('directorio')->with('error', 'Usted no tiene permiso para chusmear en esa agenda');
      }
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
