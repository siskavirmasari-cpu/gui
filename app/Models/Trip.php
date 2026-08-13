<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database
     */
    protected $table = 'trips';

    /**
     * Kolom yang dapat diisi (mass assignable)
     */
    protected $fillable = [
        'peti_kemas_id',
        'asal',
        'tujuan',
        'kendaraan',
        'supir',
        'tanggal_trip',
        'status_perjalanan',
    ];

    protected $casts = [
        'tanggal_trip' => 'date',
    ];

    /**
     * Relasi balik ke PetiKemas (Setiap trip terhubung dengan satu Peti Kemas)
     */
    public function petiKemas()
    {
        return $this->belongsTo(PetiKemas::class, 'peti_kemas_id');
    }

    /**
     * Relasi ke Model Dokumen (Satu trip bisa memiliki dokumen/foto bukti perjalanan)
     */
    public function dokumens()
    {
        return $this->hasMany(Dokumen::class, 'trip_id');
    }
}