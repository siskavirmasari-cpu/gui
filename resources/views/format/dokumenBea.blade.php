<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800 leading-tight">{{ __('Dokumen Bea Cukai') }}</h2>
            </div>
            <a href="{{ route('format.index') }}" class="inline-flex items-center justify-center rounded-xl bg-gray-600 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-700">Kembali</a>
        </div>
    </x-slot>

    <div class="py-8">
        <form method="POST" action="{{ route('format.dokumenBea.save') }}">
            @csrf
            <div class="mx-auto max-w-6xl bg-white p-6 shadow-xl ring-1 ring-gray-200" style="font-family: Arial, sans-serif; color: #1f2937;">
                <div class="text-center mb-6">
                    <h3 class="text-2xl font-bold uppercase text-blue-900">Dokumen Bea Cukai</h3>
                    <p class="text-sm text-gray-600 mt-2">Pemberitahuan Impor Barang (PIB) / Pemberitahuan Ekspor Barang (PEB)</p>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div class="rounded border border-gray-300 p-3">
                        <div class="font-bold text-sm mb-2 uppercase">Nomor & Tanggal Dokumen</div>
                        <div class="text-sm space-y-2">
                            <div><label>No. Dokumen:</label><input type="text" name="bea_nomor_dok" placeholder="Nomor Dokumen" class="w-full border border-gray-300 rounded px-2 py-1" /></div>
                            <div><label>Tanggal:</label><input type="date" name="bea_tanggal_dok" class="w-full border border-gray-300 rounded px-2 py-1" /></div>
                            <div><label>Jenis Dokumen:</label><select name="bea_jenis_dok" class="w-full border border-gray-300 rounded px-2 py-1"><option>PIB (Import)</option><option>PEB (Export)</option></select></div>
                        </div>
                    </div>
                    <div class="rounded border border-gray-300 p-3">
                        <div class="font-bold text-sm mb-2 uppercase">Pengusaha & NPWP</div>
                        <div class="text-sm space-y-2">
                            <div><label>Nama Pengusaha:</label><input type="text" name="bea_nama_pengusaha" placeholder="Nama Perusahaan" class="w-full border border-gray-300 rounded px-2 py-1" /></div>
                            <div><label>NPWP:</label><input type="text" name="bea_npwp" placeholder="NPWP" class="w-full border border-gray-300 rounded px-2 py-1" /></div>
                        </div>
                    </div>
                </div>

                <div class="rounded border border-gray-300 p-3 mb-6">
                    <div class="font-bold text-sm mb-2 uppercase">Informasi Pelabuhan & Perjalanan</div>
                    <div class="grid grid-cols-3 gap-3 text-sm">
                        <div><label>Port of Loading/Entry:</label><input type="text" name="bea_port_loading" placeholder="Port" class="w-full border border-gray-300 rounded px-2 py-1" /></div>
                        <div><label>Port of Discharge:</label><input type="text" name="bea_port_discharge" placeholder="Port" class="w-full border border-gray-300 rounded px-2 py-1" /></div>
                        <div><label>Nama Kapal/Pesawat:</label><input type="text" name="bea_nama_kapal" placeholder="Nama Kapal" class="w-full border border-gray-300 rounded px-2 py-1" /></div>
                    </div>
                </div>

                <div class="rounded border border-gray-300 p-3">
                    <div class="font-bold text-sm mb-2 uppercase">Data Barang</div>
                    <div class="overflow-hidden rounded border border-gray-300">
                        <table class="w-full text-sm">
                            <thead class="bg-blue-900 text-white">
                                <tr>
                                    <th class="border border-blue-900 px-2 py-2">No.</th>
                                    <th class="border border-blue-900 px-2 py-2">Uraian Barang</th>
                                    <th class="border border-blue-900 px-2 py-2">HS Code</th>
                                    <th class="border border-blue-900 px-2 py-2">Jumlah</th>
                                    <th class="border border-blue-900 px-2 py-2">Satuan</th>
                                    <th class="border border-blue-900 px-2 py-2">Nilai Pabean (USD)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border border-gray-300 px-2 py-3 text-center">1</td>
                                    <td class="border border-gray-300 px-2 py-3"><input type="text" name="bea_barang_1" placeholder="Uraian Barang" class="w-full border-0 bg-transparent" /></td>
                                    <td class="border border-gray-300 px-2 py-3"><input type="text" name="bea_hs_code_1" placeholder="HS Code" class="w-full border-0 bg-transparent" /></td>
                                    <td class="border border-gray-300 px-2 py-3"><input type="text" name="bea_jumlah_1" placeholder="0" class="w-full border-0 bg-transparent" /></td>
                                    <td class="border border-gray-300 px-2 py-3"><input type="text" name="bea_satuan_1" placeholder="Unit" class="w-full border-0 bg-transparent" /></td>
                                    <td class="border border-gray-300 px-2 py-3"><input type="text" name="bea_nilai_1" placeholder="0.00" class="w-full border-0 bg-transparent" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
