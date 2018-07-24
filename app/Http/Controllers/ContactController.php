<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Agenda;
use App\Notify;
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
      $nomyap  = $request->get('name');
      $correo = $request->get('correo');
      $localidad  = $request->get('localidad');
      $direccion  = $request->get('direccion');

      $contactos = Contact::orderBy('nomyap', 'ASC')
                                                    ->nomyap($nomyap)
                                                    ->correo($correo)
                                                    ->localidad($localidad)
                                                    ->direccion($direccion)
                                                    ->paginate(15);
      $agenda = Agenda::all()
                        ->where('id_usr_agenda', Auth::user()->id);

    $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();

        return view('contact.index', compact(['contactos', 'agenda', 'notificacion']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();

        return view('contact.agregar', compact(['notificacion']));
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
    public function show($id)
    {
        $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();

        $contact = Contact::find($id);

        return view('contact.update', compact(['notificacion', 'contact']));
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
    public function update(Request $request, $id)
    {

        $contact = Contact::find($id);

        $contact->update([
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
        return back()->with('success', 'Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if($request->ajax()){
            $contact = \App\Contact::find($id);

            $contact->delete();
        }
        
    }
}
