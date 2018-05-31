<?php

namespace App\Http\Controllers;

use App\Columna;
use Auth;
use Illuminate\Http\Request;

class ColumnaController extends Controller
{
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
    public function show(Columna $columna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Columna  $columna
     * @return \Illuminate\Http\Response
     */
    public function edit(Columna $columna)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Columna  $columna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Columna $columna)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Columna  $columna
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      try {
        
        $columna = Columna::find($id);

        $columna = delete();

        return back()->with('success', 'Contacto borrado exitosamente');

      } catch (Exception $e) {

        return back()->with('error', 'No se pudo borrar el contacto. Error: '.$e->getMessage());

      }



    }
}
