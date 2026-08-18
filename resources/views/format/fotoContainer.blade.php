<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800 leading-tight">{{ __('Foto Container') }}</h2>
            </div>
            <a href="{{ route('format.index') }}" class="inline-flex items-center justify-center rounded-xl bg-gray-600 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-700">Kembali</a>
        </div>
    </x-slot>

    <div class="py-8">
        <form method="POST" action="{{ route('format.fotoContainer.save') }}" enctype="multipart/form-data">
            @csrf
            <div class="mx-auto max-w-6xl bg-white p-6 shadow-xl ring-1 ring-gray-200" style="font-family: Arial, sans-serif; color: #1f2937;">
                <div class="text-center mb-6">
                    <h3 class="text-2xl font-bold uppercase text-blue-900">Dokumentasi Foto Container</h3>
                    <p class="text-sm text-gray-600 mt-2">Laporan Foto-Foto Kondisi Container</p>
                </div>

                <div class="rounded border border-gray-300 p-3 mb-6">
                    <div class="font-bold text-sm mb-2 uppercase">Informasi Container</div>
                    <div class="grid grid-cols-2 gap-3 text-sm">
                        <div><label>Nomor Kontainer:</label><input type="text" name="foto_no_kontainer" placeholder="Nomor Kontainer" class="w-full border border-gray-300 rounded px-2 py-1" /></div>
                        <div><label>Seal No.:</label><input type="text" name="foto_seal_no" placeholder="Seal No." class="w-full border border-gray-300 rounded px-2 py-1" /></div>
                        <div><label>Ukuran Container:</label><input type="text" name="foto_ukuran" placeholder="20 Feet / 40 Feet" class="w-full border border-gray-300 rounded px-2 py-1" /></div>
                        <div><label>Tanggal Dokumentasi:</label><input type="date" name="foto_tanggal" class="w-full border border-gray-300 rounded px-2 py-1" /></div>
                    </div>
                </div>

                <div class="rounded border border-gray-300 p-3 mb-6">
                    <div class="font-bold text-sm mb-2 uppercase">Foto-Foto Container</div>
                    <div class="grid grid-cols-3 gap-4 text-sm">
                        <div class="border-2 border-dashed border-gray-300 rounded p-4 text-center">
                            <label>Foto Depan</label>
                            <input type="file" name="foto_depan" accept="image/*" class="w-full mt-2" />
                        </div>
                        <div class="border-2 border-dashed border-gray-300 rounded p-4 text-center">
                            <label>Foto Belakang</label>
                            <input type="file" name="foto_belakang" accept="image/*" class="w-full mt-2" />
                        </div>
                        <div class="border-2 border-dashed border-gray-300 rounded p-4 text-center">
                            <label>Foto Samping</label>
                            <input type="file" name="foto_samping" accept="image/*" class="w-full mt-2" />
                        </div>
                        <div class="border-2 border-dashed border-gray-300 rounded p-4 text-center">
                            <label>Foto Atas</label>
                            <input type="file" name="foto_atas" accept="image/*" class="w-full mt-2" />
                        </div>
                        <div class="border-2 border-dashed border-gray-300 rounded p-4 text-center">
                            <label>Foto Seal</label>
                            <input type="file" name="foto_seal" accept="image/*" class="w-full mt-2" />
                        </div>
                        <div class="border-2 border-dashed border-gray-300 rounded p-4 text-center">
                            <label>Foto Kondisi Umum</label>
                            <input type="file" name="foto_kondisi" accept="image/*" class="w-full mt-2" />
                        </div>
                    </div>
                </div>

                <div class="rounded border border-gray-300 p-3">
                    <div class="font-bold text-sm mb-2 uppercase">Keterangan & Catatan</div>
                    <textarea name="foto_keterangan" placeholder="Tulis keterangan atau catatan kondisi container..." rows="4" class="w-full border border-gray-300 rounded px-2 py-2 text-sm"></textarea>
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
