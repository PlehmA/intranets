<?php

namespace App\Http\Controllers;

use App\News;
use App\Modal;
use Auth;
use App\Notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $news = News::orderBy('id', 'DESC')->paginate(7);

        $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();

        return view('novedades.index', compact(['notificacion', 'news']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();

        return view('novedades.create', compact(['notificacion']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if($request->hasFile('foto')){
          try{
            $noticiaid = News::orderBy('id', 'DESC')->first();
            
            $imageName = 'imagen'.($noticiaid->id+1).'.png';
            
            $foto = $request->foto->storeAs('images', $imageName, 'public');

            $news = News::create([
                'titulo'    =>  $request->input('titulo'),
                'cuerpo'    =>  $request->input('cuerpo'),
                'atajo'     =>  $request->input('atajo'),
                'fecha_noticia' => date('Y-m-d'),
                'foto'      =>  $imageName
            ]);

            Modal::truncate();

          }catch (Exception $e) {

            return back()->with('success', 'Excepción capturada: '.$e->getMessage(). "\n");

            }
            return back()->with('success', 'Carga finalizada exitosamente.');
        }else {
            return back()->with('success', 'Por favor cargue una foto.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);

        $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();

        return view('novedades.show', compact(['notificacion', 'news']));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);

        $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();

        return view('novedades.editar', compact(['notificacion', 'news']));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {      
        $news = News::find($id);
        
        if($request->hasFile('foto')){
            $imageName = 'imagen'.($news->id).'.png';
            $foto = $request->foto->storeAs('images', $imageName, 'public');
        }
        $news->atajo = $request->input('atajo');
        $news->titulo = $request->input('titulo');

        $news->cuerpo = $request->input('cuerpo');

        $news->save();

        return back()->with('success', 'Actualizado correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if($request->ajax()){

            $news = News::find($id);
            
            $file = Storage::delete('public/images/'.$news->foto);

            $news->delete();

 

            return response()->json([
              'success' => 'Borrado correctamente'
            ]);

        }
    }
}
