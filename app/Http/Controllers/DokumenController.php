<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class DokumenController extends Controller
{
    public function index()
    {
        $dokumens = Dokumen::with(['barang', 'petiKemas', 'trip'])->latest()->get();
        $barangs = Barang::all();
        return view('dokumen.index', compact('dokumens', 'barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'jenis_dokumen' => 'required',
            'file_dokumen' => 'required|file|max:10240',
        ]);

        $file = $request->file('file_dokumen');

        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $cleanName = preg_replace('/\s+/', '_', $originalName);
        $filename = time() . '_' . $cleanName . '.' . $file->getClientOriginalExtension();

        $destinationPath = public_path('uploads/dokumen');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $file->move($destinationPath, $filename);

        $columnName = $this->resolveDokumenColumnName($request->jenis_dokumen);

        $dokumen = new Dokumen();

        if (Schema::hasColumn('dokumens', 'barang_id')) {
            $dokumen->barang_id = $request->barang_id;
        }

        if (Schema::hasColumn('dokumens', 'peti_kemas_id') && $request->filled('peti_kemas_id')) {
            $dokumen->peti_kemas_id = $request->peti_kemas_id;
        }

        if (Schema::hasColumn('dokumens', 'trip_id') && $request->filled('trip_id')) {
            $dokumen->trip_id = $request->trip_id;
        }

        if (Schema::hasColumn('dokumens', 'jenis_dokumen')) {
            $dokumen->jenis_dokumen = $request->jenis_dokumen;
        }

        if (Schema::hasColumn('dokumens', 'file_dokumen')) {
            $dokumen->file_dokumen = $filename;
        }

        if (Schema::hasColumn('dokumens', $columnName)) {
            $dokumen->$columnName = $filename;
        }

        if (Schema::hasColumn('dokumens', 'status_verifikasi')) {
            $dokumen->status_verifikasi = 'Menunggu Verifikasi';
        }

        $dokumen->save();

        return redirect()->route('dokumen.index')->with('success', 'Dokumen data barang berhasil di-upload!');
    }

    private function resolveDokumenColumnName($jenis)
    {
        if ($jenis == 'Bill of Lading (B/L)') {
            return 'file_bill_lading';
        }

        if ($jenis == 'Invoice') {
            return 'file_invoice';
        }

        if ($jenis == 'Packing List') {
            return 'file_packing_list';
        }

        if ($jenis == 'PIB / PEB' || $jenis == 'Dokumen Bea Cukai') {
            return 'file_pib_peb';
        }

        if ($jenis == 'Surat Jalan') {
            return 'file_surat_jalan';
        }

        if ($jenis == 'Foto Container') {
            return 'file_foto_container';
        }

        return 'file_dokumen';
    }

    public function tracking()
    {
        $dokumens = Dokumen::with(['barang', 'petiKemas', 'trip'])->latest()->get();
        return view('dokumen.tracking', compact('dokumens'));
    }

    public function verifikasi($id)
    {
        $dokumen = Dokumen::findOrFail($id);
        $dokumen->status_verifikasi = 'Disetujui';
        $dokumen->save();

        return redirect()->back()->with('success', 'Status dokumen berhasil diverifikasi dan disetujui!');
    }

    public function destroy($id)
    {
        $dokumen = Dokumen::findOrFail($id);

        foreach(['file_surat_jalan', 'file_bill_lading', 'file_invoice', 'file_packing_list', 'file_pib_peb', 'file_foto_container', 'file_dokumen'] as $col) {
            if (Schema::hasColumn('dokumens', $col) && $dokumen->$col) {
                $filePath = public_path('uploads/dokumen/' . $dokumen->$col);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
        }

        $dokumen->delete();

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil dihapus!');
    }
}