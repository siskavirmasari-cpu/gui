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
    Schema::create('trips', function (Blueprint $table) {
        $table->id();
        $table->foreignId('peti_kemas_id')->constrained('peti_kemas')->onDelete('cascade');
        $table->string('asal');
        $table->string('tujuan');
        $table->string('kendaraan');
        $table->string('supir');
        $table->date('tanggal_trip');
        $table->enum('status_perjalanan', ['Pending', 'Dalam Perjalanan', 'Selesai', 'Bermasalah'])->default('Pending');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
