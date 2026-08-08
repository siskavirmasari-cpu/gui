<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Data Import dan Export - PT Gajah Unggul International') }}
            </h2>
            <a href="{{ route('dashboard') }}" class="text-sm bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-lg transition">
                ← Kembali ke Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Notifikasi Sukses -->
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Form Tambah Data Import Export -->
            <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-200">
                <h3 class="text-lg font-bold text-gray-800 mb-4">+ Input Data Kegiatan Import / Export</h3>
                <form action="{{ route('barang.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Jenis Kegiatan</label>
                        <select name="jenis_kegiatan" class="w-full border-gray-300 rounded-xl focus:ring-red-500 focus:border-red-500 text-sm" required>
                            <option value="">-- Pilih Jenis --</option>
                            <option value="Import">Import</option>
                            <option value="Export">Export</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Nama Barang</label>
                        <input type="text" name="nama_barang" placeholder="Contoh: Sparepart Mesin / Tekstil" class="w-full border-gray-300 rounded-xl focus:ring-red-500 focus:border-red-500 text-sm" required>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Negara Asal / Tujuan</label>
                        <input type="text" name="negara_asal_tujuan" placeholder="Contoh: Jepang / Singapura" class="w-full border-gray-300 rounded-xl focus:ring-red-500 focus:border-red-500 text-sm" required>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Nama Kapal</label>
                        <input type="text" name="nama_kapal" placeholder="Contoh: MV Majestic Blue" class="w-full border-gray-300 rounded-xl focus:ring-red-500 focus:border-red-500 text-sm" required>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Nomor BL / AWB</label>
                        <input type="text" name="nomor_bl_awb" placeholder="Contoh: BL-992011/JKT" class="w-full border-gray-300 rounded-xl focus:ring-red-500 focus:border-red-500 text-sm" required>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Tanggal Kedatangan / Keberangkatan</label>
                        <input type="date" name="tanggal_kegiatan" class="w-full border-gray-300 rounded-xl focus:ring-red-500 focus:border-red-500 text-sm" required>
                    </div>

                    <div class="md:col-span-3 flex justify-end mt-2">
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2.5 px-6 rounded-xl text-sm transition shadow-md">
                            Simpan Data Kegiatan
                        </button>
                    </div>
                </form>
            </div>

            <!-- Tabel Daftar Data -->
            <div class="bg-white rounded-2xl shadow-md border border-gray-200 overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-gray-800">Daftar Kegiatan Import & Export</h3>
                    <span class="text-xs text-gray-500">Total: {{ $barangs->total() }} Record</span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200 text-gray-600 font-semibold uppercase text-xs">
                                <th class="py-3 px-4">No</th>
                                <th class="py-3 px-4">Jenis</th>
                                <th class="py-3 px-4">Nama Barang</th>
                                <th class="py-3 px-4">Asal / Tujuan</th>
                                <th class="py-3 px-4">Nama Kapal</th>
                                <th class="py-3 px-4">No. BL/AWB</th>
                                <th class="py-3 px-4">Tanggal</th>
                                <th class="py-3 px-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($barangs as $index => $item)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="py-3 px-4 font-medium text-gray-500">{{ $barangs->firstItem() + $index }}</td>
                                    <td class="py-3 px-4">
                                        @if($item->jenis_kegiatan == 'Import')
                                            <span class="bg-blue-100 text-blue-800 text-xs px-2.5 py-1 rounded-full font-bold">Import</span>
                                        @else
                                            <span class="bg-green-100 text-green-800 text-xs px-2.5 py-1 rounded-full font-bold">Export</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4 font-bold text-gray-800">{{ $item->nama_barang }}</td>
                                    <td class="py-3 px-4 text-gray-600">{{ $item->negara_asal_tujuan }}</td>
                                    <td class="py-3 px-4 text-gray-700 font-medium">{{ $item->nama_kapal }}</td>
                                    <td class="py-3 px-4 text-gray-600 font-mono text-xs">{{ $item->nomor_bl_awb }}</td>
                                    <td class="py-3 px-4 text-gray-600">{{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->format('d/m/Y') }}</td>
                                    <td class="py-3 px-4 text-center space-x-2">
                                        <button onclick="openEditModal('{{ $item->id }}', '{{ $item->jenis_kegiatan }}', '{{ $item->nama_barang }}', '{{ $item->negara_asal_tujuan }}', '{{ $item->nama_kapal }}', '{{ $item->nomor_bl_awb }}', '{{ $item->tanggal_kegiatan }}')" 
                                                class="text-blue-600 hover:text-blue-800 font-bold text-xs mr-2">
                                            Edit
                                        </button>

                                        <form action="{{ route('barang.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 font-bold text-xs">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="py-8 text-center text-gray-400">
                                        Belum ada data kegiatan import/export. Silakan tambah data di atas.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-4 border-t border-gray-100">
                    {{ $barangs->links() }}
                </div>
            </div>

        </div>
    </div>

    <!-- MODAL EDIT DATA -->
    <div id="editModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-2xl shadow-xl w-full max-w-lg border border-gray-200">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold text-gray-800">Edit Data Import / Export</h3>
                <button type="button" onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600 font-bold">✕</button>
            </div>

            <form id="editForm" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Jenis Kegiatan</label>
                    <select id="edit_jenis_kegiatan" name="jenis_kegiatan" class="w-full border-gray-300 rounded-xl text-sm" required>
                        <option value="Import">Import</option>
                        <option value="Export">Export</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Nama Barang</label>
                    <input type="text" id="edit_nama_barang" name="nama_barang" class="w-full border-gray-300 rounded-xl text-sm" required>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Negara Asal / Tujuan</label>
                    <input type="text" id="edit_negara_asal_tujuan" name="negara_asal_tujuan" class="w-full border-gray-300 rounded-xl text-sm" required>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Nama Kapal</label>
                    <input type="text" id="edit_nama_kapal" name="nama_kapal" class="w-full border-gray-300 rounded-xl text-sm" required>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Nomor BL / AWB</label>
                    <input type="text" id="edit_nomor_bl_awb" name="nomor_bl_awb" class="w-full border-gray-300 rounded-xl text-sm" required>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Tanggal Kegiatan</label>
                    <input type="date" id="edit_tanggal_kegiatan" name="tanggal_kegiatan" class="w-full border-gray-300 rounded-xl text-sm" required>
                </div>

                <div class="flex justify-end space-x-2 pt-2">
                    <button type="button" onclick="closeEditModal()" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-xl text-sm">Batal</button>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-xl text-sm shadow-md transition">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(id, jenis, nama, negara, kapal, bl, tanggal) {
            document.getElementById('editForm').action = '/barang/' + id;
            document.getElementById('edit_jenis_kegiatan').value = jenis;
            document.getElementById('edit_nama_barang').value = nama;
            document.getElementById('edit_negara_asal_tujuan').value = negara;
            document.getElementById('edit_nama_kapal').value = kapal;
            document.getElementById('edit_nomor_bl_awb').value = bl;
            document.getElementById('edit_tanggal_kegiatan').value = tanggal;
            document.getElementById('editModal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }
    </script>
</x-app-layout>