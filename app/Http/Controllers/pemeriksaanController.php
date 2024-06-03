<?php

namespace App\Http\Controllers;

use App\Models\pemeriksaanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class pemeriksaanController extends Controller
{
    public function tambah(Request $request){

//         $input = $request->all();
// // // Tampilkan seluruh input
//         dd($input);
        $halo = [
            'id_bayi' => 'required',
            'tinggi_badan' => 'required',
            'berat_badan' => 'required',
            'status_gizi' => 'required',
            'keterangan' => 'required',
            'tanggal_timbang' => 'required|date',
        ];
        

        $validasi = Validator::make($request->all(), $halo);

        // Jika validasi gagal
        if ($validasi->fails()) {
            return redirect()->route('admin_pemeriksaan')->with(Session::flash('kosong_tambah', true));
        }

        $bayi = pemeriksaanModel::create([
            'id_bayi' => $request->id_bayi,
            'tanggal_timbang' => $request->tanggal_timbang,
            'tinggi_badan' => $request->tinggi_badan,
            'berat_badan' => $request->berat_badan,
            'status_gizi' => $request->status_gizi,
            'keterangan' => $request->keterangan,
        ]);
        

        if ($bayi) {
            return redirect()->route('admin_pemeriksaan')->with(Session::flash('berhasil_tambah', true));
        } else {
            return redirect()->route('admin_pemeriksaan')->with(Session::flash('gagal_tambah', true));
        }
    }

    public function edit(Request $request, $id){
        $pemeriksaan = pemeriksaanModel::findorFAil($id);

        $pemeriksaan->tinggi_badan = $request->input('tinggi_badan');
        $pemeriksaan->berat_badan = $request->input('berat_badan');
        $pemeriksaan->status_gizi = $request->input('status_gizi');
        $pemeriksaan->keterangan = $request->input('keterangan');

        $pemeriksaan->save();
        return redirect()->route('admin_laporanpemeriksaan')->with(Session::flash('berhasil_edit', true));
    }

    public function edits(Request $request, $id){
        $pemeriksaan = pemeriksaanModel::findorFAil($id);

        $pemeriksaan->tinggi_badan = $request->input('tinggi_badan');
        $pemeriksaan->berat_badan = $request->input('berat_badan');
        $pemeriksaan->status_gizi = $request->input('status_gizi');
        $pemeriksaan->keterangan = $request->input('keterangan');

        $pemeriksaan->save();
        return redirect()->route('admin_laporanpemeriksaan')->with(Session::flash('berhasil_edit', true));
    }

    public function hapus(Request $request, $id){
        $pemeriksaan = pemeriksaanModel::findorFAil($id);

        $pemeriksaan->delete();
        return redirect()->route('admin_laporanpemeriksaan')->with(Session::flash('berhasil_hapus', true));
    }

    public function hapuss(Request $request, $id){
        $pemeriksaan = pemeriksaanModel::findorFAil($id);

        $pemeriksaan->delete();
        return redirect()->route('admin_laporanpemeriksaan')->with(Session::flash('berhasil_hapus', true));
    }
}
