<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bayiModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class bayiController extends Controller
{
    public function tambah(Request $request){

//         $input = $request->all();
// // Tampilkan seluruh input
//         dd($input);
        $halo = [
            'nama_bayi' => 'required',
            'jenis_kelamin' => 'required',
            'nama_wali' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
        ];

        $validasi = Validator::make($request->all(), $halo);

        // Jika validasi gagal
        if ($validasi->fails()) {
            return redirect()->route('admin_pendaftaran')->with(Session::flash('kosong_tambah', true));
        }

        $bayi = bayiModel::create([
            'nama_bayi' => $request->nama_bayi,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nama_wali' => $request->nama_wali,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        if ($bayi) {
            return redirect()->route('admin_pendaftaran')->with(Session::flash('berhasil_tambah', true));
        } else {
            return redirect()->route('admin_pendaftaran')->with(Session::flash('gagal_tambah', true));
        }
    }

    public function edit(Request $request , $id){
        $bayi = bayiModel::findorFAil($id);

        $bayi->nama_bayi = $request->input('nama_bayi');
        $bayi->jenis_kelamin = $request->input('jenis_kelamin');
        $bayi->nama_wali = $request->input('nama_wali');
        $bayi->alamat = $request->input('alamat');
        $bayi->tempat_lahir= $request->input('tempat_lahir');
        $bayi->tanggal_lahir = $request->input('tanggal_lahir');

        $bayi->save();
        return redirect()->route('admin_databayi')->with(Session::flash('berhasil_edit', true));
    }

    public function hapus(Request $request , $id){
        $bayi = bayiModel::findorFAil($id);

        $bayi->delete();
        return redirect()->route('admin_databayi')->with(Session::flash('berhasil_hapus', true));

    }
    
}
