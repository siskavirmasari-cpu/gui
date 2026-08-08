<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PetiKemas;
use App\Models\Barang;
use App\Models\Trip;
use App\Models\Dokumen;

class AdminController extends Controller
{
    // Halaman Dashboard Utama (Akses Admin & Pimpinan)
    public function dashboard()
    {
        return view('dashboard');
    }

    // Halaman Laporan Operasional / Dashboard Manajemen
    public function laporan(Request $request)
    {
        // Ambil parameter filter bulan dari request (jika ada)
        $bulan = $request->input('bulan');

        // Rekapitulasi status peti kemas sesuai spesifikasi Dashboard Manajemen
        $totalPetiKemas = PetiKemas::count();
        $containerMasukHariIni = PetiKemas::whereDate('created_at', today())->count();
        $containerProses = PetiKemas::where('status', 'Proses')->count();
        $containerKeluar = PetiKemas::where('status', 'Selesai')->count();
        $containerBermasalah = PetiKemas::where('status', 'Bermasalah')->count();

        $totalBarang = Barang::count();
        $totalTrip = Trip::count();
        $dokumenBelumLengkap = Dokumen::where('status_verifikasi', '!=', 'Dokumen Lengkap')->count();

        // Query dokumen dengan opsi filter bulan
        $queryDokumen = Dokumen::with('barang');
        if ($bulan) {
            $queryDokumen->whereMonth('created_at', $bulan);
        }
        $dokumens = $queryDokumen->latest()->get();

        return view('laporan.index', compact(
            'totalPetiKemas', 
            'containerMasukHariIni',
            'containerProses',
            'containerKeluar',
            'containerBermasalah',
            'totalBarang', 
            'totalTrip', 
            'dokumenBelumLengkap',
            'dokumens'
        )); 
    }
}