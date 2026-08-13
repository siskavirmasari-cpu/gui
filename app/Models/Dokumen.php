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
        'trip_id',
        'jenis_dokumen',
        'file_dokumen',
        'status_verifikasi'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    public function petiKemas()
    {
        return $this->belongsTo(PetiKemas::class, 'peti_kemas_id');
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class, 'trip_id');
    }
}