<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::latest()->paginate(10);
        return view('barang.index', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang'        => 'required',
            'jenis_kegiatan'     => 'required|in:Import,Export',
            'negara_asal_tujuan' => 'required',
            'nama_kapal'         => 'required',
            'nomor_bl_awb'       => 'required',
            'tanggal_kegiatan'   => 'required|date',
        ]);

        Barang::create($request->all());

        return redirect()->back()->with('success', 'Data Import/Export berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang'        => 'required',
            'jenis_kegiatan'     => 'required|in:Import,Export',
            'negara_asal_tujuan' => 'required',
            'nama_kapal'         => 'required',
            'nomor_bl_awb'       => 'required',
            'tanggal_kegiatan'   => 'required|date',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($request->all());

        return redirect()->back()->with('success', 'Data Import/Export berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->back()->with('success', 'Data Import/Export berhasil dihapus!');
    }
}