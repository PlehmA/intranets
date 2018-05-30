<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Agenda;
use Auth;
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
      $agenda = Agenda::all()
                        ->where('id_usr_agenda', Auth::user()->id);
        return view('contact.index', compact(['contactos', 'agenda']));
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
      if ($request->isMethod('post')) {

      $nomyap = $request->input('nomyap');
      $correo = $request->input('correo');
      $direccion = $request->input('direccion');
      $provincia = $request->input('provincia');
      $partido = $request->input('partido');
      $localidad = $request->input('localidad');
      $tellinea = $request->input('tellinea');
      $telcel = $request->input('telcel');
      $interno = $request->input('interno');

      \App\Contact::create([
        'id_usuario' => Auth::user()->id,
        'nomyap'     => $nomyap,
        'correo'     => $correo,
        'direccion'  => $direccion,
        'provincia'  => $provincia,
        'partido'    => $partido,
        'localidad'  => $localidad,
        'tellinea'   => $tellinea,
        'telcel'     => $telcel,
        'interno'    => $interno

      ]);
        }

        return back()->with('add', 'Contacto agregado');

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
        $contact = \App\Contact::find();
    }
}
