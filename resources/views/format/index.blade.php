<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800 leading-tight">
                    {{ __('Tambah Format Dokumen') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Pilih data barang, jenis dokumen, lalu sesuaikan format dokumen yang dibutuhkan.
                </p>
            </div>
            <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center rounded-xl bg-gray-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-gray-700">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <!-- Success Alert -->
            @if(session('success'))
                <div id="successAlert" class="mb-6 animate-slideInDown">
                    <div class="rounded-2xl border border-green-200 bg-gradient-to-r from-green-50 to-emerald-50 p-4 shadow-md">
                        <div class="flex items-start justify-between">
                            <div class="flex items-start gap-3">
                                <div class="mt-1 flex-shrink-0">
                                    <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-sm font-bold text-green-900">{{ session('success') }}</h3>
                                    <p class="mt-1 text-xs text-green-700">Format dokumen Anda sudah tersimpan dan siap digunakan.</p>
                                </div>
                            </div>
                            <button type="button" onclick="document.getElementById('successAlert').remove()" class="text-green-600 hover:text-green-900">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <style>
                    @keyframes slideInDown {
                        from {
                            opacity: 0;
                            transform: translateY(-20px);
                        }
                        to {
                            opacity: 1;
                            transform: translateY(0);
                        }
                    }
                    .animate-slideInDown {
                        animation: slideInDown 0.3s ease-out;
                    }
                </style>
            @endif

            <!-- Quick Stats -->
            @if($formatList->count() > 0)
                <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-3">
                    <div class="rounded-2xl border border-gray-200 bg-gradient-to-br from-blue-50 to-blue-100 p-4 shadow-sm">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs font-semibold uppercase text-blue-600">Total Format</p>
                                <p class="mt-1 text-3xl font-bold text-blue-900">{{ $formatList->count() }}</p>
                            </div>
                            <svg class="h-10 w-10 text-blue-200" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 4a2 2 0 012-2h6a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" />
                            </svg>
                        </div>
                    </div>
                    <div class="rounded-2xl border border-gray-200 bg-gradient-to-br from-emerald-50 to-emerald-100 p-4 shadow-sm">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs font-semibold uppercase text-emerald-600">Barang Terhubung</p>
                                <p class="mt-1 text-3xl font-bold text-emerald-900">{{ $formatList->pluck('barang_id')->unique()->count() }}</p>
                            </div>
                            <svg class="h-10 w-10 text-emerald-200" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.5 1.5H5.75A2.25 2.25 0 003.5 3.75v12.5A2.25 2.25 0 005.75 18.5h8.5a2.25 2.25 0 002.25-2.25V6.5" />
                            </svg>
                        </div>
                    </div>
                    <div class="rounded-2xl border border-gray-200 bg-gradient-to-br from-purple-50 to-purple-100 p-4 shadow-sm">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs font-semibold uppercase text-purple-600">Jenis Dokumen</p>
                                <p class="mt-1 text-3xl font-bold text-purple-900">{{ $formatList->pluck('jenis_dokumen')->unique()->count() }}</p>
                            </div>
                            <svg class="h-10 w-10 text-purple-200" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
            @endif

            <div class="grid items-start gap-6 lg:grid-cols-[1.1fr_0.9fr]">
                <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                    <div class="mb-6">
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-red-500">Format Dokumen</p>
                        <h3 class="mt-2 text-2xl font-bold text-gray-900">Buat Template Dokumen</h3>
                    </div>

                    <form method="POST" action="{{ route('format.store') }}" class="space-y-6">
                        @csrf
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-gray-700">Pilih Data Barang (Import / Export)</label>
                            <div class="relative">
                                <select id="barangSelect" name="barang_id" class="w-full appearance-none rounded-xl border border-gray-300 bg-white px-4 py-3 pr-10 text-base text-gray-900 shadow-sm outline-none transition focus:border-red-500 focus:ring-2 focus:ring-red-100" required>
                                    <option value="" selected disabled>-- Pilih Barang --</option>
                                    @foreach($dataBarang as $item)
                                        <option value="{{ $item['value'] }}">{{ $item['label'] }}</option>
                                    @endforeach
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500">
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.24 4.5a.75.75 0 01-1.08 0l-4.24-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" /></svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-gray-700">Jenis Dokumen Berkas</label>
                            <div class="relative">
                                <select id="jenisDokumenSelect" name="jenis_dokumen" class="w-full appearance-none rounded-xl border border-gray-300 bg-white px-4 py-3 pr-10 text-base text-gray-900 shadow-sm outline-none transition focus:border-red-500 focus:ring-2 focus:ring-red-100" required>
                                    <option value="" selected disabled>-- Pilih Jenis Dokumen --</option>
                                    @foreach($jenisDokumen as $item)
                                        <option value="{{ $item['value'] }}">{{ $item['label'] }}</option>
                                    @endforeach
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500">
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.24 4.5a.75.75 0 01-1.08 0l-4.24-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" /></svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-gray-700">Nama Format</label>
                            <input id="namaFormatInput" type="text" name="nama_format" value="Invoice" class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-base text-gray-900 shadow-sm outline-none transition focus:border-red-500 focus:ring-2 focus:ring-red-100" placeholder="Masukkan nama format" required />
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-gray-700">Deskripsi</label>
                            <textarea name="deskripsi" rows="4" class="w-full resize-none rounded-xl border border-gray-300 bg-white px-4 py-3 text-base text-gray-900 shadow-sm outline-none transition focus:border-red-500 focus:ring-2 focus:ring-red-100" placeholder="Tulis deskripsi format dokumen ...">Template dokumen untuk kebutuhan pengajuan import / export.</textarea>
                        </div>

                        <div class="flex flex-wrap gap-3 pt-2">
                            <button type="submit" class="rounded-xl bg-red-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-red-700">
                                Buat format
                            </button>
                            <button type="reset" class="rounded-xl border border-gray-300 bg-white px-5 py-2.5 text-sm font-semibold text-gray-700 transition hover:bg-gray-50">
                                Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Daftar Format yang Sudah Disimpan -->
            <div class="mt-12">
                <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-red-500">Daftar Format Dokumen</p>
                        <h3 class="mt-2 text-2xl font-bold text-gray-900">Format yang Sudah Disimpan</h3>
                    </div>
                    @if($formatList->count() > 0)
                        <a href="#format-list-table" class="inline-flex items-center gap-2 rounded-xl bg-red-600 px-6 py-3 text-sm font-semibold text-white shadow-md transition hover:bg-red-700 hover:shadow-lg">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                            Lihat {{ $formatList->count() }} Format Tersimpan
                        </a>
                    @endif
                </div>

                @if($formatList->count() > 0)
                    <div id="format-list-table" class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-lg">
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gradient-to-r from-gray-50 to-gray-100 border-b-2 border-gray-200">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-700">No</th>
                                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-700">Nama Format</th>
                                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-700">Data Barang</th>
                                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-700">Jenis Dokumen</th>
                                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-700">Tanggal</th>
                                        <th class="px-6 py-4 text-center text-sm font-bold text-gray-700">Status</th>
                                        <th class="px-6 py-4 text-center text-sm font-bold text-gray-700">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @foreach($formatList as $key => $item)
                                        <tr class="hover:bg-gradient-to-r hover:from-red-50 hover:to-orange-50 transition-colors duration-200">
                                            <td class="px-6 py-4 text-sm font-semibold text-gray-900">{{ $key + 1 }}</td>
                                            <td class="px-6 py-4 text-sm font-semibold text-gray-900">
                                                <div class="flex items-center gap-2">
                                                    <svg class="h-5 w-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                    </svg>
                                                    {{ $item->nama_format }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-600">
                                                @if($item->barang)
                                                    <span class="inline-flex items-center rounded-full bg-blue-50 px-3 py-1.5 text-xs font-semibold text-blue-700">
                                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                            <path d="M10.5 1.5H5.75A2.25 2.25 0 003.5 3.75v12.5A2.25 2.25 0 005.75 18.5h8.5a2.25 2.25 0 002.25-2.25V6.5" />
                                                        </svg>
                                                        {{ $item->barang->nama_barang }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-600">
                                                <span class="inline-flex items-center rounded-full bg-purple-50 px-3 py-1.5 text-xs font-semibold text-purple-700">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                                    </svg>
                                                    {{ str_replace('-', ' ', ucfirst($item->jenis_dokumen)) }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-600">
                                                <div class="flex flex-col">
                                                    <span class="font-medium">{{ $item->created_at->format('d M Y') }}</span>
                                                    <span class="text-xs text-gray-400">{{ $item->created_at->format('H:i') }}</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <span class="inline-flex items-center rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                                                    <svg class="h-3 w-3 mr-1.5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                    </svg>
                                                    Tersimpan
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <div class="flex gap-2 justify-center">
                                                    <button type="button" onclick="openDetailModal({{ $item->id }})" class="inline-flex items-center rounded-lg bg-blue-50 px-3 py-2 text-xs font-semibold text-blue-700 hover:bg-blue-100 transition duration-200" title="Lihat Format">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                    </button>
                                                    <button type="button" class="inline-flex items-center rounded-lg bg-red-50 px-3 py-2 text-xs font-semibold text-red-700 hover:bg-red-100 transition duration-200" title="Hapus Format">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="rounded-2xl border-2 border-dashed border-gray-300 bg-gray-50 p-12 text-center">
                        <div class="inline-flex items-center justify-center h-16 w-16 rounded-full bg-gray-200 mb-4">
                            <svg class="h-8 w-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <p class="text-lg font-semibold text-gray-700">Belum Ada Format yang Disimpan</p>
                        <p class="text-sm text-gray-500 mt-2">Buat format dokumen baru dengan mengisi form di atas untuk memulai.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

<script>
    const barangSelect = document.getElementById('barangSelect');
    const jenisDokumenSelect = document.getElementById('jenisDokumenSelect');
    const namaFormatInput = document.getElementById('namaFormatInput');

    const previewBarangType = document.getElementById('previewBarangType');
    const previewDocType = document.getElementById('previewDocType');
    const previewBl = document.getElementById('previewBl');
    const previewNamaBarang = document.getElementById('previewNamaBarang');
    const previewNegara = document.getElementById('previewNegara');
    const previewJumlah = document.getElementById('previewJumlah');

    const docNameMap = {
        'bill-of-lading': 'Bill of Lading',
        'invoice': 'Invoice',
        'packing-list': 'Packing List',
        'pib-peb': 'PIB / PEB',
        'surat-jalan': 'Surat Jalan',
        'dokumen-bea-cukai': 'Dokumen Bea Cukai',
        'foto-container': 'Foto Container',
    };

    function updatePreview() {
        const selectedBarangText = barangSelect.value ? barangSelect.options[barangSelect.selectedIndex].text : '';
        const selectedDocValue = jenisDokumenSelect.value;

        if (selectedBarangText) {
            const jenisKegiatan = selectedBarangText.match(/^\[(.*?)\]/)?.[1] || 'Import';
            const namaBarang = selectedBarangText.replace(/^\[[^\]]+\]\s*/, '').replace(/\s*\(BL:\s*[^)]+\)\s*$/, '');
            const noBl = selectedBarangText.match(/\(BL:\s*([^\)]+)\)/)?.[1] || '--';
            const negara = 'Indonesia';
            const jumlah = '500 Karton';

            previewBarangType.textContent = jenisKegiatan;
            previewBl.textContent = 'BL: ' + noBl;
            previewNamaBarang.textContent = namaBarang;
            previewNegara.textContent = negara;
            previewJumlah.textContent = jumlah;
        } else {
            previewBarangType.textContent = '--';
            previewBl.textContent = '--';
            previewNamaBarang.textContent = '--';
            previewNegara.textContent = '--';
            previewJumlah.textContent = '--';
        }

        if (selectedDocValue) {
            const namaJenis = docNameMap[selectedDocValue] || selectedDocValue;
            previewDocType.textContent = namaJenis;
            namaFormatInput.value = namaJenis;
        } else {
            previewDocType.textContent = '--';
        }
    }

    barangSelect.addEventListener('change', updatePreview);
    jenisDokumenSelect.addEventListener('change', updatePreview);
    updatePreview();

    // Auto-hide success alert after 5 seconds
    const successAlert = document.getElementById('successAlert');
    if (successAlert) {
        setTimeout(() => {
            successAlert.style.opacity = '0';
            successAlert.style.transform = 'translateY(-20px)';
            successAlert.style.transition = 'all 0.3s ease-out';
            setTimeout(() => successAlert.remove(), 300);
        }, 5000);
    }

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Modal untuk detail format
    function openDetailModal(formatId) {
        const modal = document.getElementById('detailModal');
        const modalContent = document.getElementById('detailModalContent');
        
        // Show loading state
        modalContent.innerHTML = '<div class="text-center py-8"><div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-red-600"></div><p class="mt-4 text-gray-600">Memuat data...</p></div>';
        modal.style.display = 'flex';
        modal.style.opacity = '0';
        setTimeout(() => modal.style.opacity = '1', 10);

        // Fetch data dari backend
        fetch(`/format/view/${formatId}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    modalContent.innerHTML = `<div class="text-center py-8 text-red-600"><p>${data.error}</p></div>`;
                    return;
                }

                // Generate HTML untuk detail format
                const barangInfo = data.barang ? `
                    <div class="mb-4 pb-4 border-b border-gray-200">
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div>
                                <p class="text-gray-600 font-medium">Data Barang</p>
                                <p class="text-gray-900 font-semibold">${data.barang.nama_barang}</p>
                            </div>
                            <div>
                                <p class="text-gray-600 font-medium">Jenis Kegiatan</p>
                                <p class="text-gray-900 font-semibold">${data.barang.jenis_kegiatan}</p>
                            </div>
                            <div>
                                <p class="text-gray-600 font-medium">No. BL/AWB</p>
                                <p class="text-gray-900 font-semibold">${data.barang.nomor_bl_awb}</p>
                            </div>
                            <div>
                                <p class="text-gray-600 font-medium">Negara Asal</p>
                                <p class="text-gray-900 font-semibold">${data.barang.negara_asal}</p>
                            </div>
                        </div>
                    </div>
                ` : '';

                const html = `
                    <div class="max-h-[80vh] overflow-y-auto">
                        <div class="mb-6">
                            <h2 class="text-2xl font-bold text-gray-900 mb-2">${data.nama_format}</h2>
                            <p class="text-sm text-gray-600">${data.deskripsi || 'Tidak ada deskripsi'}</p>
                        </div>

                        ${barangInfo}

                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div>
                                <p class="text-gray-600 font-medium text-sm">Jenis Dokumen</p>
                                <p class="text-gray-900 font-semibold text-lg">${data.jenis_dokumen}</p>
                            </div>
                            <div>
                                <p class="text-gray-600 font-medium text-sm">Dibuat Pada</p>
                                <p class="text-gray-900 font-semibold text-lg">${data.created_at}</p>
                            </div>
                        </div>

                        <div class="rounded-lg bg-blue-50 border border-blue-200 p-4">
                            <p class="text-sm text-blue-900"><strong>Format ID:</strong> ${data.id}</p>
                        </div>
                    </div>
                `;

                modalContent.innerHTML = html;
            })
            .catch(error => {
                console.error('Error:', error);
                modalContent.innerHTML = '<div class="text-center py-8 text-red-600"><p>Terjadi kesalahan saat memuat data</p></div>';
            });
    }

    // Close modal
    function closeDetailModal() {
        const modal = document.getElementById('detailModal');
        modal.style.opacity = '0';
        setTimeout(() => {
            modal.style.display = 'none';
        }, 300);
    }

    // Close modal ketika klik di luar
    document.getElementById('detailModal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeDetailModal();
        }
    });
</script>

<!-- Detail Format Modal -->
<div id="detailModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black bg-opacity-50 transition-opacity duration-300" style="display: none; opacity: 0;">
    <div class="relative w-full max-w-2xl mx-4 bg-white rounded-2xl shadow-2xl">
        <!-- Header -->
        <div class="sticky top-0 flex items-center justify-between border-b border-gray-200 bg-gradient-to-r from-blue-50 to-blue-100 px-6 py-4 rounded-t-2xl">
            <div>
                <h3 class="text-lg font-bold text-gray-900">Detail Format Dokumen</h3>
                <p class="text-xs text-gray-600 mt-1">Informasi lengkap format yang tersimpan</p>
            </div>
            <button type="button" onclick="closeDetailModal()" class="text-gray-600 hover:text-gray-900 transition">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Content -->
        <div id="detailModalContent" class="px-6 py-4">
            <!-- Content akan di-populate oleh JavaScript -->
        </div>

        <!-- Footer -->
        <div class="border-t border-gray-200 bg-gray-50 px-6 py-4 flex gap-3 justify-end rounded-b-2xl">
            <button type="button" onclick="closeDetailModal()" class="inline-flex items-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50 transition">
                Tutup
            </button>
            <a href="#" class="inline-flex items-center rounded-lg bg-red-600 px-4 py-2 text-sm font-semibold text-white hover:bg-red-700 transition">
                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Edit Format
            </a>
        </div>
    </div>
</div>

<style>
    #detailModal {
        animation: fadeIn 0.3s ease-out;
    }
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
</style>
</x-app-layout>
