<?php

namespace App\Http\Controllers;

use Auth;
use App\Notify;
use App\Puesto;
use App\User;
use App\Friend;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Schema;
// use Illuminate\Database\Schema\Blueprint;

class AddPersController extends Controller
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
        $puesto = Puesto::all();

        $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();

        return view('rrhh.index', compact(['puesto' , 'notificacion' ]));

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
        
       $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:60|unique:users',
            'rol_usuario' => 'required|integer|max:20',
            'num_legajo' => 'required|integer',
            'fecha_nacimiento' => 'nullable|date',
            'email' => 'nullable|email|max:80',
            'email_personal' => 'nullable|email|max:80',
            'telefono_celular' => 'nullable|integer',
            'cuil' => 'nullable|integer',
            'telefono_particular' => 'nullable|integer',
            'ip_maquina' => 'nullable|ip',
            'interno' => 'nullable|integer',

        ]);

        $puesto = Puesto::find($request->input('rol_usuario'));

         User::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'rol_usuario' => $request->input('rol_usuario'),
            'num_legajo' => $request->input('num_legajo'),
            'fecha_ingreso' => date('Y-m-d'),
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
            'email' => $request->input('email'),
            'email_personal' => $request->input('email_personal'),
            'ip_maquina' => $request->input('ip_maquina'),
            'telefono_particular' => $request->input('telefono_per'),
            'telefono_celular' => $request->input('telefono_part'),
            'password' => 'Odonto$Praxi$13A',
            'puesto' => $puesto->nombre_puesto,
            'cuil' => $request->input('cuil'),
            'interno' => $request->input('interno'),
            'contra_mail' => 'nada'
        ]);

        $user = User::orderBy('id', 'desc')->first();

        $userId = User::select('id', 'name', 'username', 'rol_usuario', 'num_legajo', 'fecha_ingreso', 'puesto', 'foto', 'password', 'terminos')->orderBy('id', 'asc')->get();

        foreach ($userId as $usersId) {

            Friend::create([
                        'id_user' => $user->id,
                        'amigo_de' => $usersId->id,
                        'name'  =>  $usersId->name,
                        'username'  =>  $usersId->username,
                        'rol_usuario'   =>  $usersId->rol_usuario,
                        'num_legajo'    =>  $usersId->num_legajo,
                        'fecha_ingreso' =>  $usersId->fecha_ingreso,
                        'puesto'    =>  $usersId->puesto,
                        'foto'  =>  $usersId->foto,
                        'password'  =>  $usersId->password,
                        'terminos'  =>  $usersId->terminos
                    ]);

        }

    Friend::where('id_user', $user->id)->where('amigo_de', $user->id)->delete();

    return back()->with('success', 'Usuario cargado exitosamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::find($id);

        $usuario->delete();

        Friend::where('id_user', $id)->delete();

        return back()->with('success', 'Usuario eliminado correctamente.');
    }

    public function crearTabla(){

        try {
           
            return 'Tabla creada';
        } catch (\Throwable $th) {
            return $th;
        }
        return 'Tabla terminada 2';
    }
}
