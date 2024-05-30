<?php

namespace App\Http\Controllers;

use App\Models\bayiModel;
use App\Models\imunisasiModel;
use App\Models\pemeriksaanModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function __construct()
    {
        $ownerEmail = 'owner@gmail.com';
    
        $ownerUser = User::where('email', $ownerEmail)->first();
        
        
        if (!$ownerUser) {
            User::create([
                'name' => 'owner',
                'email' => $ownerEmail,
                'password' => Hash::make('owner123'),
                'role' => 'owner',
            ]);
        }
    }


    public function show_dashboard(){
        return view('admin.layout.dashboard',[
            'title' => 'Dashboard'
        ]);
    }

    public function show_pendaftaran(){
        
        return view('admin.layout.pendaftaran',[
            'title' => 'Pendaftaran Bayi dan Balita',
            
        ]);
    }

    public function show_pemeriksaan(){
        $bayi = bayiModel::all();
        return view('admin.layout.pemeriksaan',[
            'title' => 'pemeriksaan Bayi dan Balita',
            'bayi' => $bayi
        ]);
    }

    public function show_imunisasi(){
        $bayi = bayiModel::all();
        return view('admin.layout.imunisasi',[
            'title' => 'imunisasi Bayi dan Balita',
            'bayi' => $bayi
        ]);
    }


    public function show_databayi(){
        $bayi = bayiModel::all();
        return view('admin.layout.data_bayi',[
            'title' => 'imunisasi Bayi dan Balita',
            'bayi' => $bayi
        ]);
    }

    public function show_laporanpemeriksaan(){
        $pemeriksaan = pemeriksaanModel::with('bayi')->get();
        $bayi = bayiModel::all();
        return view('admin.layout.laporan_pemeriksaan',[
            'title' => 'Laporan pemeriksaan',
            'pemeriksaan' => $pemeriksaan,
            'bayi' => $bayi
        ]);
    }
    public function show_laporanimunisasi(){
        $imunisasi = imunisasiModel::with('bayi')->get();
        $bayi = bayiModel::all();
        return view('admin.layout.laporan_imunisasi',[
            'title' => 'Laporan imunisasi',
            'imunisasi' => $imunisasi,
            'bayi' => $bayi
        ]);
    }

    public function show_akun(){
        $user = User::where('role', 'admin')->get();
        return view('admin.layout.akun_petugas',[
            'title' => 'Akun Petugas',
            'user' => $user
        ]);
    }
}
