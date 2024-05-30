<?php

namespace App\Http\Controllers;

use App\Models\imunisasiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class imunisasiController extends Controller
{
    public function tambah(Request $request){

        //         $input = $request->all();
        // // // Tampilkan seluruh input
        //         dd($input);
                $halo = [
                    'id_bayi' => 'required',
                    'imunisasi' => 'required',
                    'vitamin' => 'required',
                    'keterangan' => 'required',
                    'tanggal_imunisasi' => 'required|date',
                ];
                
                
        
                $validasi = Validator::make($request->all(), $halo);
        
                // Jika validasi gagal
                if ($validasi->fails()) {
                    return redirect()->route('admin_imunisasi')->with(Session::flash('kosong_tambah', true));
                }
        
                $bayi = imunisasiModel::create([
                    'id_bayi' => $request->id_bayi,
                    'tanggal_imunisasi' => $request->tanggal_imunisasi,
                    'jenis_imunisasi' => $request->imunisasi,
                    'jenis_vitamin' => $request->vitamin,
                    'keterangan' => $request->keterangan,
                ]);

                
        
                if ($bayi) {
                    return redirect()->route('admin_imunisasi')->with(Session::flash('berhasil_tambah', true));
                } else {
                    return redirect()->route('admin_imunisasi')->with(Session::flash('gagal_tambah', true));
                }
            }

            public function edit(Request $request, $id){
                $imunisasi = imunisasiModel::findorFAil($id);
        
                $imunisasi->jenis_imunisasi = $request->input('jenis_imunisasi');
                $imunisasi->jenis_vitamin = $request->input('jenis_vitamin');
                $imunisasi->keterangan = $request->input('keterangan');
        
                $imunisasi->save();
                return redirect()->route('admin_laporanimunisasi')->with(Session::flash('berhasil_edit', true));
            }

            public function hapus(Request $request, $id){
                $imunisasi = imunisasiModel::findorFAil($id);
        
                $imunisasi->delete();
                return redirect()->route('admin_laporanimunisasi')->with(Session::flash('berhasil_hapus', true));
            }
}
