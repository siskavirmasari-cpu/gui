<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormatDokumen extends Model
{
    use HasFactory;

    protected $table = 'format_dokumens';

    protected $fillable = [
        'barang_id',
        'jenis_dokumen',
        'nama_format',
        'deskripsi',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
