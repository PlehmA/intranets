<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Notify;
use App\Autorization;
use DB;
use Illuminate\Http\Request;
use App\Exports\AutorizationExport;
use App\Exports\AutorizarionPerExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'ASC')->where('username', '!=', 'udemo')->get();

        $anios = DB::select('select extract(year from fecha_creacion) as fecha from autorizations group by extract(year from fecha_creacion)');

        $notificacion = Notify::where('user_recibe_id', Auth::user()->id)->where('leido', false)->get();

        return view('rrhh.report', compact(['users' , 'notificacion', 'anios']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        ### Variable de fecha sin delimitadores para poder concatenar con el nombre. ###
        $date_time = date('YmdHis');

        ### Variable que recibe del input el año de los reportes solicitados. ###
        $anio = $request->input('anioanual');

        ### Variable que recibe del input el id de los usuarios solicitados. ###
        $user_id = $request->input('user_id'); 

        return Excel::download(new AutorizationExport($anio, $user_id), 'AutorizacionAnual'.$date_time.'.xlsx');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         ### Variable de fecha sin delimitadores para poder concatenar con el nombre. ###
         $date_time = date('YmdHis');

         ### Variable que recibe del input el periodo 'DE' de los reportes solicitados. ###
         $fecha_de = $request->input('fecha_de');

         ### Variable que recibe del input el periodo 'Hasta' de los reportes solicitados. ###
         $fecha_hasta = $request->input('fecha_hasta');
 
         ### Variable que recibe del input el id de los usuarios solicitados. ###
         $user_id = $request->input('user_id'); 
 
         return Excel::download(new AutorizarionPerExport($fecha_de, $fecha_hasta, $user_id), 'AutorizacionPer'.$date_time.'.xlsx');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
