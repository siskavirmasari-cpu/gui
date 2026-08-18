<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800 leading-tight">{{ __('Bill of Lading') }}</h2>
                @if(session('barang'))
                    <p class="text-sm text-gray-500 mt-1">Format: {{ session('format')->nama_format ?? 'Bill of Lading' }} | Barang: {{ session('barang')->nama_barang }}</p>
                @endif
            </div>
            <a href="{{ route('format.index') }}" class="inline-flex items-center justify-center rounded-xl bg-gray-600 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-700">Kembali</a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-[1200px]">
            <form method="POST" action="{{ route('format.bill.save') }}" class="space-y-6">
                @csrf
                <div class="overflow-hidden rounded-md border border-gray-300 bg-white shadow-sm" style="font-family: Arial, sans-serif;">
                    <div class="grid grid-cols-12 gap-0 border-b border-gray-300 bg-gray-100">
                        <div class="col-span-5 border-r border-gray-300 p-4">
                            <div class="flex items-center gap-3">
                                <div class="flex h-20 w-20 items-center justify-center rounded-full border-2 border-blue-900 bg-blue-100 text-4xl font-black text-blue-900">🐘</div>
                                <div>
                                    <div class="text-[26px] font-black uppercase leading-none tracking-tight text-blue-900">PT GAJAH UNGGUL</div>
                                    <div class="mt-1 text-[26px] font-black uppercase leading-none tracking-tight text-blue-900">INTERNATIONAL</div>
                                    <div class="mt-2 text-[14px] italic text-gray-700">Jasa Logistik &amp; Forwarding</div>
                                    <div class="mt-1 text-[12px] text-gray-700">
                                        Jl. Raya Industri No. 88, Tangerang, Banten, Indonesia<br>
                                        Telp. (021) 1234567 | Email: info@gajahunggul.co.id
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-7 p-4">
                            <div class="grid grid-cols-[1.2fr_0.8fr] items-start gap-4">
                                <div class="pt-2 text-center">
                                    <div class="text-[38px] font-black uppercase leading-none tracking-tight text-blue-900">BILL OF LADING</div>
                                    <div class="mt-2 text-[24px] font-black uppercase leading-none tracking-tight text-blue-900">SURAT MUATAN</div>
                                </div>

                                <div class="rounded border border-gray-400 bg-white">
                                    <table class="w-full text-[12px] text-gray-800">
                                        <tr class="border-b border-gray-300">
                                            <td class="px-2 py-2 font-bold">B/L No.</td>
                                            <td class="px-2 py-2 text-right"><input type="text" name="bl_no" value="{{ session('barang')->nomor_bl_awb ?? 'GUI-BL-2026-0001' }}" class="w-full border-0 bg-transparent text-right text-[12px]" /> </td>
                                        </tr>
                                        <tr class="border-b border-gray-300">
                                            <td class="px-2 py-2 font-bold">Booking No.</td>
                                            <td class="px-2 py-2 text-right"><input type="text" name="booking_no" value="GUI-BKG-2026-0001" class="w-full border-0 bg-transparent text-right text-[12px]" /> </td>
                                        </tr>
                                        <tr class="border-b border-gray-300">
                                            <td class="px-2 py-2 font-bold">Tanggal B/L</td>
                                            <td class="px-2 py-2 text-right"><input type="date" name="tanggal_bl" value="{{ now()->format('Y-m-d') }}" class="w-full border-0 bg-transparent text-right text-[12px]" /> </td>
                                        </tr>
                                        <tr>
                                            <td class="px-2 py-2 font-bold">Jenis Kegiatan</td>
                                            <td class="px-2 py-2 text-right"><input type="text" name="jenis_kegiatan" value="{{ session('barang')->jenis_kegiatan ?? 'Import / Ekspor' }}" class="w-full border-0 bg-transparent text-right text-[12px]" /> </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

            <div class="grid grid-cols-2 border-b border-gray-300">
                <div class="border-r border-gray-300 p-3">
                    <div class="mb-2 bg-gray-100 px-2 py-1 text-[12px] font-black uppercase tracking-wide text-gray-800">1. Shipper (Pengirim)</div>
                    <table class="w-full text-[12px] text-gray-800">
                        <tr>
                            <td class="w-1/3 py-1 font-bold">Nama Perusahaan</td>
                            <td class="w-3 text-center">:</td>
                            <td class="pb-1"><input type="text" name="shipper_nama" class="w-full border-0 border-b border-gray-400 bg-transparent text-[12px] px-1 py-1" placeholder="Masukkan nama perusahaan" /></td>
                        </tr>
                        <tr>
                            <td class="py-1 font-bold">Alamat</td>
                            <td class="text-center">:</td>
                            <td class="pb-1"><input type="text" name="shipper_alamat" class="w-full border-0 border-b border-gray-400 bg-transparent text-[12px] px-1 py-1" placeholder="Masukkan alamat" /></td>
                        </tr>
                        <tr>
                            <td class="py-1 font-bold">Negara</td>
                            <td class="text-center">:</td>
                            <td class="pb-1"><input type="text" name="shipper_negara" value="{{ session('barang')->negara_asal_tujuan ?? '' }}" class="w-full border-0 border-b border-gray-400 bg-transparent text-[12px] px-1 py-1" placeholder="Negara" /></td>
                        </tr>
                        <tr>
                            <td class="py-1 font-bold">Contact</td>
                            <td class="text-center">:</td>
                            <td class="pb-1"><input type="text" name="shipper_contact" class="w-full border-0 border-b border-gray-400 bg-transparent text-[12px] px-1 py-1" placeholder="Contact" /></td>
                        </tr>
                    </table>
                </div>

                <div class="p-3">
                    <div class="mb-2 bg-gray-100 px-2 py-1 text-[12px] font-black uppercase tracking-wide text-gray-800">2. Consignee (Penerima)</div>
                    <table class="w-full text-[12px] text-gray-800">
                        <tr>
                            <td class="w-1/3 py-1 font-bold">Nama Perusahaan</td>
                            <td class="w-3 text-center">:</td>
                            <td class="pb-1"><input type="text" name="consignee_nama" value="PT Gajah Unggul International" class="w-full border-0 border-b border-gray-400 bg-transparent text-[12px] px-1 py-1" placeholder="Nama perusahaan" /></td>
                        </tr>
                        <tr>
                            <td class="py-1 font-bold">Alamat</td>
                            <td class="text-center">:</td>
                            <td class="pb-1"><input type="text" name="consignee_alamat" value="Jl. Raya Industri No. 88, Tangerang, Banten, Indonesia" class="w-full border-0 border-b border-gray-400 bg-transparent text-[12px] px-1 py-1" placeholder="Alamat" /></td>
                        </tr>
                        <tr>
                            <td class="py-1 font-bold">Negara</td>
                            <td class="text-center">:</td>
                            <td class="pb-1"><input type="text" name="consignee_negara" value="Indonesia" class="w-full border-0 border-b border-gray-400 bg-transparent text-[12px] px-1 py-1" placeholder="Negara" /></td>
                        </tr>
                        <tr>
                            <td class="py-1 font-bold">NPWP</td>
                            <td class="text-center">:</td>
                            <td class="pb-1"><input type="text" name="consignee_npwp" value="12.345.678.9-012.000" class="w-full border-0 border-b border-gray-400 bg-transparent text-[12px] px-1 py-1" placeholder="NPWP" /></td>
                        </tr>
                        <tr>
                            <td class="py-1 font-bold">Contact</td>
                            <td class="text-center">:</td>
                            <td class="pb-1"><input type="text" name="consignee_contact" value="021 12345678" class="w-full border-0 border-b border-gray-400 bg-transparent text-[12px] px-1 py-1" placeholder="Contact" /></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="grid grid-cols-2 border-b border-gray-300">
                <div class="border-r border-gray-300 p-3">
                    <div class="mb-2 bg-gray-100 px-2 py-1 text-[12px] font-black uppercase tracking-wide text-gray-800">3. Notify Party</div>
                    <table class="w-full text-[12px] text-gray-800">
                        <tr>
                            <td class="w-1/3 py-1 font-bold">Nama</td>
                            <td class="w-3 text-center">:</td>
                            <td class="pb-1"><input type="text" name="notify_nama" class="w-full border-0 border-b border-gray-400 bg-transparent text-[12px] px-1 py-1" placeholder="--" /></td>
                        </tr>
                        <tr>
                            <td class="py-1 font-bold">Alamat</td>
                            <td class="text-center">:</td>
                            <td class="pb-1"><input type="text" name="notify_alamat" class="w-full border-0 border-b border-gray-400 bg-transparent text-[12px] px-1 py-1" placeholder="--" /></td>
                        </tr>
                        <tr>
                            <td class="py-1 font-bold">Contact</td>
                            <td class="text-center">:</td>
                            <td class="pb-1"><input type="text" name="notify_contact" class="w-full border-0 border-b border-gray-400 bg-transparent text-[12px] px-1 py-1" placeholder="--" /></td>
                        </tr>
                    </table>
                </div>

                <div class="p-3">
                    <div class="mb-2 bg-gray-100 px-2 py-1 text-[12px] font-black uppercase tracking-wide text-gray-800">4. Informasi Pelabuhan &amp; Perjalanan</div>
                    <table class="w-full text-[12px] text-gray-800">
                        <tr>
                            <td class="w-1/2 py-1 font-bold">Nama Kapal</td>
                            <td class="w-3 text-center">:</td>
                            <td class="pb-1"><input type="text" name="nama_kapal" value="{{ session('barang')->nama_kapal ?? '' }}" class="w-full border-0 border-b border-gray-400 bg-transparent text-[12px] px-1 py-1" placeholder="--" /></td>
                        </tr>
                        <tr>
                            <td class="py-1 font-bold">Voyage No.</td>
                            <td class="text-center">:</td>
                            <td class="pb-1"><input type="text" name="voyage_no" class="w-full border-0 border-b border-gray-400 bg-transparent text-[12px] px-1 py-1" placeholder="--" /></td>
                        </tr>
                        <tr>
                            <td class="py-1 font-bold">Port of Loading</td>
                            <td class="text-center">:</td>
                            <td class="pb-1"><input type="text" name="port_loading" class="w-full border-0 border-b border-gray-400 bg-transparent text-[12px] px-1 py-1" placeholder="--" /></td>
                        </tr>
                        <tr>
                            <td class="py-1 font-bold">Port of Discharge</td>
                            <td class="text-center">:</td>
                            <td class="pb-1"><input type="text" name="port_discharge" class="w-full border-0 border-b border-gray-400 bg-transparent text-[12px] px-1 py-1" placeholder="--" /></td>
                        </tr>
                        <tr>
                            <td class="py-1 font-bold">Place of Receipt</td>
                            <td class="text-center">:</td>
                            <td class="pb-1"><input type="text" name="place_receipt" class="w-full border-0 border-b border-gray-400 bg-transparent text-[12px] px-1 py-1" placeholder="--" /></td>
                        </tr>
                        <tr>
                            <td class="py-1 font-bold">Place of Delivery</td>
                            <td class="text-center">:</td>
                            <td class="pb-1"><input type="text" name="place_delivery" class="w-full border-0 border-b border-gray-400 bg-transparent text-[12px] px-1 py-1" placeholder="--" /></td>
                        </tr>
                        <tr>
                            <td class="py-1 font-bold">Tanggal Keberangkatan</td>
                            <td class="text-center">:</td>
                            <td class="pb-1"><input type="date" name="tgl_keberangkatan" class="w-full border-0 border-b border-gray-400 bg-transparent text-[12px] px-1 py-1" /></td>
                        </tr>
                        <tr>
                            <td class="py-1 font-bold">Tanggal Kedatangan</td>
                            <td class="text-center">:</td>
                            <td class="pb-1"><input type="date" name="tgl_kedatangan" class="w-full border-0 border-b border-gray-400 bg-transparent text-[12px] px-1 py-1" /></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="border-b border-gray-300 bg-gray-100">
                <div class="px-3 py-2 text-[12px] font-black uppercase tracking-wide text-gray-800">5. Data Peti Kemas</div>
                <table class="w-full border-collapse text-[12px] text-gray-800">
                    <thead class="bg-gray-200 text-gray-800">
                        <tr>
                            <th class="border border-gray-300 px-2 py-2 text-center">No.</th>
                            <th class="border border-gray-300 px-2 py-2 text-center">Nomor Kontainer</th>
                            <th class="border border-gray-300 px-2 py-2 text-center">Seal No.</th>
                            <th class="border border-gray-300 px-2 py-2 text-center">Ukuran</th>
                            <th class="border border-gray-300 px-2 py-2 text-center">Jenis Kontainer</th>
                            <th class="border border-gray-300 px-2 py-2 text-center">Jumlah Paket</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 px-2 py-3 text-center">1</td>
                            <td class="border border-gray-300 px-2 py-3"><input type="text" name="kontainer_no_1" class="w-full border-0 bg-transparent text-[12px]" placeholder="--" /></td>
                            <td class="border border-gray-300 px-2 py-3"><input type="text" name="seal_no_1" class="w-full border-0 bg-transparent text-[12px]" placeholder="--" /></td>
                            <td class="border border-gray-300 px-2 py-3 text-center"><input type="text" name="ukuran_1" value="20 Feet / 40 Feet" class="w-full border-0 bg-transparent text-center text-[12px]" /></td>
                            <td class="border border-gray-300 px-2 py-3"><input type="text" name="jenis_kontainer_1" class="w-full border-0 bg-transparent text-[12px]" placeholder="--" /></td>
                            <td class="border border-gray-300 px-2 py-3"><input type="text" name="jumlah_paket_1" class="w-full border-0 bg-transparent text-[12px]" placeholder="--" /></td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 px-2 py-3 text-center">2</td>
                            <td class="border border-gray-300 px-2 py-3"><input type="text" name="kontainer_no_2" class="w-full border-0 bg-transparent text-[12px]" placeholder="--" /></td>
                            <td class="border border-gray-300 px-2 py-3"><input type="text" name="seal_no_2" class="w-full border-0 bg-transparent text-[12px]" placeholder="--" /></td>
                            <td class="border border-gray-300 px-2 py-3 text-center"><input type="text" name="ukuran_2" value="20 Feet / 40 Feet" class="w-full border-0 bg-transparent text-center text-[12px]" /></td>
                            <td class="border border-gray-300 px-2 py-3"><input type="text" name="jenis_kontainer_2" class="w-full border-0 bg-transparent text-[12px]" placeholder="--" /></td>
                            <td class="border border-gray-300 px-2 py-3"><input type="text" name="jumlah_paket_2" class="w-full border-0 bg-transparent text-[12px]" placeholder="--" /></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="border-b border-gray-300 bg-gray-100">
                <div class="px-3 py-2 text-[12px] font-black uppercase tracking-wide text-gray-800">6. Detail Barang</div>
                <table class="w-full border-collapse text-[12px] text-gray-800">
                    <thead class="bg-gray-200 text-gray-800">
                        <tr>
                            <th class="border border-gray-300 px-2 py-2 text-center">No.</th>
                            <th class="border border-gray-300 px-2 py-2 text-center">Nama Barang / Description of Goods</th>
                            <th class="border border-gray-300 px-2 py-2 text-center">Jumlah</th>
                            <th class="border border-gray-300 px-2 py-2 text-center">Kemasan</th>
                            <th class="border border-gray-300 px-2 py-2 text-center">Berat Kotor (KG)</th>
                            <th class="border border-gray-300 px-2 py-2 text-center">Volume (CBM)</th>
                            <th class="border border-gray-300 px-2 py-2 text-center">HS Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 px-2 py-3 text-center">1</td>
                            <td class="border border-gray-300 px-2 py-3"><input type="text" name="barang_nama_1" value="{{ session('barang')->nama_barang ?? '' }}" class="w-full border-0 bg-transparent text-[12px]" placeholder="Nama barang" /></td>
                            <td class="border border-gray-300 px-2 py-3 text-center"><input type="text" name="barang_jumlah_1" class="w-full border-0 bg-transparent text-center text-[12px]" placeholder="--" /></td>
                            <td class="border border-gray-300 px-2 py-3 text-center"><input type="text" name="barang_kemasan_1" class="w-full border-0 bg-transparent text-center text-[12px]" placeholder="--" /></td>
                            <td class="border border-gray-300 px-2 py-3 text-center"><input type="text" name="barang_berat_1" class="w-full border-0 bg-transparent text-center text-[12px]" placeholder="--" /></td>
                            <td class="border border-gray-300 px-2 py-3 text-center"><input type="text" name="barang_volume_1" class="w-full border-0 bg-transparent text-center text-[12px]" placeholder="--" /></td>
                            <td class="border border-gray-300 px-2 py-3 text-center"><input type="text" name="barang_hscode_1" class="w-full border-0 bg-transparent text-center text-[12px]" placeholder="--" /></td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 px-2 py-3 text-center">2</td>
                            <td class="border border-gray-300 px-2 py-3"><input type="text" name="barang_nama_2" class="w-full border-0 bg-transparent text-[12px]" placeholder="Nama barang" /></td>
                            <td class="border border-gray-300 px-2 py-3 text-center"><input type="text" name="barang_jumlah_2" class="w-full border-0 bg-transparent text-center text-[12px]" placeholder="--" /></td>
                            <td class="border border-gray-300 px-2 py-3 text-center"><input type="text" name="barang_kemasan_2" class="w-full border-0 bg-transparent text-center text-[12px]" placeholder="--" /></td>
                            <td class="border border-gray-300 px-2 py-3 text-center"><input type="text" name="barang_berat_2" class="w-full border-0 bg-transparent text-center text-[12px]" placeholder="--" /></td>
                            <td class="border border-gray-300 px-2 py-3 text-center"><input type="text" name="barang_volume_2" class="w-full border-0 bg-transparent text-center text-[12px]" placeholder="--" /></td>
                            <td class="border border-gray-300 px-2 py-3 text-center"><input type="text" name="barang_hscode_2" class="w-full border-0 bg-transparent text-center text-[12px]" placeholder="--" /></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="grid grid-cols-2 border-b border-gray-300">
                <div class="border-r border-gray-300 p-3">
                    <div class="mb-2 bg-gray-100 px-2 py-1 text-[12px] font-black uppercase tracking-wide text-gray-800">7. Informasi Muatan</div>
                    <table class="w-full text-[12px] text-gray-800">
                        <tr>
                            <td class="py-1 font-bold">Marks &amp; Numbers</td>
                            <td class="w-3 text-center">:</td>
                            <td class="pb-1"><input type="text" name="marks_numbers" class="w-full border-0 border-b border-gray-400 bg-transparent text-[12px] px-1 py-1" placeholder="--" /></td>
                        </tr>
                        <tr>
                            <td class="py-1 font-bold">Description of Goods</td>
                            <td class="text-center">:</td>
                            <td class="pb-1"><input type="text" name="desc_goods" class="w-full border-0 border-b border-gray-400 bg-transparent text-[12px] px-1 py-1" placeholder="--" /></td>
                        </tr>
                        <tr>
                            <td class="py-1 font-bold">Number of Packages</td>
                            <td class="text-center">:</td>
                            <td class="pb-1"><input type="text" name="num_packages" class="w-full border-0 border-b border-gray-400 bg-transparent text-[12px] px-1 py-1" placeholder="--" /></td>
                        </tr>
                        <tr>
                            <td class="py-1 font-bold">Gross Weight</td>
                            <td class="text-center">:</td>
                            <td class="pb-1"><input type="text" name="gross_weight" class="w-full border-0 border-b border-gray-400 bg-transparent text-[12px] px-1 py-1" placeholder="--" /></td>
                        </tr>
                        <tr>
                            <td class="py-1 font-bold">Net Weight</td>
                            <td class="text-center">:</td>
                            <td class="pb-1"><input type="text" name="net_weight" class="w-full border-0 border-b border-gray-400 bg-transparent text-[12px] px-1 py-1" placeholder="--" /></td>
                        </tr>
                        <tr>
                            <td class="py-1 font-bold">Measurement / Volume</td>
                            <td class="text-center">:</td>
                            <td class="pb-1"><input type="text" name="measurement_volume" class="w-full border-0 border-b border-gray-400 bg-transparent text-[12px] px-1 py-1" placeholder="--" /></td>
                        </tr>
                    </table>
                </div>

                <div class="p-3">
                    <div class="mb-2 bg-gray-100 px-2 py-1 text-[12px] font-black uppercase tracking-wide text-gray-800">8. Dokumen Terkait</div>
                    <table class="w-full text-[12px] text-gray-800">
                        <tr>
                            <td class="py-1 font-bold">Dokumen</td>
                            <td class="py-1 font-bold text-center">:</td>
                            <td class="py-1 font-bold text-center">Nomor / Keterangan</td>
                        </tr>
                        <tr>
                            <td class="py-1">Bill of Lading</td>
                            <td class="text-center">:</td>
                            <td class="border-b border-gray-400 pb-1">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="py-1">Invoice</td>
                            <td class="text-center">:</td>
                            <td class="border-b border-gray-400 pb-1">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="py-1">Packing List</td>
                            <td class="text-center">:</td>
                            <td class="border-b border-gray-400 pb-1">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="py-1">PIB / PEB</td>
                            <td class="text-center">:</td>
                            <td class="border-b border-gray-400 pb-1">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="py-1">Surat Jalan</td>
                            <td class="text-center">:</td>
                            <td class="border-b border-gray-400 pb-1">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="py-1">Foto Container</td>
                            <td class="text-center">:</td>
                            <td class="border-b border-gray-400 pb-1">&nbsp;</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="grid grid-cols-2 border-b border-gray-300">
                <div class="border-r border-gray-300 p-3">
                    <div class="mb-2 bg-gray-100 px-2 py-1 text-[12px] font-black uppercase tracking-wide text-gray-800">9. Status Dokumen</div>
                    <div class="mt-2 flex flex-wrap gap-5 text-[12px] text-gray-800">
                        <label class="flex items-center gap-2"><input type="checkbox" /> Belum Lengkap</label>
                        <label class="flex items-center gap-2"><input type="checkbox" /> Lengkap</label>
                        <label class="flex items-center gap-2"><input type="checkbox" /> Menunggu Verifikasi</label>
                        <label class="flex items-center gap-2"><input type="checkbox" /> Disetujui</label>
                    </div>
                </div>

                <div class="p-3">
                    <div class="mb-2 bg-gray-100 px-2 py-1 text-[12px] font-black uppercase tracking-wide text-gray-800">10. Verifikasi</div>
                    <table class="w-full text-[12px] text-gray-800">
                        <tr>
                            <td class="w-1/2 py-1 font-bold">Diverifikasi Oleh</td>
                            <td class="w-3 text-center">:</td>
                            <td class="border-b border-gray-400 pb-1">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="py-1 font-bold">Tanggal Verifikasi</td>
                            <td class="text-center">:</td>
                            <td class="border-b border-gray-400 pb-1">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="py-1 font-bold">Keterangan</td>
                            <td class="text-center">:</td>
                            <td class="border-b border-gray-400 pb-1">&nbsp;</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="border-b border-gray-300 p-3">
                <div class="mb-2 bg-gray-100 px-2 py-1 text-[12px] font-black uppercase tracking-wide text-gray-800">11. Pernyataan</div>
                <div class="grid grid-cols-[1.2fr_0.5fr] gap-4 text-[12px] text-gray-800">
                    <p class="leading-relaxed">
                        Barang-barang sebagaimana tersebut di atas telah diterima oleh Carrier dalam keadaan baik dan
                        dalam keadaan baik dan sudah sesuai dengan dokumen yang diserahkan serta siap untuk diproses sesuai
                        ketentuan. Demikian Bill of Lading ini dibuat untuk dipergunakan sebagaimana mestinya.
                    </p>
                    <div>
                        <div class="mt-1 text-right font-bold">Tempat :</div>
                        <div class="mt-6 text-right font-bold">Tanggal :</div>
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-3 gap-4 text-center text-[12px] font-bold uppercase text-gray-800">
                    <div>
                        <div class="mx-auto mb-10 h-16 w-full border-b border-gray-400"></div>
                        <div>Shipper / Pengirim</div>
                        <div class="mt-1 text-[10px] font-normal normal-case">( Nama &amp; Stempel )</div>
                    </div>
                    <div>
                        <div class="mx-auto mb-10 h-16 w-full border-b border-gray-400"></div>
                        <div>Carrier / Agent</div>
                        <div class="mt-1 text-[10px] font-normal normal-case">( Nama &amp; Stempel )</div>
                    </div>
                    <div>
                        <div class="mx-auto mb-10 h-16 w-full border-b border-gray-400"></div>
                        <div>Consignee / Penerima</div>
                        <div class="mt-1 text-[10px] font-normal normal-case">( Nama &amp; Stempel )</div>
                    </div>
                </div>
            </div>

            <div class="bg-gray-100 px-6 py-4 flex gap-3 border-t border-gray-300">
                <button type="submit" class="rounded-xl bg-red-600 px-6 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-red-700">
                    Simpan Dokumen
                </button>
                <button type="reset" class="rounded-xl border border-gray-300 bg-white px-6 py-2.5 text-sm font-semibold text-gray-700 transition hover:bg-gray-50">
                    Reset
                </button>
                <a href="{{ route('format.index') }}" class="rounded-xl border border-gray-300 bg-white px-6 py-2.5 text-sm font-semibold text-gray-700 transition hover:bg-gray-50">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
