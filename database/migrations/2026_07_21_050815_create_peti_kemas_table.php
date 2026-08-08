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
    Schema::create('peti_kemas', function (Blueprint $table) {
        $table->id();
        $table->string('nomor_container')->unique();
        $table->enum('ukuran', ['20 Feet', '40 Feet']);
        $table->string('jenis_container');
        $table->enum('status', ['Masuk', 'Keluar', 'Proses', 'Selesai', 'Bermasalah'])->default('Proses');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peti_kemas');
    }
};
