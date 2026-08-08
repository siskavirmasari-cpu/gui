<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('dokumens', function (Blueprint $table) {
            if (!Schema::hasColumn('dokumens', 'barang_id')) {
                $table->unsignedBigInteger('barang_id')->nullable()->after('id');
            }

            if (!Schema::hasColumn('dokumens', 'peti_kemas_id')) {
                $table->unsignedBigInteger('peti_kemas_id')->nullable()->after('barang_id');
            }

            if (!Schema::hasColumn('dokumens', 'jenis_dokumen')) {
                $table->string('jenis_dokumen')->nullable()->after('peti_kemas_id');
            }

            if (!Schema::hasColumn('dokumens', 'file_dokumen')) {
                $table->string('file_dokumen')->nullable()->after('jenis_dokumen');
            }

            if (!Schema::hasColumn('dokumens', 'file_bill_lading')) {
                $table->string('file_bill_lading')->nullable()->after('file_dokumen');
            }

            if (!Schema::hasColumn('dokumens', 'file_invoice')) {
                $table->string('file_invoice')->nullable()->after('file_bill_lading');
            }

            if (!Schema::hasColumn('dokumens', 'file_packing_list')) {
                $table->string('file_packing_list')->nullable()->after('file_invoice');
            }

            if (!Schema::hasColumn('dokumens', 'file_pib_peb')) {
                $table->string('file_pib_peb')->nullable()->after('file_packing_list');
            }

            if (!Schema::hasColumn('dokumens', 'file_surat_jalan')) {
                $table->string('file_surat_jalan')->nullable()->after('file_pib_peb');
            }

            if (!Schema::hasColumn('dokumens', 'file_foto_container')) {
                $table->string('file_foto_container')->nullable()->after('file_surat_jalan');
            }

            if (!Schema::hasColumn('dokumens', 'status_verifikasi')) {
                $table->string('status_verifikasi')->default('Menunggu Verifikasi')->after('file_foto_container');
            }
        });
    }

    public function down(): void
    {
        Schema::table('dokumens', function (Blueprint $table) {
            if (Schema::hasColumn('dokumens', 'barang_id')) {
                $table->dropColumn('barang_id');
            }

            if (Schema::hasColumn('dokumens', 'peti_kemas_id')) {
                $table->dropColumn('peti_kemas_id');
            }

            if (Schema::hasColumn('dokumens', 'jenis_dokumen')) {
                $table->dropColumn('jenis_dokumen');
            }

            if (Schema::hasColumn('dokumens', 'file_dokumen')) {
                $table->dropColumn('file_dokumen');
            }

            if (Schema::hasColumn('dokumens', 'file_bill_lading')) {
                $table->dropColumn('file_bill_lading');
            }

            if (Schema::hasColumn('dokumens', 'file_invoice')) {
                $table->dropColumn('file_invoice');
            }

            if (Schema::hasColumn('dokumens', 'file_packing_list')) {
                $table->dropColumn('file_packing_list');
            }

            if (Schema::hasColumn('dokumens', 'file_pib_peb')) {
                $table->dropColumn('file_pib_peb');
            }

            if (Schema::hasColumn('dokumens', 'file_surat_jalan')) {
                $table->dropColumn('file_surat_jalan');
            }

            if (Schema::hasColumn('dokumens', 'file_foto_container')) {
                $table->dropColumn('file_foto_container');
            }

            if (Schema::hasColumn('dokumens', 'status_verifikasi')) {
                $table->dropColumn('status_verifikasi');
            }
        });
    }
};
