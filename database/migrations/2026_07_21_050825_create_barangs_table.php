<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->enum('jenis_kegiatan', ['Import', 'Export']);
            $table->string('negara_asal_tujuan');
            $table->string('nama_kapal');
            $table->string('nomor_bl_awb');
            $table->date('tanggal_kegiatan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};