<?php

use App\Http\Controllers\Admin_kepalaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\akunController;
use App\Http\Controllers\bayiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\pemeriksaanController;
use App\Http\Controllers\imunisasiController;
use App\Http\Controllers\jadwalController;
use App\Http\Controllers\login_registerController;

Route::get('/', [HomeController::class,'show_home'])->name('home');


Route::get('/login',[login_registerController::class,'show_login'])->name('login');
Route::get('/logout',[login_registerController::class,'logout'])->name('logout');
Route::post('/loginakun',[login_registerController::class,'loginakun'])->name('loginakun');

Route::get('/tampilanvideo', function(){
    return view('login_register.menu_video');
});

Route::group(['middleware' => 'admin'], function(){

    Route::get('/admin/dashboard',[AdminController::class,'show_dashboard'])->name('admin_dashboard');
Route::get('/admin/jadwal',[AdminController::class,'show_jadwal'])->name('admin_jadwal');
Route::post('/admin/jadwal/tambah',[jadwalController::class,'tambah'])->name('tambah_jadwal');
Route::put('/admin/jadwal/edit/{id}',[jadwalController::class,'edit'])->name('edit_jadwal');
Route::delete('/admin/jadwal/hapus/{id}',[jadwalController::class,'hapus'])->name('edit_jadwal');

Route::get('/admin/akun_petugas',[AdminController::class,'show_akun'])->name('admin_akun');
Route::post('/admin/akun_petugas/tambah',[akunController::class,'tambah'])->name('admin_tambahakun');
Route::put('/admin/akun_petugas/edit/{id}',[akunController::class,'edit'])->name('admin_editakun');
Route::delete('/admin/akun_petugas/hapus/{id}',[akunController::class,'hapus'])->name('admin_hapusakun');

Route::get('/admin/pendaftaran',[AdminController::class,'show_pendaftaran'])->name('admin_pendaftaran');
Route::post('/admin/pendaftaran/tambah',[bayiController::class,'tambah'])->name('tambah_pendaftaran');

Route::get('/admin/pemeriksaan',[AdminController::class,'show_pemeriksaan'])->name('admin_pemeriksaan');
Route::post('/admin/pemeriksaan/tambah',[pemeriksaanController::class,'tambah'])->name('tambah_pemeriksaan');


Route::get('/admin/imunisasi',[AdminController::class,'show_imunisasi'])->name('admin_imunisasi');
Route::post('/admin/imunisasi/tambah',[imunisasiController::class,'tambah'])->name('tambah_imunisasi');

Route::get('/admin/data_bayi',[AdminController::class,'show_databayi'])->name('admin_databayi');
Route::put('/admin/data_bayi/edit/{id}',[bayiController::class,'edit'])->name('admin_editbayi');
Route::delete('/admin/data_bayi/hapus/{id}',[bayiController::class,'hapus'])->name('admin_hapusbayi');

Route::get('/admin/laporan/pemeriksaaan',[AdminController::class,'show_laporanpemeriksaan'])->name('admin_laporanpemeriksaan');
Route::put('/admin/pemeriksaan/edit/{id}',[pemeriksaanController::class,'edit'])->name('edit_pemeriksaan');
Route::delete('/admin/pemeriksaan/hapus/{id}',[pemeriksaanController::class,'hapus'])->name('hapus_pemeriksaan');

Route::get('/admin/laporan/imunisasi',[AdminController::class,'show_laporanimunisasi'])->name('admin_laporanimunisasi');
Route::put('/admin/imunisasi/edit/{id}',[imunisasiController::class,'edit'])->name('edit_imunisasi');
Route::delete('/admin/imunisasi/hapus/{id}',[imunisasiController::class,'hapus'])->name('hapus_imunisasi');
});


Route::group(['middleware' => 'admin_kepala'], function(){

    Route::get('/admin_kepala/dashboard',[Admin_kepalaController::class,'show_dashboard'])->name('admin_kepala_dashboard');
    Route::get('/admin_kepala/jadwal',[Admin_kepalaController::class,'show_jadwal'])->name('admin_kepala_jadwal');
Route::post('/admin_kepala/jadwal/tambah',[jadwalController::class,'tambahs'])->name('tambah_jadwal');
Route::put('/admin_kepala/jadwal/edit/{id}',[jadwalController::class,'edits'])->name('edit_jadwal');
Route::delete('/admin_kepala/jadwal/hapus/{id}',[jadwalController::class,'hapuss'])->name('edit_jadwal');

Route::get('/admin_kepala/akun_petugas',[Admin_kepalaController::class,'show_akun'])->name('admin_kepala_akun');
Route::post('/admin_kepala/akun_petugas/tambah',[akunController::class,'tambahs'])->name('admin_kepala_tambahakun');
Route::put('/admin_kepala/akun_petugas/edit/{id}',[akunController::class,'edits'])->name('admin_kepala_editakun');
Route::delete('/admin_kepala/akun_petugas/hapus/{id}',[akunController::class,'hapuss'])->name('admin_kepala_hapusakun');

Route::get('/admin_kepala/laporan/pemeriksaaan',[Admin_kepalaController::class,'show_laporanpemeriksaan'])->name('admin_kepala_laporanpemeriksaan');
Route::put('/admin_kepala/pemeriksaan/edit/{id}',[pemeriksaanController::class,'edits'])->name('edit_pemeriksaan');
Route::delete('/admin_kepala/pemeriksaan/hapus/{id}',[pemeriksaanController::class,'hapuss'])->name('hapus_pemeriksaan');

Route::get('/admin_kepala/laporan/imunisasi',[Admin_kepalaController::class,'show_laporanimunisasi'])->name('admin_kepala_laporanimunisasi');
Route::put('/admin_kepala/imunisasi/edit/{id}',[imunisasiController::class,'edits'])->name('edit_imunisasi');
Route::delete('/admin_kepala/imunisasi/hapus/{id}',[imunisasiController::class,'hapuss'])->name('hapus_imunisasi');
});

