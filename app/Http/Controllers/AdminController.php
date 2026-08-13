<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PetiKemas;
use App\Models\Barang;
use App\Models\Trip;
use App\Models\Dokumen;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dokumenPimpinan()
    {
        $dokumens = \App\Models\Dokumen::with('barang')->latest()->get();
        $barangs = \App\Models\Barang::all();
        return view('dokumen.dokumenPimpinan', compact('dokumens', 'barangs'));
    }
    // Halaman Dashboard Utama (Akses Admin & Pimpinan)
    public function dashboard()
    {
        // summary counts
        $totalPetiKemas = PetiKemas::count();
        $totalTrip = Trip::count();
        $totalUsers = \App\Models\User::count();
        $rolesCount = \App\Models\User::distinct('role')->count('role');

        // timeseries for last 7 days (labels + counts)
        $labels = [];
        $petiKemasSeries = [];
        $tripSeries = [];
        for ($i = 6; $i >= 0; $i--) {
            $d = Carbon::today()->subDays($i);
            $labels[] = $d->isoFormat('dd'); // 2-letter day name
            $petiKemasSeries[] = PetiKemas::whereDate('created_at', $d->toDateString())->count();
            $tripSeries[] = Trip::whereDate('created_at', $d->toDateString())->count();
        }

        // dokumen status breakdown
        $dokumenLengkap = Dokumen::whereIn('status_verifikasi', ['Disetujui', 'Dokumen Lengkap'])->count();
        $dokumenDiproses = Dokumen::whereIn('status_verifikasi', ['Menunggu Verifikasi', 'Diproses'])->count();
        $dokumenPerluPeriksa = Dokumen::whereIn('status_verifikasi', ['Perlu Pemeriksaan', 'Ditolak'])->count();
        $totalDokumen = Dokumen::count();

        return view('dashboard', compact(
            'totalPetiKemas',
            'totalTrip',
            'totalUsers',
            'rolesCount',
            'labels',
            'petiKemasSeries',
            'tripSeries',
            'dokumenLengkap',
            'dokumenDiproses',
            'dokumenPerluPeriksa',
            'totalDokumen'
        ));
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

