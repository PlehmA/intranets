<?php

namespace App\Exports;

use App\Autorization;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class AutorizarionPerExport implements FromView
{
    use Exportable;
    
    public function __construct($fecha_de, $fecha_hasta, int $id)
    {
        $this->fecha_de = $fecha_de;
        $this->fecha_hasta = $fecha_hasta;
        $this->id = $id;
    }

    public function view():View
    {
        if(0 == $this->id){
            return view('exports.autorianual', [
                'autorianual' => Autorization::whereBetween('fecha_creacion', [$this->fecha_de, $this->fecha_hasta])->get()
            ]);
          
        }else{
            return view('exports.autorianual', [
                'autorianual' => Autorization::whereBetween('fecha_creacion', [$this->fecha_de, $this->fecha_hasta])
                ->where('user_id', $this->id)->get()
            ]);
            
        }
        
    }
}
