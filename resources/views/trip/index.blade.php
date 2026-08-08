<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Trip Peti Kemas - PT Gajah Unggul International') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-6 flex justify-end">
                <a href="{{ route('dashboard') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">
                    &larr; Kembali ke Dashboard
                </a>
            </div>

            <!-- Form Input / Edit Data Trip -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 mb-8 border border-gray-100">
                <h3 class="text-lg font-bold text-gray-800 mb-4">
                    {{ isset($editTrip) ? '✏️ Edit Data Trip Peti Kemas' : '+ Input Data Trip Peti Kemas' }}
                </h3>
                
                <form action="{{ isset($editTrip) ? route('trip.update', $editTrip->id) : route('trip.store') }}" method="POST">
                    @csrf
                    @if(isset($editTrip))
                        @method('PUT')
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Pilih Peti Kemas</label>
                            <select name="peti_kemas_id" class="w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500" required>
                                <option value="">-- Pilih Peti Kemas --</option>
                                @foreach(\App\Models\PetiKemas::all() as $pk)
                                    <option value="{{ $pk->id }}" {{ (isset($editTrip) && $editTrip->peti_kemas_id == $pk->id) ? 'selected' : '' }}>
                                        {{ $pk->nomor_container }} ({{ $pk->ukuran }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Lokasi Asal</label>
                            <input type="text" name="asal" value="{{ isset($editTrip) ? $editTrip->asal : 'Pelabuhan Teluk Bayur' }}" placeholder="Contoh: Teluk Bayur" class="w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500" required>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Lokasi Tujuan</label>
                            <input type="text" name="tujuan" value="{{ isset($editTrip) ? $editTrip->tujuan : 'Gudang Industri Padang' }}" placeholder="Contoh: Gudang Industri" class="w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500" required>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Kendaraan / Truk</label>
                            <input type="text" name="kendaraan" value="{{ isset($editTrip) ? $editTrip->kendaraan : 'Tronton Hino (BA 8821 AI)' }}" placeholder="Contoh: Tronton (BA 8888 XX)" class="w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500" required>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Nama Supir</label>
                            <input type="text" name="supir" value="{{ isset($editTrip) ? $editTrip->supir : 'Dino Ardianto' }}" placeholder="Contoh: Budi Santoso" class="w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500" required>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Tanggal Trip</label>
                            <input type="date" name="tanggal_trip" value="{{ isset($editTrip) ? $editTrip->tanggal_trip : '2026-07-21' }}" class="w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500" required>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Status Perjalanan</label>
                            <select name="status_perjalanan" class="w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500" required>
                                <option value="">-- Pilih Status --</option>
                                <option value="Dalam Perjalanan" {{ (isset($editTrip) && $editTrip->status_perjalanan == 'Dalam Perjalanan') ? 'selected' : '' }}>Dalam Perjalanan</option>
                                <option value="Selesai" {{ (isset($editTrip) && $editTrip->status_perjalanan == 'Selesai') ? 'selected' : '' }}>Selesai</option>
                                <option value="Tertunda" {{ (isset($editTrip) && $editTrip->status_perjalanan == 'Tertunda') ? 'selected' : '' }}>Tertunda</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-end gap-2">
                        @if(isset($editTrip))
                            <a href="{{ route('trip.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-6 py-2 rounded-lg text-sm font-semibold shadow transition">
                                Batal
                            </a>
                        @endif
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg text-sm font-semibold shadow transition">
                            {{ isset($editTrip) ? 'Perbarui Data Trip' : 'Simpan Data Trip' }}
                        </button>
                    </div>
                </form>
            </div>

            <!-- Tabel Daftar Trip -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border border-gray-100">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-gray-800">Daftar Trip Pengangkutan</h3>
                    <span class="text-xs text-gray-500 font-semibold bg-gray-100 px-3 py-1 rounded-full">Total: {{ count($trips) }} Record</span>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                            <tr>
                                <th class="px-4 py-3 text-left">No</th>
                                <th class="px-4 py-3 text-left">Asal &rarr; Tujuan</th>
                                <th class="px-4 py-3 text-left">Kendaraan</th>
                                <th class="px-4 py-3 text-left">Supir</th>
                                <th class="px-4 py-3 text-left">Tanggal</th>
                                <th class="px-4 py-3 text-center">Status</th>
                                <th class="px-4 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-gray-700">
                            @forelse($trips as $index => $trip)
                            <tr>
                                <td class="px-4 py-3">{{ $index + 1 }}</td>
                                <td class="px-4 py-3 font-medium text-gray-900">{{ $trip->asal }} &rarr; {{ $trip->tujuan }}</td>
                                <td class="px-4 py-3">{{ $trip->kendaraan }}</td>
                                <td class="px-4 py-3">{{ $trip->supir }}</td>
                                <td class="px-4 py-3">{{ $trip->tanggal_trip }}</td>
                                <td class="px-4 py-3 text-center">
                                    <span class="px-2.5 py-1 text-xs font-semibold rounded-full 
                                        {{ $trip->status_perjalanan == 'Selesai' ? 'bg-green-100 text-green-800' : ($trip->status_perjalanan == 'Dalam Perjalanan' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                        {{ $trip->status_perjalanan }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-center flex justify-center items-center gap-3">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('trip.edit', $trip->id) }}" class="text-blue-600 hover:text-blue-900 text-xs font-semibold">Edit</a>
                                    
                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('trip.destroy', $trip->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 text-xs font-semibold">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-4 py-8 text-center text-gray-400 italic">
                                    Belum ada data trip peti kemas. Silakan tambah data di atas.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>