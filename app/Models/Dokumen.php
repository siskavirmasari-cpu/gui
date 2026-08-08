<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika diperlukan (opsional, pastikan sesuai nama tabel di database)
    protected $table = 'dokumens';

    protected $fillable = [
        'barang_id',
        'peti_kemas_id',
        'jenis_dokumen',
        'file_dokumen',
        'status_verifikasi'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}