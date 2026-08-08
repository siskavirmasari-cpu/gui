<?php

namespace App\Http\Controllers;

use App\Models\PetiKemas;
use Illuminate\Http\Request;

class PetiKemasController extends Controller
{
    /**
     * Menampilkan daftar peti kemas
     */
    public function index()
    {
        $petiKemas = PetiKemas::latest()->paginate(10);
        return view('peti_kemas.index', compact('petiKemas'));
    }

    /**
     * Menyimpan data peti kemas baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_container' => 'required|unique:peti_kemas,nomor_container',
            'ukuran'          => 'required',
            'jenis_container' => 'required',
            'status'          => 'required',
        ]);

        PetiKemas::create($request->all());

        return redirect()->back()->with('success', 'Data Peti Kemas berhasil ditambahkan!');
    }

    /**
     * Memperbarui data peti kemas
     */
    public function update(Request $request, $id)
    {
        $petiKemas = PetiKemas::findOrFail($id);
        
        $request->validate([
            'nomor_container' => 'required|unique:peti_kemas,nomor_container,'.$id,
            'ukuran'          => 'required',
            'jenis_container' => 'required',
            'status'          => 'required',
        ]);

        $petiKemas->update($request->all());

        return redirect()->back()->with('success', 'Data Peti Kemas berhasil diperbarui!');
    }

    /**
     * Menghapus data peti kemas
     */
    public function destroy($id)
    {
        $petiKemas = PetiKemas::findOrFail($id);
        $petiKemas->delete();

        return redirect()->back()->with('success', 'Data Peti Kemas berhasil dihapus!');
    }

    /**
     * Memperbarui status peti kemas secara instan dari tabel
     */
    public function updateStatus(Request $request, $id)
    {
        $petiKemas = PetiKemas::findOrFail($id);
        
        $request->validate([
            'status' => 'required|string',
        ]);

        $petiKemas->status = $request->status;
        $petiKemas->save();

        return redirect()->back()->with('success', 'Status peti kemas berhasil diperbarui!');
    }
}