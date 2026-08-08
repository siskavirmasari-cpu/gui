<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PetiKemas;
use App\Models\Barang;
use App\Models\Trip;
use App\Models\Dokumen;

class OperatorController extends Controller
{
    // Menampilkan halaman utama / form input harian untuk operator
    public function index()
    {
        $petiKemases = PetiKemas::latest()->get();
        $barangs = Barang::latest()->get();
        $trips = Trip::latest()->get();

        return view('operator.index', compact('petiKemases', 'barangs', 'trips'));
    }

    // Menyimpan data Peti Kemas
    public function storePetiKemas(Request $request)
    {
        $request->validate([
            'nomor_container' => 'required|string|max:255',
            'ukuran' => 'required|string',
            'jenis_container' => 'required|string',
            'status' => 'required|string',
        ]);

        PetiKemas::create([
            'nomor_container' => $request->nomor_container,
            'ukuran' => $request->ukuran,
            'jenis_container' => $request->jenis_container,
            'status' => $request->status,
        ]);

        return redirect()->route('operator.index')->with('success', 'Data peti kemas harian berhasil ditambahkan.');
    }

    // Menyimpan data Trip / Surat Jalan
    public function storeSuratJalan(Request $request)
    {
        $request->validate([
            'asal' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'kendaraan' => 'required|string|max:255',
            'supir' => 'required|string|max:255',
            'tanggal_trip' => 'required|date',
        ]);

        $petiKemasTerbaru = PetiKemas::latest()->first();

        Trip::create([
            'peti_kemas_id' => $petiKemasTerbaru ? $petiKemasTerbaru->id : 1, 
            'asal' => $request->asal,
            'tujuan' => $request->tujuan,
            'kendaraan' => $request->kendaraan,
            'supir' => $request->supir,
            'tanggal_trip' => $request->tanggal_trip,
            'status' => 'Proses',
        ]);

        return redirect()->route('operator.index')->with('success', 'Data trip pengangkutan & supir berhasil disimpan.');
    }

    // Menyimpan data Barang / Import-Export
    public function storeBarang(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jenis_kegiatan' => 'required|string',
            'negara_asal_tujuan' => 'required|string|max:255',
            'nama_kapal' => 'required|string|max:255',
            'nomor_bl' => 'required|string|max:255',
            'tanggal_kedatangan_keberangkatan' => 'required|date',
        ]);

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'jenis_kegiatan' => $request->jenis_kegiatan,
            'tanggal_kegiatan' => $request->tanggal_kedatangan_keberangkatan,
            'negara_asal_tujuan' => $request->negara_asal_tujuan,
            'nama_kapal' => $request->nama_kapal,
            'nomor_bl_awb' => $request->nomor_bl, 
            'tanggal_kedatangan_keberangkatan' => $request->tanggal_kedatangan_keberangkatan,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('operator.index')->with('success', 'Data barang / import-export berhasil ditambahkan.');
    }

    // Menyimpan/Upload Dokumen Lapangan
    public function storeDokumen(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'jenis_dokumen' => 'required|string',
            'berkas' => 'required|file|max:10240',
        ]);

        $file = $request->file('berkas');
        
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $cleanName = preg_replace('/\s+/', '_', $originalName);
        $filename = time() . '_' . $cleanName . '.' . $file->getClientOriginalExtension();
        
        $destinationPath = public_path('uploads/dokumen');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $file->move($destinationPath, $filename);

        // Menentukan kolom file database berdasarkan jenis dokumen
        $jenis = $request->jenis_dokumen;
        $columnName = 'file_surat_jalan'; 

        if ($jenis == 'Bill of Lading (BL)' || $jenis == 'Bill of Lading (B/L)') {
            $columnName = 'file_bill_lading';
        } elseif ($jenis == 'Invoice') {
            $columnName = 'file_invoice';
        } elseif ($jenis == 'Packing List') {
            $columnName = 'file_packing_list';
        } elseif ($jenis == 'PIB / PEB' || $jenis == 'Dokumen Bea Cukai') {
            $columnName = 'file_pib_peb';
        } elseif ($jenis == 'Surat Jalan') {
            $columnName = 'file_surat_jalan';
        } elseif ($jenis == 'Foto Container') {
            $columnName = 'file_foto_container';
        }

        // Menyimpan ke database dengan menyesuaikan kolom yang benar-benar ada di tabel dokumens
        $dokumen = new Dokumen();

        if (\Schema::hasColumn('dokumens', 'barang_id')) {
            $dokumen->barang_id = $request->barang_id;
        }

        if (\Schema::hasColumn('dokumens', 'peti_kemas_id')) {
            $dokumen->peti_kemas_id = $request->barang_id;
        }

        // Cek apakah kolom jenis_dokumen ada di database, jika ada baru diisi
        if (\Schema::hasColumn('dokumens', 'jenis_dokumen')) {
            $dokumen->jenis_dokumen = $request->jenis_dokumen;
        }

        $dokumen->$columnName = $filename;
        
        if (\Schema::hasColumn('dokumens', 'status_verifikasi')) {
            $dokumen->status_verifikasi = 'Menunggu Verifikasi';
        }
        
        $dokumen->save();

        return redirect()->route('operator.index')->with('success', 'Dokumen berhasil diunggah dan menunggu verifikasi perusahaan.');
    }
}