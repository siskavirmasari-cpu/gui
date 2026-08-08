<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'jenis_kegiatan',
        'negara_asal_tujuan',
        'nama_kapal',
        'nomor_bl_awb',
        'tanggal_kegiatan',
    ];
}