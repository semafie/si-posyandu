<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwalModel extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    protected $fillable = [
        'nama_posyandu',
        'wilayah_desa',
        'nama_bidan',
        'hari',
        'tanggal',
    ];
}
