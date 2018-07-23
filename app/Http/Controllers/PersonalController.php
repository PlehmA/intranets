<?php

namespace App\Http\Controllers;

use App\User;
use App\Notify;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();

        return view('rrhh.index', compact(['notificacion']));
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

        if ($request->hasFile('image')) {
            $request->image->storeAs('public',$request->input('username').'.jpg');

        }
        $rol = $request->input('rol_usuario');

        $puesto = DB::table('puestos')->where('id', $rol)->first();
        $password = $request->input('password');
        $enc_pass = bcrypt($password);
        if ($request->has('username', 'rol_usuario'))
        {
        DB::table('users')->insert([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'rol_usuario' => $request->input('rol_usuario'),
            'num_legajo' => $request->input('legajo'),
            'fecha_ingreso' => $request->input('fecha_ingreso'),
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
            'email' => $request->input('email'),
            'email_personal' => $request->input('email_personal'),
            'ip_maquina' => $request->input('ip_maquina'),
            'telefono_particular' => $request->input('telefono_per'),
            'telefono_celular' => $request->input('telefono_part'),
            'remember_token' => $request->input('_token'),
            'password' => $enc_pass,
            'foto' => 'storage/'.$request->input('username').'.jpg',
            'puesto' => $puesto->nombre_puesto,


        ]);

        }
        return back()->with('status1', 'Datos ingresados correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $users = DB::table('users')->paginate(20);

        $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();

        return view('rrhh.personal', ['users' => $users, 'notificacion' => $notificacion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::where('id', $id)
            ->first();

        $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();

        return view('rrhh.editar', compact('users', 'id', 'notificaciones'));
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
        $user = $request->all();
        $user->save();
        return back()->with('actualizacion', 'Actualización completa');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
