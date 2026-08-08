<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan Operasional & Dashboard Manajemen - PT Gajah Unggul International') }}
        </h2>
    </x-slot>

    <!-- CSS khusus untuk cetak/print laporan -->
    <style>
        @media print {
            body * {
                visibility: hidden !important;
            }
            .print-area, .print-area * {
                visibility: visible !important;
            }
            .print-area {
                position: absolute !important;
                left: 0 !important;
                top: 0 !important;
                width: 100% !important;
                padding: 0 !important;
            }
            .no-print {
                display: none !important;
            }
            .shadow-sm, .shadow-md, .shadow-lg {
                box-shadow: none !important;
            }
            body {
                background: white !important;
            }
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Filter Periode Bulan & Tombol Cetak / PDF (Bagian Atas) -->
            <div class="mb-6 flex flex-col sm:flex-row justify-between items-center gap-4 bg-white p-4 rounded-xl shadow-sm border border-gray-100 no-print">
                <form method="GET" action="{{ route('laporan.index') }}" class="flex items-center gap-2 w-full sm:w-auto">
                    <label for="bulan" class="text-xs font-semibold text-gray-600">Filter Periode Bulan:</label>
                    <select name="bulan" id="bulan" class="border-gray-300 rounded-lg text-xs focus:border-red-500 focus:ring-red-500">
                        <option value="">Semua Bulan</option>
                        <option value="01" {{ request('bulan') == '01' ? 'selected' : '' }}>Januari</option>
                        <option value="02" {{ request('bulan') == '02' ? 'selected' : '' }}>Februari</option>
                        <option value="03" {{ request('bulan') == '03' ? 'selected' : '' }}>Maret</option>
                        <option value="04" {{ request('bulan') == '04' ? 'selected' : '' }}>April</option>
                        <option value="05" {{ request('bulan') == '05' ? 'selected' : '' }}>Mei</option>
                        <option value="06" {{ request('bulan') == '06' ? 'selected' : '' }}>Juni</option>
                        <option value="07" {{ request('bulan') == '07' ? 'selected' : '' }}>Juli</option>
                        <option value="08" {{ request('bulan') == '08' ? 'selected' : '' }}>Agustus</option>
                        <option value="09" {{ request('bulan') == '09' ? 'selected' : '' }}>September</option>
                        <option value="10" {{ request('bulan') == '10' ? 'selected' : '' }}>Oktober</option>
                        <option value="11" {{ request('bulan') == '11' ? 'selected' : '' }}>November</option>
                        <option value="12" {{ request('bulan') == '12' ? 'selected' : '' }}>Desember</option>
                    </select>
                    <button type="submit" class="bg-gray-800 hover:bg-gray-900 text-white px-3 py-1.5 rounded-lg text-xs font-medium transition">
                        Terapkan
                    </button>
                </form>

                <div class="flex items-center gap-2">
                    <button onclick="window.print()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-xs font-semibold transition flex items-center gap-1.5 shadow-sm">
                        🖨️ Cetak / PDF Laporan
                    </button>
                    <button onclick="exportTableToExcel('laporan-table', 'laporan-operasional')" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-xs font-semibold transition flex items-center gap-1.5 shadow-sm">
                        📄 Export Excel
                    </button>
                    <a href="{{ route('dashboard') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg text-xs font-semibold transition">
                        &larr; Kembali ke Dashboard
                    </a>
                </div>
            </div>

            <!-- Ringkasan Statistik Status Container (Sesuai Dashboard Manajemen) -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border border-gray-100">
                    <p class="text-xs font-semibold text-gray-500 uppercase">Container Masuk Hari Ini</p>
                    <p class="text-2xl font-bold text-indigo-600 mt-2">{{ $containerMasukHariIni }} <span class="text-xs font-normal text-gray-500">Unit</span></p>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border border-gray-100">
                    <p class="text-xs font-semibold text-gray-500 uppercase">Container Dalam Proses</p>
                    <p class="text-2xl font-bold text-amber-500 mt-2">{{ $containerProses }} <span class="text-xs font-normal text-gray-500">Unit</span></p>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border border-gray-100">
                    <p class="text-xs font-semibold text-gray-500 uppercase">Container Keluar / Selesai</p>
                    <p class="text-2xl font-bold text-green-600 mt-2">{{ $containerKeluar }} <span class="text-xs font-normal text-gray-500">Unit</span></p>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border border-gray-100">
                    <p class="text-xs font-semibold text-gray-500 uppercase">Container Bermasalah</p>
                    <p class="text-2xl font-bold text-red-600 mt-2">{{ $containerBermasalah }} <span class="text-xs font-normal text-gray-500">Unit</span></p>
                </div>
            </div>

            <!-- Ringkasan Statistik Umum & Dokumen -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border border-gray-100">
                    <p class="text-xs font-semibold text-gray-500 uppercase">Total Peti Kemas</p>
                    <p class="text-2xl font-bold text-gray-800 mt-2">{{ $totalPetiKemas }} <span class="text-xs font-normal text-gray-500">Unit</span></p>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border border-gray-100">
                    <p class="text-xs font-semibold text-gray-500 uppercase">Data Import / Export</p>
                    <p class="text-2xl font-bold text-blue-600 mt-2">{{ $totalBarang }} <span class="text-xs font-normal text-gray-500">Barang</span></p>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border border-gray-100">
                    <p class="text-xs font-semibold text-gray-500 uppercase">Total Trip Pengangkutan</p>
                    <p class="text-2xl font-bold text-green-600 mt-2">{{ $totalTrip }} <span class="text-xs font-normal text-gray-500">Trip</span></p>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border border-gray-100">
                    <p class="text-xs font-semibold text-gray-500 uppercase">Rekap Dokumen Belum Lengkap</p>
                    <p class="text-2xl font-bold text-red-600 mt-2">{{ $dokumenBelumLengkap }} <span class="text-xs font-normal text-gray-500">Berkas</span></p>
                </div>
            </div>

            <!-- Bagian Grafik Import-Export Bulanan -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border border-gray-100 mb-8">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Grafik Import-Export Bulanan</h3>
                <div class="relative h-72 w-full">
                    <canvas id="grafikImportExport"></canvas>
                </div>
            </div>

            <!-- Tabel Detail Rekap Dokumen Operasional -->
            <div class="print-area bg-white overflow-hidden shadow-sm sm:rounded-xl p-6 border border-gray-100">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-gray-800">Rekapitulasi Dokumen dan Status Operasional</h3>
                    @if(isset($dokumenBelumLengkap) && $dokumenBelumLengkap > 0)
                        <span class="px-3 py-1 text-xs font-semibold rounded-full bg-red-50 text-red-600 border border-red-200">
                            ⚠️ Ada {{ $dokumenBelumLengkap }} dokumen perlu verifikasi
                        </span>
                    @endif
                </div>

                <div class="overflow-x-auto">
                    <table id="laporan-table" class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                            <tr>
                                <th class="px-4 py-3 text-left">No</th>
                                <th class="px-4 py-3 text-left">Nama Barang / Kegiatan</th>
                                <th class="px-4 py-3 text-left">No. BL/AWB</th>
                                <th class="px-4 py-3 text-left">Jenis Dokumen</th>
                                <th class="px-4 py-3 text-center">Status Kelengkapan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-gray-700">
                            @forelse($dokumens as $index => $dok)
                            <tr>
                                <td class="px-4 py-3">{{ $index + 1 }}</td>
                                <td class="px-4 py-3 font-medium text-gray-900">{{ $dok->barang->nama_barang ?? '-' }}</td>
                                <td class="px-4 py-3 font-mono text-xs">{{ $dok->barang->nomor_bl_awb ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $dok->jenis_dokumen }}</td>
                                <td class="px-4 py-3 text-center">
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                        {{ $dok->status_verifikasi }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-4 py-8 text-center text-gray-400 italic">
                                    Belum ada data laporan operasional untuk ditampilkan.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- Pustaka Chart.js untuk Grafik Bulanan -->
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function exportTableToExcel(tableID, filename = '') {
            const table = document.getElementById(tableID);
            if (!table) {
                return;
            }

            const tableHtml = table.outerHTML;
            const fileName = filename ? `${filename}.xls` : 'laporan.xls';
            const uri = 'data:application/vnd.ms-excel;charset=utf-8,' + encodeURIComponent(`<!DOCTYPE html><html><head><meta charset="utf-8" /></head><body>${tableHtml}</body></html>`);

            const link = document.createElement('a');
            link.href = uri;
            link.download = fileName;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        const ctx = document.getElementById('grafikImportExport').getContext('2d');
        const grafikImportExport = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    label: 'Volume Aktivitas Peti Kemas & Barang',
                    data: [12, 19, 3, 5, 2, 3, {{ $totalPetiKemas }}, 0, 0, 0, 0, 0],
                    backgroundColor: 'rgba(59, 130, 246, 0.5)',
                    borderColor: 'rgb(59, 130, 246)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    @endpush
</x-app-layout>