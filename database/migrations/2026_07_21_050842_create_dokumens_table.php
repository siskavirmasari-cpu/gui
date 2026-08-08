<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dokumens', function (Blueprint $table) {
            $table->id();
            // Relasi ke tabel barangs (Data Import & Export)
            $table->unsignedBigInteger('barang_id')->nullable();
            // Jenis dokumen sesuai spesifikasi (Bill of Lading, Invoice, Packing List, dll)
            $table->string('jenis_dokumen');
            // Nama file fisik yang tersimpan di server
            $table->string('file_dokumen');
            // Status verifikasi dokumen
            $table->string('status_verifikasi')->default('Menunggu Verifikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumens');
    }
};