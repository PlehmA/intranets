<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Video;
use Auth;
use App\Notify;
use App\Education;

class VideoController extends Controller
{
    public function index()
    {
        $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();
        $tutoriales = Education::all();

        return view('videos.index', compact(['notificacion', 'tutoriales']));
    }

    public function upVideos(Request $request)
    {
        return response()->json([
            'message'   =>  'Funciona el controlador.'
        ], 200);
    }
}
