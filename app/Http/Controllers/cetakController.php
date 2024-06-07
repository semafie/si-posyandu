<?php

namespace App\Http\Controllers;

use App\Models\pemeriksaanModel;
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

    public function cetakimunisasi(Request $request){
        $pemerikasaan = pemeriksaanModel::where('tanggal', $request->tanggalprint);
        

            $widthInCm = 9;
        $widthInPoints = $widthInCm * 28.3465;
    
            $pdf = PDF::loadview('cetakimunisasi',[
                'pemeriksaan' => $pemerikasaan,
                'tanggal' => $request->tanggalprint
            ])
                    ->setPaper('A4', 'portrait');
                    
            return $pdf->stream('nota_antrian.pdf');
        }

    public function cetakpemeriksaan(Request $request){
        $pemerikasaan = pemeriksaanModel::where('tanggal_timbang', $request->tanggalprint)->with('bayi')->get();
            $widthInCm = 9;
        $widthInPoints = $widthInCm * 28.3465;
    
            $pdf = PDF::loadview('cetakpemeriksaan',[
                'pemeriksaan' => $pemerikasaan,
                'tanggal' => $request->tanggalprint
            ])
                    ->setPaper('A4', 'portrait');
                    
            return $pdf->stream('nota_antrian.pdf');
        }
}
