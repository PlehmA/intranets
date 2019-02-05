<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notify;
use Auth;
use App\Template;
use App\Puesto;
use Illuminate\Support\Facades\Storage;

class TemplateController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();
    $plantillas = Template::where('rol_usuario', Auth::user()->rol_usuario)->get();
      return view('plantillas.index', compact(['notificacion', 'plantillas']));
  }

  public function create()
  {
    $puestos = Puesto::all();
    $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();

    return view('plantillas.create', compact(['puestos', 'notificacion']));
  }

  public function store(Request $request)
  {
    // return $imageName = $request->titulo.'.png';
    // return $request->file('plantilla');
    // return $request->file('plantilla')->getClientOriginalName();
    // dd($request);

    if($request->hasFile('plantilla')){
      try{
        
        $imageName = $request->file('foto')->getClientOriginalName();

        $filename = $request->file('plantilla')->getClientOriginalName();

        $foto = $request->foto->storeAs('plantillas/images', $imageName, 'public');
        
        $plantilla = $request->plantilla->storeAs('plantillas', $filename, 'public');

        $plantilla = Template::create([
            'rol_usuario'    =>  $request->rol_usuario,
            'foto'    =>  Storage::url('plantillas/images/'.$imageName),
            'enlace'     =>  Storage::url('plantillas/'.$filename),
            'titulo' => $request->titulo
        ]);

      }catch (Exception $e) {

        return back()->with('success', 'Excepción capturada: '.$e->getMessage(). "\n");

        }
        return back()->with('success', 'Carga finalizada exitosamente.');
    }else {
        return back()->with('success', 'Por favor cargue una plantilla.');
    }
  }
}
