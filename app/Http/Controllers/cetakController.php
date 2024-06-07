<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class cetakController extends Controller
{
    public function cetakimunisasis(){
        
            $widthInCm = 9;
        $widthInPoints = $widthInCm * 28.3465;
    
            $pdf = PDF::loadview('cetakimunisasi')
                    ->setPaper('A4', 'portrait');
                    
            return $pdf->stream('nota_antrian.pdf');
        }

    public function cetakimunisasi(){
        
            $widthInCm = 9;
        $widthInPoints = $widthInCm * 28.3465;
    
            $pdf = PDF::loadview('cetakimunisasi')
                    ->setPaper('A4', 'portrait');
                    
            return $pdf->stream('nota_antrian.pdf');
        }

    public function cetakpemeriksaan(){
        
            $widthInCm = 9;
        $widthInPoints = $widthInCm * 28.3465;
    
            $pdf = PDF::loadview('cetakimunisasi')
                    ->setPaper('A4', 'portrait');
                    
            return $pdf->stream('nota_antrian.pdf');
        }
}
