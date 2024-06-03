<?php

namespace App\Http\Controllers;

use App\Models\bayiModel;
use App\Models\imunisasiModel;
use App\Models\jadwalModel;
use App\Models\pemeriksaanModel;
use App\Models\User;
use Illuminate\Http\Request;

class Admin_kepalaController extends Controller
{
    public function show_dashboard(){
        return view('admin_kepala.layout.dashboard',[
            'title' => 'Dashboard Kepala'
        ]);
    }

    public function show_laporanpemeriksaan(){
        $pemeriksaan = pemeriksaanModel::with('bayi')->get();
        $bayi = bayiModel::all();
        return view('admin_kepala.layout.laporan_pemeriksaan',[
            'title' => 'Laporan pemeriksaan',
            'pemeriksaan' => $pemeriksaan,
            'bayi' => $bayi
        ]);
    }

    public function show_laporanimunisasi(){
        $imunisasi = imunisasiModel::with('bayi')->get();
        $bayi = bayiModel::all();
        return view('admin_kepala.layout.laporan_imunisasi',[
            'title' => 'Laporan imunisasi',
            'imunisasi' => $imunisasi,
            'bayi' => $bayi
        ]);
    }

    public function show_akun(){
        $user = User::where('role', 'admin')->get();
        return view('admin_kepala.layout.akun_petugas',[
            'title' => 'Akun Petugas',
            'user' => $user
        ]);
    }

    public function show_jadwal(){
        $jadwal = jadwalModel::all();
        return view('admin_kepala.layout.jadwalposyandu',[
            'title' => 'Jadwal Posyandu',
            'jadwal' => $jadwal
        ]);
    }
}
