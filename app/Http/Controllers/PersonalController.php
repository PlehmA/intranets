<?php

namespace App\Http\Controllers;

use App\User;
use App\Notify;
use Auth;
use App\Puesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonalController extends Controller
{

    public function __construct(){

        $this->middleware('auth');

      }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'ASC')->where('id', '<>', Auth::user()->id)->paginate(6);

        $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();

        return view('rrhh.personal', compact(['users' , 'notificacion' ]));
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

       //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        $puesto = Puesto::find($user->rol_usuario);

        $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();

        return view('rrhh.editar', compact(['user' , 'notificacion', 'puesto']));
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
        $user = User::find($id);

        $user->update([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'puesto' => $request->input('puesto'),
            'num_legajo' => $request->input('num_legajo'),
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
            'email' => $request->input('email'),
            'email_personal' => $request->input('email_personal'),
            'telefono_celular' => $request->input('telefono_celular'),
            'cuil' => $request->input('cuil'),
            'telefono_particular' => $request->input('telefono_particular'),
            'ip_maquina' => $request->input('ip_maquina'),
            'interno' => $request->input('interno'),
        ]);

        return back()->with('success', 'Usuario actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $user = User::find($id);
    
            $user->delete();
    
            return response()->json([
              'success' => 'Borrado correctamente'
            ]);
          }
    }
}
