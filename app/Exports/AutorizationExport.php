<?php

namespace App\Exports;

use App\Autorization;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class AutorizationExport implements FromView
{
    use Exportable;
    
    public function __construct(int $year, int $id)
    {
        $this->year = $year;
        $this->id = $id;
    }

    public function view(): View
    {
        if(0 == $this->id){
            return view('exports.autorianual', [
                'autorianual' => Autorization::whereBetween('fecha_creacion', [$this->year.'-01-01', $this->year.'-12-31'])->get()
            ]);
            
        }else{
            return view('exports.autorianual', [
                'autorianual' => Autorization::whereBetween('fecha_creacion', [$this->year.'-01-01', $this->year.'-12-31'])
                ->where('user_id', $this->id)->get()
            ]);
            
        }
        
    }
}
