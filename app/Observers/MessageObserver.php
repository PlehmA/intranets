<?php

namespace App\Observers;
use App\Message;
use App\User;
use App\Events\MessageSent;

class MessageObserver
{
  
    public function created(Message $message)
    {

        $conversation = User::where('id', $message->from_id)->first();

        if($conversation){
            $conversation->ult_mensaje = "$conversation->name: $message->content";
            $conversation->hora_msj = $message->created_at;
            $conversation->save();
        }

        $conversation = User::where('id', $message->to_id)->first();

        if($conversation){
            $conversation->ult_mensaje = "Tú: $message->content";
            $conversation->hora_msj = $message->created_at;
            $conversation->save();
        }
       event(new MessageSent($message));
    }

}