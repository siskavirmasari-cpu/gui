<?php

namespace Tests\Feature;

use App\Http\Controllers\DokumenController;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class DokumenControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config([
            'database.default' => 'sqlite',
            'database.connections.sqlite.database' => ':memory:',
        ]);

        $this->app['db']->purge('sqlite');
        $this->app['db']->connection()->getSchemaBuilder()->create('dokumens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_id')->nullable();
            $table->unsignedBigInteger('peti_kemas_id')->nullable();
            $table->string('jenis_dokumen');
            $table->string('status_verifikasi')->default('Menunggu Verifikasi');
            $table->string('file_dokumen')->nullable();
            $table->string('file_bill_lading')->nullable();
            $table->timestamps();
        });
    }

    protected function tearDown(): void
    {
        Schema::dropIfExists('dokumens');

        parent::tearDown();
    }

    public function test_store_uses_barang_id_preferentially_when_both_columns_exist(): void
    {
        $request = Request::create('/dokumen', 'POST', [
            'barang_id' => 4,
            'jenis_dokumen' => 'Bill of Lading (B/L)',
        ], [], [
            'file_dokumen' => UploadedFile::fake()->create('test.pdf', 100),
        ]);

        $response = (new DokumenController())->store($request);

        $this->assertNotNull($response);
        $this->assertDatabaseHas('dokumens', [
            'barang_id' => 4,
            'jenis_dokumen' => 'Bill of Lading (B/L)',
            'file_dokumen' => $this->assertStringContainsString('test.pdf', 'test.pdf'),
        ]);
        $this->assertDatabaseMissing('dokumens', [
            'peti_kemas_id' => 4,
        ]);
    }

    public function test_store_uses_peti_kemas_id_when_barang_id_column_is_missing(): void
    {
        Schema::drop('dokumens');
        $this->app['db']->connection()->getSchemaBuilder()->create('dokumens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('peti_kemas_id')->nullable();
            $table->string('jenis_dokumen');
            $table->string('status_verifikasi')->default('Menunggu Verifikasi');
            $table->string('file_bill_lading')->nullable();
            $table->timestamps();
        });

        $request = Request::create('/dokumen', 'POST', [
            'barang_id' => 4,
            'jenis_dokumen' => 'Bill of Lading (B/L)',
        ], [], [
            'file_dokumen' => UploadedFile::fake()->create('test.pdf', 100),
        ]);

        $response = (new DokumenController())->store($request);

        $this->assertNotNull($response);
        $this->assertDatabaseHas('dokumens', [
            'peti_kemas_id' => 4,
            'jenis_dokumen' => 'Bill of Lading (B/L)',
        ]);
    }
}
