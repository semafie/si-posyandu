<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class akunController extends Controller
{
    public function tambah(Request $request){
        $halo = [
            'nama' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'password' => 'required',
        ];

//         $input = $request->all();
// // Tampilkan seluruh input
//         dd($input);
  

        $validasi = Validator::make($request->all(), $halo);

        // Jika validasi gagal
        if ($validasi->fails()) {
            return redirect()->route('admin_akun')->with(Session::flash('kosong_tambah', true));
        }

        if($request->password != $request->confirm_password){
            return redirect()->route('admin_akun')->with(Session::flash('password ga sama', true));
        } 

        $akunpegawai = User::create([
            'name' => $request->username,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'nama_user' => $request->nama,
            'alamat' => $request->alamat,
            'role' => 'admin',
            'password' => Hash::make($request->password)
        ]);

        if ($akunpegawai) {
            return redirect()->route('admin_akun')->with(Session::flash('berhasil_tambah', true));
        } else {
            return redirect()->route('admin_akun')->with(Session::flash('gagal_tambah', true));
        }
    }

    public function edit(Request $request , $id){

    }
    
    public function hapus(Request $request , $id){

    }
}
