<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Conversation;
use App\Message;
use App\Events\NewMessage;
use App\Notify;
use Illuminate\Support\Facades\DB;
use App\Friend;

class ContactsController extends Controller
{

    public function __construct()
  {
    $this->middleware('auth');
  }
  
    public function get()
    {
        $contacts = Friend::where('amigo_de', Auth::user()->id)->where('username', '<>', Auth::user()->username)
        ->orderBy('updated_at', 'DESC')
        ->get();

        // $usuario = User::find(39);

        // Friend::create([
        //     'name'  =>  $usuario->name,
        //     'amigo_de'  =>  40,
        //     'id_user'   =>  $usuario->id,
        //     'username'  =>  $usuario->username,
        //     'rol_usuario'   =>  $usuario->rol_usuario,
        //     'num_legajo'    =>  $usuario->num_legajo,
        //     'fecha_ingreso' =>  $usuario->fecha_ingreso,
        //     'fecha_nacimiento'  =>  $usuario->fecha_nacimiento,
        //     'puesto'    =>  $usuario->puesto,
        //     'email' =>  $usuario->email,
        //     'email_personal'    =>  $usuario->email_personal,
        //     'ip_maquina'    =>  $usuario->ip_maquina,
        //     'foto'  =>  $usuario->foto,
        //     'telefono_particular'   =>  $usuario->telefono_particular,
        //     'telefono_celular'  =>  $usuario->telefono_celular,
        //     'estado'    =>  $usuario->estado,
        //     'interno'   =>  $usuario->interno,
        // ]);

        return response()->json($contacts);
    }

    public function getMessagesFor($id)
    {
        $messages = Message::where(function ($q) use ($id){
            $q->where('from', $id)
                ->where('to', Auth::user()->id);
        })->orWhere(function ($q) use ($id){
            $q->where('to', $id)
                ->where('from', Auth::user()->id);
        })->get();

        $readMessage = Notify::where('user_envia_id', $id)
                                ->where('user_recibe_id', Auth::user()->id)
                                ->update(['leido' => true]);

        return response()->json($messages);
    }
    
    public function send(Request $request)
    {
        $req=$request->all();
        //dd($request->all());
        $message = Message::create([
            'from'  => Auth::user()->id,
            'to'    => $req['contact_id'],
            'text'  => $req['text']
        ]);
        $conv = Conversation::where('from', Auth::user()->id)->first();
        if($conv){
            $conv->last_message = $req['text'];

            $conv->save();
        }else{
            $conversation = Conversation::create([
                'from'              => Auth::user()->id,
                'to'                => $req['contact_id'],
                'last_message'      => $req['text'],
                'last_time'         => date('Y-m-d H:i:s'),
                
            ]);
        }
        

    $mensajeFrom = Friend::where('amigo_de', Auth::user()->id)
                            ->where('id_user', $req['contact_id'])
                            ->update([
                                'ult_mensaje'   =>  $req['text'],
                                'from'          =>  Auth::user()->id,
                                'to'            =>  $req['contact_id']
                            ]);
    $mensajeFrom = Friend::where('amigo_de', $req['contact_id'])
                        ->where('id_user', Auth::user()->id)
                        ->update([
                            'ult_mensaje'   =>  $req['text'],
                            'from'          =>  Auth::user()->id,
                            'to'            =>  $req['contact_id']
                        ]);


        $notifie = Notify::create([
            'data'              => $req['text'],
            'user_envia_id'     => Auth::user()->id,
            'user_recibe_id'    => $req['contact_id'],
            'leido'             => false
        ]);

        return response()->json($message);
      //  return ['status' => 'Message Sent!'];
    }
    public function readed($id)
    {
        $estado = Notify::where('user_envia_id', $id)
                        ->where('user_recibe_id', Auth::user()->id)
                        ->update(['leido' => true]);

            return response()->json($estado);
    }
}
