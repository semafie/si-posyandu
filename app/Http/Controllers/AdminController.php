<?php

namespace App\Http\Controllers;

use App\Models\bayiModel;
use App\Models\imunisasiModel;
use App\Models\jadwalModel;
use App\Models\pemeriksaanModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

        


    public function show_dashboard(){
        return view('admin.layout.dashboard',[
            'title' => 'Dashboard',
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }

    public function show_pendaftaran(){
        
        return view('admin.layout.pendaftaran',[
            'title' => 'Pendaftaran Bayi dan Balita',
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }

    public function show_pemeriksaan(){
        $bayi = bayiModel::all();
        return view('admin.layout.pemeriksaan',[
            'title' => 'pemeriksaan Bayi dan Balita',
            'bayi' => $bayi,
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }

    public function show_imunisasi(){
        $bayi = bayiModel::all();
        return view('admin.layout.imunisasi',[
            'title' => 'imunisasi Bayi dan Balita',
            'bayi' => $bayi,
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }


    public function show_databayi(){
        $bayi = bayiModel::all();
        return view('admin.layout.data_bayi',[
            'title' => 'imunisasi Bayi dan Balita',
            'bayi' => $bayi,
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }

    public function show_laporanpemeriksaan(){
        $pemeriksaan = pemeriksaanModel::with('bayi')->get();
        $bayi = bayiModel::all();
        return view('admin.layout.laporan_pemeriksaan',[
            'title' => 'Laporan pemeriksaan',
            'pemeriksaan' => $pemeriksaan,
            'bayi' => $bayi,
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }

    public function show_laporanimunisasi(){
        $imunisasi = imunisasiModel::with('bayi')->get();
        $bayi = bayiModel::all();
        return view('admin.layout.laporan_imunisasi',[
            'title' => 'Laporan imunisasi',
            'imunisasi' => $imunisasi,
            'bayi' => $bayi,
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }

    public function show_akun(){
        $user = User::where('role', 'admin')->get();
        return view('admin.layout.akun_petugas',[
            'title' => 'Akun Petugas',
            'user' => $user,
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }

    public function show_jadwal(){
        $jadwal = jadwalModel::all();
        return view('admin.layout.jadwalposyandu',[
            'title' => 'Jadwal Posyandu',
            'jadwal' => $jadwal,
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }
}
