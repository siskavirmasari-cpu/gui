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
        Schema::table('dokumens', function (Blueprint $table) {
            if (! Schema::hasColumn('dokumens', 'peti_kemas_id')) {
                $table->foreignId('peti_kemas_id')->nullable()->constrained('peti_kemas')->nullOnDelete();
            }

            if (! Schema::hasColumn('dokumens', 'trip_id')) {
                $table->foreignId('trip_id')->nullable()->constrained('trips')->nullOnDelete();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dokumens', function (Blueprint $table) {
            if (Schema::hasColumn('dokumens', 'peti_kemas_id')) {
                $table->dropForeign(['peti_kemas_id']);
                $table->dropColumn('peti_kemas_id');
            }

            if (Schema::hasColumn('dokumens', 'trip_id')) {
                $table->dropForeign(['trip_id']);
                $table->dropColumn('trip_id');
            }
        });
    }
};
