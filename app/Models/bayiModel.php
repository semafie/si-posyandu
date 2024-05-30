<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bayiModel extends Model
{
    use HasFactory;
    protected $table = 'bayi';

    protected $fillable = [
        'nama_bayi',
        'jenis_kelamin',
        'nama_wali',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
    ];

}
