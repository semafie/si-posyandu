<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemeriksaanModel extends Model
{
    use HasFactory;

    protected $table = 'pemeriksaan';

    protected $fillable = [
        'id_bayi',
        'tanggal_timbang',
        'tinggi_badan',
        'berat_badan',
        'status_gizi',
        'keterangan',
    ];

    public function bayi()
    {
        return $this->belongsTo(bayiModel::class, 'id_bayi');
    }
}
