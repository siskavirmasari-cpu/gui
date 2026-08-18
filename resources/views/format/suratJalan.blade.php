<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800 leading-tight">{{ __('Surat Jalan') }}</h2>
            </div>
            <a href="{{ route('format.index') }}" class="inline-flex items-center justify-center rounded-xl bg-gray-600 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-700">Kembali</a>
        </div>
    </x-slot>

    <div class="py-8">
        <form method="POST" action="{{ route('format.suratJalan.save') }}">
            @csrf
            <div class="mx-auto max-w-5xl bg-white p-6 shadow-xl ring-1 ring-gray-200" style="font-family: Arial, sans-serif; color: #1f2937;">
            <div class="grid grid-cols-12 gap-3 border-b border-gray-300 pb-4">
                <div class="col-span-4 flex items-center gap-3"><div class="flex h-14 w-14 items-center justify-center rounded-full border-2 border-blue-900 bg-blue-50 text-2xl font-black text-blue-900">🐘</div><div><div class="text-xl font-black uppercase leading-none text-blue-900">PT GAJAH UNGGUL</div><div class="text-xl font-black uppercase leading-none text-blue-900">INTERNATIONAL</div><div class="mt-1 text-xs text-gray-600">Jasa Logistik &amp; Forwarding</div></div></div>
                <div class="col-span-8 text-right"><div class="text-4xl font-black uppercase tracking-wide text-blue-900">Surat Jalan</div><div class="mt-1 text-sm font-bold uppercase text-gray-700">Delivery Order / Perjalanan Barang</div></div>
            </div>

            <div class="mt-5 grid grid-cols-3 gap-4">
                <div class="rounded border border-gray-300 p-3"><div class="mb-2 bg-blue-900 px-2 py-1 text-sm font-bold uppercase text-white">Pengirim</div><div class="text-sm">PT Gajah Unggul International</div></div>
                <div class="rounded border border-gray-300 p-3"><div class="mb-2 bg-blue-900 px-2 py-1 text-sm font-bold uppercase text-white">Penerima</div><div class="text-sm">ABC TRADING CO., LTD</div></div>
                <div class="rounded border border-gray-300 p-3"><div class="mb-2 bg-blue-900 px-2 py-1 text-sm font-bold uppercase text-white">Nomor</div><div class="text-sm">SJ/GUI/2026/0001</div></div>
            </div>

            <div class="mt-5 overflow-hidden rounded border border-gray-300">
                <table class="w-full border-collapse text-sm"><thead class="bg-gray-200 text-gray-800"><tr><th class="border border-gray-300 px-2 py-2 text-left">No.</th><th class="border border-gray-300 px-2 py-2 text-left">Nama Barang</th><th class="border border-gray-300 px-2 py-2 text-left">Nomor Kontainer</th><th class="border border-gray-300 px-2 py-2 text-left">Jumlah</th><th class="border border-gray-300 px-2 py-2 text-left">Satuan</th><th class="border border-gray-300 px-2 py-2 text-left">Keterangan</th></tr></thead><tbody><tr><td class="border border-gray-300 px-2 py-3 text-center">1</td><td class="border border-gray-300 px-2 py-3">MESIN PRODUKSI MODEL XYZ</td><td class="border border-gray-300 px-2 py-3">TGHU1234567</td><td class="border border-gray-300 px-2 py-3">2</td><td class="border border-gray-300 px-2 py-3">Unit</td><td class="border border-gray-300 px-2 py-3">Barang diterima dalam kondisi baik</td></tr><tr><td class="border border-gray-300 px-2 py-3 text-center">2</td><td class="border border-gray-300 px-2 py-3">SPARE PARTS MESIN</td><td class="border border-gray-300 px-2 py-3">TGHU7654321</td><td class="border border-gray-300 px-2 py-3">150</td><td class="border border-gray-300 px-2 py-3">Pcs</td><td class="border border-gray-300 px-2 py-3">Dibungkus sesuai prosedur</td></tr></tbody></table>
            </div>

            <div class="mt-5 grid grid-cols-3 gap-4 text-center text-sm">
                <div><div class="mb-8 border-t border-gray-400 pt-2 font-bold uppercase">Pengirim</div><div>( Nama Jelas )</div></div>
                <div><div class="mb-8 border-t border-gray-400 pt-2 font-bold uppercase">Supir / Petugas</div><div>( Nama Jelas )</div></div>
                <div><div class="mb-8 border-t border-gray-400 pt-2 font-bold uppercase">Penerima</div><div>( Nama Jelas )</div></div>
            </div>
            </div>
            <div class="mx-auto max-w-6xl bg-gray-100 px-6 py-4 flex gap-3 border-t border-gray-300 rounded-b-2xl">
                <button type="submit" class="rounded-xl bg-red-600 px-6 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-red-700">Simpan Dokumen</button>
                <button type="reset" class="rounded-xl border border-gray-300 bg-white px-6 py-2.5 text-sm font-semibold text-gray-700 transition hover:bg-gray-50">Reset</button>
                <a href="{{ route('format.index') }}" class="rounded-xl border border-gray-300 bg-white px-6 py-2.5 text-sm font-semibold text-gray-700 transition hover:bg-gray-50">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
