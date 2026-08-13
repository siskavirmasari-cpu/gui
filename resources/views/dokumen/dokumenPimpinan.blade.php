<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload Dokumen Data Barang Import-Export - PT Gajah Unggul International') }}
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

            <!-- Form Upload Dokumen Data Barang -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 mb-8 border border-gray-100">
                <h3 class="text-lg font-bold text-gray-800 mb-4">+ Upload Dokumen untuk Data Barang</h3>
                
                <form action="{{ route('dokumen.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <!-- Pilih Barang -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Pilih Data Barang (Import / Export)</label>
                            <select name="barang_id" class="w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500" required>
                                <option value="">-- Pilih Barang --</option>
                                @foreach($barangs as $item)
                                    <option value="{{ $item->id }}">[{{ $item->jenis_kegiatan }}] {{ $item->nama_barang }} (BL: {{ $item->nomor_bl_awb }})</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Jenis Dokumen Sesuai Spesifikasi -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Jenis Dokumen Berkas</label>
                            <select name="jenis_dokumen" class="w-full text-sm border-gray-300 rounded-lg shadow-sm focus:border-red-500 focus:ring-red-500" required>
                                <option value="">-- Pilih Jenis Dokumen --</option>
                                <option value="Bill of Lading (B/L)">Bill of Lading (B/L)</option>
                                <option value="Invoice">Invoice</option>
                                <option value="Packing List">Packing List</option>
                                <option value="PIB / PEB">PIB / PEB</option>
                                <option value="Surat Jalan">Surat Jalan</option>
                                <option value="Dokumen Bea Cukai">Dokumen Bea Cukai</option>
                                <option value="Foto Container">Foto Container</option>
                            </select>
                        </div>

                        <!-- File Upload -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">File Berkas (PDF / Foto)</label>
                            <input type="file" name="file_dokumen" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100" required>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg text-sm font-semibold shadow transition">
                            Upload Dokumen Barang
                        </button>
                    </div>
                </form>
            </div>

            <!-- Tabel Daftar Dokumen Data Barang -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border border-gray-100">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-gray-800">Daftar Dokumen Data Barang Ter-upload</h3>
                    <span class="text-xs text-gray-500 font-semibold bg-gray-100 px-3 py-1 rounded-full">Total: {{ count($dokumens) }} Berkas</span>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                            <tr>
                                <th class="px-4 py-3 text-left">No</th>
                                <th class="px-4 py-3 text-left">Data Barang (Kegiatan)</th>
                                <th class="px-4 py-3 text-left">Jenis Dokumen</th>
                                <th class="px-4 py-3 text-left">Nama File & Preview</th>
                                <th class="px-4 py-3 text-center">Status</th>
                                <th class="px-4 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-gray-700">
                            @forelse($dokumens as $index => $dok)
                            <tr>
                                <td class="px-4 py-3">{{ $index + 1 }}</td>
                                <td class="px-4 py-3 font-medium text-gray-900">
                                    {{ $dok->barang->nama_barang ?? '-' }} 
                                    <span class="block text-xs text-gray-500">BL: {{ $dok->barang->nomor_bl_awb ?? '-' }}</span>
                                </td>
                                <td class="px-4 py-3 font-medium">
                                    @if($dok->file_bill_lading) Bill of Lading (B/L)
                                    @elseif($dok->file_invoice) Invoice
                                    @elseif($dok->file_packing_list) Packing List
                                    @elseif($dok->file_pib_peb) PIB / PEB
                                    @elseif($dok->file_surat_jalan) Surat Jalan
                                    @elseif($dok->file_foto_container) Foto Container
                                    @else - @endif
                                </td>
                                <td class="px-4 py-3">
                                    @php
                                        $fileName = $dok->file_bill_lading ?? $dok->file_invoice ?? $dok->file_packing_list ?? $dok->file_pib_peb ?? $dok->file_surat_jalan ?? $dok->file_foto_container;
                                        $extension = $fileName ? pathinfo($fileName, PATHINFO_EXTENSION) : '';
                                        $isImage = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'webp']);
                                    @endphp

                                    @if($fileName)
                                        <div class="flex items-center space-x-3">
                                            @if($isImage)
                                                <img src="{{ asset('uploads/dokumen/' . $fileName) }}" alt="Preview" class="w-12 h-12 object-cover rounded-lg border shadow-sm cursor-pointer hover:opacity-80 transition" onclick="window.open(this.src)">
                                            @endif

                                            <div>
                                                <a href="{{ asset('uploads/dokumen/' . $fileName) }}" target="_blank" class="text-blue-600 hover:underline text-xs font-semibold block">
                                                    {{ $fileName }} &rarr;
                                                </a>
                                                @if($extension)
                                                    <span class="text-[10px] text-gray-400 uppercase">(.{{ $extension }})</span>
                                                @endif
                                            </div>
                                        </div>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        {{ $dok->status_verifikasi }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <form action="{{ route('dokumen.destroy', $dok->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus dokumen ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 text-xs font-semibold">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-4 py-8 text-center text-gray-400 italic">
                                    Belum ada dokumen data barang yang di-upload.
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