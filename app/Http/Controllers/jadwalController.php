<?php

namespace App\Http\Controllers;

use App\Models\jadwalModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class jadwalController extends Controller
{
    public function tambah(Request $request){

        $halo = [
            'nama_posyandu' => 'required',
            'wilayah_desa' => 'required',
            'nama_bidan' => 'required',
            'hari' => 'required',
            'tanggal' => 'required|date',
        ];
        
        // dd($request->all());
        

        $validasi = Validator::make($request->all(), $halo);

        // Jika validasi gagal
        if ($validasi->fails()) {
            return redirect()->route('admin_jadwal')->with(Session::flash('kosong_tambah', true));
        }

        $jadwal = jadwalModel::create([

            'nama_posyandu' => $request->nama_posyandu,
            'wilayah_desa' => $request->wilayah_desa,
            'nama_bidan' => $request->nama_bidan,
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,

        ]);

        

        if ($jadwal) {
            return redirect()->route('admin_jadwal')->with(Session::flash('berhasil_tambah', true));
        } else {
            return redirect()->route('admin_jadwal')->with(Session::flash('gagal_tambah', true));
    }
}
    public function tambahs(Request $request){

        $halo = [
            'nama_posyandu' => 'required',
            'wilayah_desa' => 'required',
            'nama_bidan' => 'required',
            'hari' => 'required',
            'tanggal' => 'required|date',
        ];
        
        // dd($request->all());
        

        $validasi = Validator::make($request->all(), $halo);

        // Jika validasi gagal
        if ($validasi->fails()) {
            return redirect()->route('admin_kepala_jadwal')->with(Session::flash('kosong_tambah', true));
        }

        $jadwal = jadwalModel::create([

            'nama_posyandu' => $request->nama_posyandu,
            'wilayah_desa' => $request->wilayah_desa,
            'nama_bidan' => $request->nama_bidan,
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,

        ]);

        

        if ($jadwal) {
            return redirect()->route('admin_kepala_jadwal')->with(Session::flash('berhasil_tambah', true));
        } else {
            return redirect()->route('admin_kepala_jadwal')->with(Session::flash('gagal_tambah', true));
    }
}

    public function edit(Request $request,$id){
        $jadwal = jadwalModel::findorFAil($id);

        $jadwal->nama_posyandu = $request->input('nama_posyandu');
        $jadwal->wilayah_desa = $request->input('wilayah_desa');
        $jadwal->nama_bidan = $request->input('nama_bidan');
        $jadwal->hari = $request->input('hari');
        $jadwal->tanggal = $request->input('tanggal');

        $jadwal->save();
        return redirect()->route('admin_jadwal')->with(Session::flash('berhasil_edit', true));


    }

    public function edits(Request $request,$id){
        $jadwal = jadwalModel::findorFAil($id);

        $jadwal->nama_posyandu = $request->input('nama_posyandu');
        $jadwal->wilayah_desa = $request->input('wilayah_desa');
        $jadwal->nama_bidan = $request->input('nama_bidan');
        $jadwal->hari = $request->input('hari');
        $jadwal->tanggal = $request->input('tanggal');

        $jadwal->save();
        return redirect()->route('admin_kepala_jadwal')->with(Session::flash('berhasil_edit', true));


    }

    public function hapus(Request $request, $id){
        $jadwal = jadwalModel::findorFAil($id);

        $jadwal->delete();
        return redirect()->route('admin_jadwal')->with(Session::flash('berhasil_hapus', true));
    }

    public function hapuss(Request $request, $id){
        $jadwal = jadwalModel::findorFAil($id);

        $jadwal->delete();
        return redirect()->route('admin_kepala_jadwal')->with(Session::flash('berhasil_hapus', true));
    }

}
