<?php

namespace App\Http\Controllers;

use App\Models\jadwalModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show_home(){
        Carbon::setLocale('id');

// Ambil bulan ini
        $currentMonth = Carbon::now()->isoFormat('MMMM');
        $currentYear = Carbon::now()->year;
        $jadwal = jadwalModel::all();
        return view('login_register.home',[
            'jadwal' => $jadwal,
            'bulan' => $currentMonth,
            'tahun' => $currentYear
        ]);
    }
}
