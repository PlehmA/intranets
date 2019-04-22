<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Education;
use App\Notify;
use Auth;

class EducationController extends Controller
{
    public function imageUp(Request $request)
    {
        if ($request->hasFile('imgPortada')) {
            $imageName = sha1(md5(base64_encode($request->imgPortada))) . ".png";

            $request->imgPortada->storeAs('tutoriales/images', $imageName, 'public');
    
            Education::create([
                'name'  =>  $request->nombreTuto,
                'image' =>  'tutoriales/images/'.$imageName
            ]);
            toastr()->success($request->nombreTuto.' cargado correctamente.');
            
            return back();
        }

        toastr()->warning('Necesita cargar una imagen primero');

       return back();
    }

    public function toEdit($id)
    {
        $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();
        $tutorial = Education::find($id);

        return view('andres.showedu', compact(['tutorial', 'notificacion']));
    }

    public function educatUpdate(Request $request, $id)
    {
        $nombreImg = str_replace('tutoriales/images/', "", $request->imgName);

        if ($request->hasFile('newImage')) {
            $request->newImage->storeAs('tutoriales/images', $nombreImg, 'public');
        }

        $tutorial = Education::find($id);

        $tutorial->name = $request->nombreTuto;

        $tutorial->save();
        toastr()->success($request->nombreTuto.' modificado correctamente.');
        return back();
    }

    public function destructionEdu($id)
    {
        $tutorial = Education::find($id);

        $videos = Video::where('id_tuto', $id)->count();

        if ($videos >= 1) {
            toastr()->danger('No puede borrar el tutorial porque hay videos cargados.');
            return back();
        }
        $nombreImg = str_replace('tutoriales/images/', "", $tutorial->image);

        Storage::disk('public')->delete($tutorial->image);

        $tutorial->delete();

        toastr()->success('Tutorial eliminado correctamente.');

        return back();
    }

}
