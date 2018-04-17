<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Chat;
use App\User;
use Auth;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->orderBy('id', 'DESC')->where('id', '<>', Auth::user()->id)->get();
        $recieve_message = DB::table('chats')->orderBy('hora_msj', 'DESC')->where('user_recibe_id', Auth::user()->id)->get();
        $send_message = DB::table('chats')->orderBy('hora_msj', 'DESC')->where('user_envia_id', Auth::user()->id)->get();
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

        $chat = new Chat;
        $chat->user_recibe_id = $request->input('user_recibe');
        $chat->user_envia_id = $request->input('user_envia');
        $chat->mensaje = $request->input('mensaje');
        $chat->save();

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
        $users = DB::table('users')->orderBy('id', 'DESC')->where('id', '<>', Auth::user()->id)->get();
        $recieve_message = DB::table('chats')->orderBy('hora_msj', 'DESC')->where([
    ['user_recibe_id', '=', Auth::user()->id],
    ['user_envia_id', '<>', $id],
      ])->get();
        $send_message = DB::table('chats')->orderBy('hora_msj', 'DESC')->where([
         ['user_envia_id', '=', Auth::user()->id],
         ['user_recibe_id', '=', $id],
          ])->get();
          $usuario = User::findOrFail($id);
        return view('chat.show', compact(['send_message', 'users', 'recieve_message', 'usuario']));
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
