<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Chat;
use App\User;
use App\Notify;
use Auth;
use App\Notifications\MessageSent;
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
        $users = DB::table('users')->orderBy('id', 'ASC')->where('id', '<>', Auth::user()->id)->get();

        $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();

        return view('chat.index', compact('users', 'notificacion'));
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

        $user_envia = $request->input('user_envia');
        $user_recibe  = $request->input('user_recibe');
        $user_envia_name = $request->input('user_envia_name');
        $mensaje = $request->input('mensaje');
        date_default_timezone_set('America/Argentina/Buenos_Aires');

        DB::table('users')->where('id', Auth::user()->id)->update(['ult_mensaje' => $mensaje]);

      $message =  Chat::create([
          'user_envia_id' => $user_envia,
          'user_recibe_id' => $user_recibe,
          'user_envia_name' => $user_envia_name,
          'mensaje' => $mensaje,
          'hora_msj' => date('Y-m-d H:i:s'),
        ]);

        $notifie = Notify::create([
            'user_envia_id'     => Auth::user()->id,
            'user_recibe_id'    => $request->input('user_recibe'),
            'leido'             => false
        ]);
    

        return back();


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
        $lastmessage = DB::table('chats')->where('user_recibe_id', Auth::user()->id)
                                                                  ->where('user_envia_id', $usuario->id)
                                                                  ->orderBy('hora_msj', 'DESC')
                                                                  ->first();
        $readMessage = Notify::where('user_envia_id', $id)
                                ->where('user_recibe_id', Auth::user()->id)
                                ->update(['leido' => true]);

        $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();
        

       return view('chat.show', compact(['users', 'messages', 'usuario', 'lastmessage', 'notificacion']));


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
