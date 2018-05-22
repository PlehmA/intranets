<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
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
    public function index(Request $request)
    {
      $nomyap  = $request->get('nomyap');
      $correo = $request->get('correo');
      $localidad  = $request->get('localidad');

      $contactos = Contact::orderBy('nomyap', 'ASC')
                                                    ->nomyap($nomyap)
                                                    ->correo($correo)
                                                    ->localidad($localidad)
                                                    ->paginate(15);
        return view('contact.index', compact(['contactos']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.agregar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $contact = new Contact;

      $contact->id_usuario = Auth::user()->id;
      $contact->nomyap = $request->nomyap;
      $contact->correo = $request->correo;
      $contact->direccion = $request->direccion;
      $contact->provincia = $request->provincia;
      $contact->partido = $request->partido;
      $contact->localidad = $request->localidad;
      $contact->tellinea = $request->tellinea;
      $contact->telcel = $request->telcel;
      $contact->interno = $request->interno;

      $contact->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
