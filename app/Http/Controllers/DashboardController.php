<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Notify;
use App\Modal;
use App\News;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();
        $modal = Modal::where('user_id', Auth::user()->id)->count();
        $news = News::take(4)->orderBy('id', 'DESC')->get();
        $newsblack = News::where('new', true)->get();
        return view('dashboard', compact(['notificacion', 'modal', 'news', 'newsblack']));
    }

}
