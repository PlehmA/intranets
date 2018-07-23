<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notify;
use Auth;

class TemplateController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();

      return view('plantillas.index', compact(['notificaciones']));
  }
}
