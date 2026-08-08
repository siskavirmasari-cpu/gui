<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetiKemas extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database
     */
    protected $table = 'peti_kemas';

    /**
     * Kolom yang dapat diisi (mass assignable)
     */
    protected $fillable = [
        'nomor_container',
        'ukuran',
        'jenis_container', // <-- UBAH DI SINI (sebelumnya 'jenis')
        'status',
    ];

    /**
     * Relasi ke Model Trip (Satu Peti Kemas bisa memiliki banyak riwayat trip pengangkutan)
     */
    public function trips()
    {
        return $this->hasMany(Trip::class, 'peti_kemas_id');
    }
}