<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\Columna;
use App\Contact;
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
        // $agendas = Agenda::all()
        //                   ->where('id_usr_agenda', Auth::user()->id);
        //
        // return view('directorio.agendapers', compact('agendas'));
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
      $input = $request->input("checkOk");
      $inputagenda = $request->input("id_agenda");
      $nombre_agenda = $request->input("nombre_agenda");

     $query = Contact::whereIn('id', $input)->get();

     foreach ($query as $qq) {
       $columna = new Columna;

       $columna->nomyap = $qq->nomyap;
       $columna->correo = $qq->correo;
       $columna->direccion = $qq->direccion;
       $columna->provincia = $qq->provincia;
       $columna->partido = $qq->partido;
       $columna->localidad = $qq->localidad;
       $columna->tellinea = $qq->tellinea;
       $columna->telcel = $qq->telcel;
       $columna->interno = $qq->interno;
       $columna->id_agenda = $inputagenda;
       $columna->id_usuario = Auth::user()->id;
       $columna->nombre_agenda = $nombre_agenda;

       $columna->save();

       return back()->with('success', 'Registro cargado exitosamente');

     }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*$userAgenda = Agenda::where('id_usr_agenda', $id)
                            ->where('nombre_agenda', $agenda)
                            ->get();*/
        $agenda  = Agenda::all()
                          ->where('id_usr_agenda', Auth::user()->id)
                          ->where('id', $id);

        $agendas = Agenda::all()
                          ->where('id_usr_agenda', Auth::user()->id);

        $datos   = Columna::where('id_usuario', Auth::user()->id)
                                 ->where('id_agenda', $id)
                                 ->paginate(10);


      // if ($agendas->id_usr_agenda != Auth::user()->id) {
        return view('directorio.agendapers', compact(['agenda', 'agendas', 'datos', 'contactos']));
      //
      // }else{
      //   return redirect('directorio')->with('error', 'Usted no tiene permiso para chusmear en esa agenda');
      // }
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
    public function update(Request $request, $id)
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
