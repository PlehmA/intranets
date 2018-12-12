<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Providers\BroadcastServiceProvider;
use App\Events\MessageSent;


class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $myId = Auth::user()->id;
        $contactId = $request->contact_id;
        return Message::select(
            'id',
            DB::raw("CASE WHEN from_id=$myId THEN TRUE ELSE FALSE END as written_by_me"),      
            'created_at',
            'content')->where(function($query) use ($myId, $contactId){
                $query->where('from_id', $myId)->where('to_id', $contactId);
            })->orWhere(function($query) use ($myId, $contactId){
                $query->where('from_id', $contactId)->where('to_id', $myId);
            })->get();
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
        

        $message            = new Message();
        $message->from_id   = Auth::user()->id;
        $message->to_id     = $request->to_id;
        $message->content   = $request->content;
        $saved = $message->save();

        $data=[];
        $data['success'] = $saved;

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
