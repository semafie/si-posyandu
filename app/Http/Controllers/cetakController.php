<?php

namespace App\Http\Controllers;

use App\Models\imunisasiModel;
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
        $imunisasi = imunisasiModel::where('tanggal_imunisasi', $request->tanggalprint)->get();
        

            $widthInCm = 9;
        $widthInPoints = $widthInCm * 28.3465;
    
            $pdf = PDF::loadview('cetakimunisasi',[
                'imunisasi' => $imunisasi,
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
