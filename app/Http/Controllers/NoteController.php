<?php

namespace App\Http\Controllers;

use App\Note;
use Auth;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $notas = Note::where('id_usuario', Auth::user()->id)->get();
        return view('notes.index', compact('notas'));
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
        $notas = new Note;

        $notas->nombre_nota = $request->input('nombre_nota');
        $notas->id_usuario = Auth::user()->id;

        $notas->save();

        return back()->with('success', 'Nota creada');
      } catch (Exception $e) {
        return back()->with('eror', 'No se pudo crear la nota');
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nota = Note::findOrFail($id);
        $notas = Note::all()->where('id_usuario', Auth::user()->id);

        return view('notes.show', compact(['nota', 'notas']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
      $notas = Note::find($note);

      $notas->nota = 'New Flight Name';

      $notas->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
      if ($request->ajax()) {
        $notas = Note::find($note);

        $notas->delete();

        return response()->json([
          'success' => 'Borrado correctamente'
        ]);
      }

    }
}
