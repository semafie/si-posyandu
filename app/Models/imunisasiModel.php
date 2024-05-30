<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imunisasiModel extends Model
{
    use HasFactory;

    protected $table = 'imunisasi';

    protected $fillable = [
        'id_bayi',
        'tanggal_imunisasi',
        'jenis_imunisasi',
        'jenis_vitamin',
        'keterangan',
    ];


    public function bayi()
    {
        return $this->belongsTo(bayiModel::class, 'id_bayi');
    }

}
