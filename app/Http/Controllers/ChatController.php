<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Chat;
use App\User;
use Auth;
use Illuminate\Http\Request;

class ChatController extends Controller
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
        $users = DB::table('users')->orderBy('id', 'DESC')->where('id', '<>', Auth::user()->id)->get();

        return view('chat.index', compact(['send_message', 'users', 'recieve_message']));
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
      if ($request->ajax()) {
        $user_envia = $request->input('user_envia');
        $user_recibe  = $request->input('user_recibe');
        $user_envia_name = $request->input('user_envia_name');
        $mensaje = $request->input('mensaje');
        date_default_timezone_set('America/Argentina/Buenos_Aires');

        \App\Chat::create([
          'user_envia_id' => $user_envia,
          'user_recibe_id' => $user_recibe,
          'user_envia_name' => $user_envia_name,
          'mensaje' => $mensaje,
          'hora_msj' => date('Y-m-d H:i:s'),
        ]);

        return back();
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::findOrFail($id);
        $users = DB::table('users')->orderBy('id', 'ASC')->where('id', '<>', Auth::user()->id)->get();
        $messages = DB::table('chats')->orderBy('hora_msj', 'ASC')->whereIn('user_recibe_id', [Auth::user()->id, $usuario->id])
                                                                  ->whereIn('user_envia_id',[Auth::user()->id, $usuario->id])
                                                                  ->get();

          return response()->json(compact(['users', 'messages', 'usuario']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
