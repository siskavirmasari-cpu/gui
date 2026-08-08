<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tracking Status Dokumen - PT Gajah Unggul International') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-6 flex justify-end">
                <a href="{{ route('dashboard') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">
                    &larr; Kembali ke Dashboard
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6 text-sm flex items-center justify-between">
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border border-gray-100">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-gray-800">Pemantauan & Tracking Status Dokumen</h3>
                    <span class="text-xs text-gray-500 font-semibold bg-gray-100 px-3 py-1 rounded-full">Total Berkas: {{ count($dokumens) }}</span>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                            <tr>
                                <th class="px-4 py-3 text-left">No</th>
                                <th class="px-4 py-3 text-left">Data Barang / Kegiatan</th>
                                <th class="px-4 py-3 text-left">No. BL/AWB</th>
                                <th class="px-4 py-3 text-left">Jenis Dokumen</th>
                                <th class="px-4 py-3 text-center">Nama File</th>
                                <th class="px-4 py-3 text-center">Status Verifikasi</th>
                                <th class="px-4 py-3 text-center">Aksi Admin</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-gray-700">
                            @forelse($dokumens as $index => $dok)
                            @php
                                $filename = $dok->file_surat_jalan 
                                    ?? $dok->file_bill_lading 
                                    ?? $dok->file_invoice 
                                    ?? $dok->file_packing_list 
                                    ?? $dok->file_pib_peb 
                                    ?? $dok->file_foto_container 
                                    ?? $dok->berkas 
                                    ?? null;
                            @endphp
                            <tr>
                                <td class="px-4 py-3">{{ $index + 1 }}</td>
                                <td class="px-4 py-3 font-medium text-gray-900">
                                    {{ $dok->barang->nama_barang ?? '-' }}
                                    <span class="block text-xs text-gray-500">Kegiatan: {{ $dok->barang->jenis_kegiatan ?? '-' }}</span>
                                </td>
                                <td class="px-4 py-3 font-mono text-xs">{{ $dok->barang->nomor_bl_awb ?? $dok->barang->nomor_bl ?? '-' }}</td>
                                <td class="px-4 py-3 font-semibold text-gray-800">{{ $dok->jenis_dokumen ?? '-' }}</td>
                                <td class="px-4 py-3 text-center">
                                    @if($filename)
                                        <a href="{{ asset('uploads/dokumen/' . $filename) }}" target="_blank" class="text-blue-600 hover:underline text-xs font-semibold">
                                            Lihat File &rarr;
                                        </a>
                                    @else
                                        <span class="text-gray-400 text-xs">File tidak ada</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-center">
                                    @if($dok->status_verifikasi == 'Disetujui')
                                        <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                            Disetujui
                                        </span>
                                    @else
                                        <span class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            {{ $dok->status_verifikasi ?? 'Menunggu Verifikasi' }}
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-center">
                                    @if($dok->status_verifikasi != 'Disetujui')
                                        <form action="{{ route('dokumen.verifikasi', $dok->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded-lg text-xs font-bold transition">
                                                Setujui
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-xs text-gray-400 font-medium">Selesai</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-4 py-8 text-center text-gray-400 italic">
                                    Belum ada data dokumen untuk dilacak. Silakan lakukan upload dokumen terlebih dahulu.
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