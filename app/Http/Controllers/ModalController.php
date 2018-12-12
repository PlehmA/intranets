<?php

namespace App\Http\Controllers;

use App\Modal;
use App\User;
use App\News;
use Auth;
use Illuminate\Http\Request;

class ModalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $modal = Modal::where('user_id', Auth::user()->id)->count();

        
       if(0 == $modal){
         
        Modal::create([
            'user_id'=> Auth::user()->id,
            'readed'=> true,
            'readed_time'=> date('Y-m-d H:i:s')
        ]);
        News::where('new', true)->update(['new' => false]);
        $modal = Modal::where('user_id', Auth::user()->id)->count();
            return redirect('dashboard');
       }elseif(1 >= $modal){
          Modal::where('user_id', Auth::user()->id)
                    ->update([
                        'readed' => true,
                    ]);

                    $modal = Modal::where('user_id', Auth::user()->id)->count();
           return redirect('dashboard');
       }else{
        $modal = Modal::where('user_id', Auth::user()->id)->count();
           return redirect('dashboard');
       }
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modal  $modal
     * @return \Illuminate\Http\Response
     */
    public function show(Modal $modal)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modal  $modal
     * @return \Illuminate\Http\Response
     */
    public function edit(Modal $modal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modal  $modal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modal $modal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modal  $modal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modal $modal)
    {
        //
    }
}
