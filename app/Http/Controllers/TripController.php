<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::latest()->get();
        // Mengirim data trip yang sedang diedit jika parameter edit ada
        $editTrip = null; 
        return view('trip.index', compact('trips', 'editTrip'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'peti_kemas_id' => 'required|exists:peti_kemas,id',
            'asal' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'kendaraan' => 'required|string|max:255',
            'supir' => 'required|string|max:255',
            'tanggal_trip' => 'required|date',
            'status_perjalanan' => 'required|string|max:100',
        ]);

        Trip::create($request->all());

        return redirect()->route('trip.index')->with('success', 'Data trip berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $trips = Trip::latest()->get();
        $editTrip = Trip::findOrFail($id);
        return view('trip.index', compact('trips', 'editTrip'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'peti_kemas_id' => 'required|exists:peti_kemas,id',
            'asal' => 'required|string|max:255',
            'tujuan' => 'required|string|max:255',
            'kendaraan' => 'required|string|max:255',
            'supir' => 'required|string|max:255',
            'tanggal_trip' => 'required|date',
            'status_perjalanan' => 'required|string|max:100',
        ]);

        $trip = Trip::findOrFail($id);
        $trip->update($request->all());

        return redirect()->route('trip.index')->with('success', 'Data trip berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $trip = Trip::findOrFail($id);
        $trip->delete();

        return redirect()->route('trip.index')->with('success', 'Data trip berhasil dihapus!');
    }
}