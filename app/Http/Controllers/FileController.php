<?php

namespace App\Http\Controllers;

use App\File;
use Auth;
use App\Notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $archivos = File::all();
        $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();
        return view('novedades.files', compact(['notificacion', 'archivos']));
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
        

        // $path = Storage::disk('public')->put('imgnovedades', $request->archivo);
        // $url = Storage::url($path);
        //$size = Storage::size($path);


        $request->validate([
            'archivo' => 'required',
            'archivo.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
            foreach($request->archivo as $linea){

                $path = Storage::disk('public')->put('imgnovedades', $linea);
                
                $imagen = new File;

                $imagen->nombre = $path;

                $imagen->nomImagen = $request->nomImagen;

                $imagen->url = 'https://intranet.odontopraxis.com.ar:9003'.Storage::url($path);

                $imagen->tamanio = Storage::size('public/'.$path);

                $imagen->save();

            }
       return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $archivo = File::find($id);
        $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();
        return view('novedades.filecreate', compact('notificacion', 'archivo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $archivo = File::find($id);

        $archivo->nomImagen = $request->nombreurl;

        $archivo->save();

        return back()->with('success', 'Editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $archivo = File::find($id);

        $archivo->delete();

        return back()->with('success', 'Borrado correctamente');
    }
}
