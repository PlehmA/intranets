<?php

namespace App\Http\Controllers;

use App\Columna;
use App\Contact;
use App\Agenda;
use App\Notify;
use Auth;
use Illuminate\Http\Request;

class ColumnaController extends Controller
{
  public function __construct()
    {
      $this->middleware('auth');

      //dd(app('request'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      try {
        $columna = new Columna;

        $columna->nomyap = $request->nomyap;
        $columna->correo = $request->correo;
        $columna->direccion = $request->direccion;
        $columna->partido = $request->partido;
        $columna->localidad = $request->localidad;
        $columna->provincia = $request->provincia;
        $columna->tellinea = $request->tellinea;
        $columna->telcel = $request->telcel;
        $columna->interno = $request->interno;
        $columna->nombre_agenda = $request->nombre_agenda;
        $columna->id_agenda = $request->id_agenda;
        $columna->id_usuario = Auth::user()->id;

        $columna->save();

        return  back()->with('success', 'Contacto creado correctamente');
      } catch (Exception $e) {
        return  back()->with('error', 'Error: '.$e->getMessage());
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Columna  $columna
     * @return \Illuminate\Http\Response
     */
    public function show(Columna $columna, $id)
    {
      $contactos = Contact::orderBy('nomyap', 'ASC')->paginate(15);

      $agenda  = Agenda::all()
                        ->where('id_usr_agenda', Auth::user()->id)
                        ->where('id', $id);

      $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();

      return view('directorio.agragext', compact('contactos', 'agenda', 'notificacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Columna  $columna
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $coledit = Columna::where('id', $id)->get();

      return view('directorio.update', compact('coledit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Columna  $columna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $idAgenda = $request->input('agendaId');

        $columna1 = Columna::find($id);

        $columna1->update([
          'nomyap'    => $request->input('nomyap'),
          'correo'    => $request->input('correo'),
          'direccion' => $request->input('direccion'),
          'partido'   => $request->input('partido'),
          'localidad' => $request->input('localidad'),
          'provincia' => $request->input('provincia'),
          'tellinea'  => $request->input('tellinea'),
          'telcel'    => $request->input('telcel'),
          'interno'   => $request->input('interno')
        ]);
        // $columna1->nomyap = $request->input('nomyap');
        // $columna1->correo = $request->input('correo');
        // $columna1->direccion = $request->input('direccion');
        // $columna1->partido = $request->input('partido');
        // $columna1->localidad = $request->input('localidad');
        // $columna1->provincia = $request->input('provincia');
        // $columna1->tellinea = $request->input('tellinea');
        // $columna1->telcel = $request->input('telcel');
        // $columna1->interno = $request->input('interno');
        //
        // $columna1->save();

        return back()->with('success', 'Registro actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Columna  $columna
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
      if ($request->ajax()) {
        $columna = Columna::find($id);
        $columna->delete();

        return response()->json([
          'success' => 'El contacto fue eliminado con éxito'
        ]);
      }
    }
}
