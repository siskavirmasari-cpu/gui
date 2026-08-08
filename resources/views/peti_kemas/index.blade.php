<x-app-layout>

<body class="bg-gray-50 min-h-screen">

    <main class="max-w-6xl mx-auto p-6 mt-4">
        
        <!-- Notifikasi Sukses -->
        @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6 text-sm flex items-center justify-between">
                <span>{{ session('success') }}</span>
                <span class="font-bold text-xs uppercase tracking-wider">Berhasil</span>
            </div>
        @endif

        <!-- Error Validation Message -->
        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6 text-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Tambah Peti Kemas Baru -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-8">
            <h2 class="text-md font-bold text-gray-800 mb-1">+ Tambah Peti Kemas Baru</h2>
            <p class="text-xs text-gray-500 mb-4">Masukkan data container dengan benar untuk pencatatan sistem.</p>
            
            <form action="{{ route('peti-kemas.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700 text-xs font-bold mb-1">NOMOR CONTAINER</label>
                        <input type="text" name="nomor_container" class="w-full border border-gray-300 p-2 rounded-lg text-sm" placeholder="Contoh: TGBU1234567" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 text-xs font-bold mb-1">UKURAN</label>
                        <select name="ukuran" class="w-full border border-gray-300 p-2 rounded-lg text-sm bg-white" required>
                            <option value="">-- Pilih Ukuran --</option>
                            <option value="20 Feet">20 Feet</option>
                            <option value="40 Feet">40 Feet</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 text-xs font-bold mb-1">JENIS CONTAINER</label>
                        <input type="text" name="jenis_container" class="w-full border border-gray-300 p-2 rounded-lg text-sm" placeholder="Dry / Reefer / Flat Rack" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 text-xs font-bold mb-1">STATUS OPERASIONAL</label>
                        <select name="status" class="w-full border border-gray-300 p-2 rounded-lg text-sm bg-white" required>
                            <option value="Proses">Proses</option>
                            <option value="Masuk">Masuk</option>
                            <option value="Keluar">Keluar</option>
                            <option value="Selesai">Selesai</option>
                            <option value="Bermasalah">Bermasalah</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold text-xs px-6 py-2.5 rounded-lg transition shadow-sm">
                    Simpan Data Peti Kemas
                </button>
            </form>
        </div>

        <!-- Tabel Daftar Peti Kemas Terdata -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-bold text-gray-800 text-md">Daftar Peti Kemas Terdata</h3>
                <span class="text-xs text-gray-500 font-medium">Total: {{ isset($petiKemas) ? count($petiKemas) : 0 }} Container</span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-sm">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100 text-gray-600 text-xs uppercase tracking-wider">
                            <th class="p-3">No</th>
                            <th class="p-3">No. Container</th>
                            <th class="p-3">Ukuran</th>
                            <th class="p-3">Jenis</th>
                            <th class="p-3">Status (Klik untuk Ubah)</th>
                            <th class="p-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($petiKemas as $index => $item)
                            <tr class="hover:bg-gray-50">
                                <td class="p-3 text-gray-500">{{ method_exists($petiKemas, 'firstItem') && $petiKemas->firstItem() ? $petiKemas->firstItem() + $index : $index + 1 }}</td>
                                <td class="p-3 font-semibold text-gray-800">{{ $item->nomor_container }}</td>
                                <td class="p-3 text-gray-600">{{ $item->ukuran }}</td>
                                <td class="p-3 text-gray-600">{{ $item->jenis_container }}</td>
                                
                                <!-- KOLOM STATUS INTERAKTIF (BISA DIKLIK / DIGANTI LANGSUNG) -->
                                <td class="p-3">
                                    <form action="{{ route('peti-kemas.update-status', $item->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        
                                        <select name="status" onchange="this.form.submit()" class="text-xs font-semibold px-3 py-1.5 rounded-full border border-gray-200 cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500
                                            @if($item->status == 'Selesai') text-green-700 bg-green-50 
                                            @elseif($item->status == 'Keluar') text-gray-700 bg-gray-100 
                                            @elseif($item->status == 'Bermasalah') text-red-700 bg-red-50 
                                            @else text-yellow-700 bg-yellow-50 @endif">
                                            
                                            <option value="Proses" {{ $item->status == 'Proses' ? 'selected' : '' }}>Proses</option>
                                            <option value="Masuk" {{ $item->status == 'Masuk' ? 'selected' : '' }}>Masuk</option>
                                            <option value="Keluar" {{ $item->status == 'Keluar' ? 'selected' : '' }}>Keluar</option>
                                            <option value="Selesai" {{ $item->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                            <option value="Bermasalah" {{ $item->status == 'Bermasalah' ? 'selected' : '' }}>Bermasalah</option>
                                        </select>
                                    </form>
                                </td>

                                <td class="p-3 text-center space-x-3">
                                    <!-- Tombol Edit / Modal trigger jika ada -->
                                    <button type="button" onclick="alert('Gunakan dropdown status di sebelah kiri untuk mengubah status dengan cepat, atau gunakan fitur edit utama.')" class="text-blue-600 hover:underline text-xs font-medium">Edit</button>
                                    
                                    <!-- Aksi Hapus -->
                                    <form action="{{ route('peti-kemas.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus data container ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline text-xs font-medium">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-8 text-center text-gray-400 text-sm">
                                    Belum ada data peti kemas yang terdaftar di sistem.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination jika tersedia -->
            @if(method_exists($petiKemas, 'links'))
                <div class="mt-4">
                    {{ $petiKemas->links() }}
                </div>
            @endif
        </div>

    </main>
</body>
</x-app-layout>