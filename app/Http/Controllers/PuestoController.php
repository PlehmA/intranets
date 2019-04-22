<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Puesto;
use App\Notify;
use Auth;

class PuestoController extends Controller
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

            $cantPuesto = Puesto::all()->count();

            Puesto::create([
                'nombre_puesto' => $request->nombre_puesto
            ]);

            toastr()->success('Creado correctamente.');

            return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();
        $puesto = Puesto::find($id);

        return view('andres.edit', compact(['notificacion', 'puesto']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $puesto = Puesto::find($id);

            $puesto->nombre_puesto = $request->nombre_puesto;
    
            $puesto->save();

            toastr()->success('Actualizado correctamente.');

            return back();

        } catch (Throwable $th) {
            
            toastr()->danger($th);

            return back();

        }
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $puesto = Puesto::find($id);

        $puesto->delete();

        toastr()->success('Eliminado Correctamente.');

        return back();
    }
}
