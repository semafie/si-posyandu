<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\akunController;
use App\Http\Controllers\bayiController;
use App\Http\Controllers\pemeriksaanController;
use App\Http\Controllers\imunisasiController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin/dashboard',[AdminController::class,'show_dashboard'])->name('admin_dashboard');
Route::get('/admin/akun_petugas',[AdminController::class,'show_akun'])->name('admin_akun');

Route::post('/admin/akun_petugas/tambah',[akunController::class,'tambah'])->name('admin_tambahakun');


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