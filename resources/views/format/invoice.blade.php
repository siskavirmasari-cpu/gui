<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800 leading-tight">{{ __('Commercial Invoice') }}</h2>
            </div>
            <a href="{{ route('format.index') }}" class="inline-flex items-center justify-center rounded-xl bg-gray-600 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-700">Kembali</a>
        </div>
    </x-slot>

    <div class="py-8">
        <form method="POST" action="{{ route('format.invoice.save') }}" class="space-y-6">
            @csrf
            <div class="mx-auto max-w-6xl bg-white p-6 shadow-xl ring-1 ring-gray-200" style="font-family: Arial, sans-serif; color: #1f2937;">
                <div class="grid grid-cols-12 gap-3 border-b border-gray-300 pb-4">
                    <div class="col-span-4 flex items-center gap-3">
                        <div class="flex h-14 w-14 items-center justify-center rounded-full border-2 border-blue-900 bg-blue-50 text-2xl font-black text-blue-900">🐘</div>
                        <div>
                            <div class="text-xl font-black uppercase leading-none text-blue-900">PT GAJAH UNGGUL</div>
                            <div class="text-xl font-black uppercase leading-none text-blue-900">INTERNATIONAL</div>
                            <div class="mt-1 text-xs text-gray-600">Jasa Logistik &amp; Forwarding</div>
                        </div>
                    </div>
                    <div class="col-span-8 text-right">
                        <div class="text-4xl font-black uppercase tracking-wide text-blue-900">Commercial Invoice</div>
                        <div class="mt-1 text-lg font-bold uppercase text-gray-700">Invoice</div>
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-2 gap-4">
                    <div class="rounded border border-gray-300 p-3">
                        <div class="mb-2 bg-blue-900 px-2 py-1 text-sm font-bold uppercase text-white">Shipper / Exporter</div>
                        <table class="w-full text-sm">
                            <tr><td class="py-1 pr-2 font-semibold text-gray-600">Nama</td><td class="border-b border-gray-400">:</td><td class="border-b border-gray-400 pl-2"><input type="text" name="shipper_nama" value="{{ session('barang')->nama_barang ?? 'PT Gajah Unggul International' }}" class="w-full border-0 bg-transparent text-sm" /></td></tr>
                            <tr><td class="py-1 pr-2 font-semibold text-gray-600">Alamat</td><td class="border-b border-gray-400">:</td><td class="border-b border-gray-400 pl-2"><input type="text" name="shipper_alamat" value="Jl. Raya Industri No. 88, Tangerang, Banten 15135, Indonesia" class="w-full border-0 bg-transparent text-sm" /></td></tr>
                            <tr><td class="py-1 pr-2 font-semibold text-gray-600">NPWP</td><td class="border-b border-gray-400">:</td><td class="border-b border-gray-400 pl-2"><input type="text" name="shipper_npwp" value="12.345.678.9-012.000" class="w-full border-0 bg-transparent text-sm" /></td></tr>
                            <tr><td class="py-1 pr-2 font-semibold text-gray-600">Telp.</td><td class="border-b border-gray-400">:</td><td class="border-b border-gray-400 pl-2"><input type="text" name="shipper_telp" value="(021) 12345678" class="w-full border-0 bg-transparent text-sm" /></td></tr>
                            <tr><td class="py-1 pr-2 font-semibold text-gray-600">Email</td><td class="border-b border-gray-400">:</td><td class="border-b border-gray-400 pl-2"><input type="text" name="shipper_email" value="info@gajahunggul.co.id" class="w-full border-0 bg-transparent text-sm" /></td></tr>
                        </table>
                    </div>
                    <div class="rounded border border-gray-300 p-3">
                        <div class="mb-2 bg-blue-900 px-2 py-1 text-sm font-bold uppercase text-white">Consignee / Importer</div>
                        <table class="w-full text-sm">
                            <tr><td class="py-1 pr-2 font-semibold text-gray-600">Nama</td><td class="border-b border-gray-400">:</td><td class="border-b border-gray-400 pl-2"><input type="text" name="consignee_nama" value="ABC TRADING CO., LTD" class="w-full border-0 bg-transparent text-sm" /></td></tr>
                            <tr><td class="py-1 pr-2 font-semibold text-gray-600">Alamat</td><td class="border-b border-gray-400">:</td><td class="border-b border-gray-400 pl-2"><input type="text" name="consignee_alamat" value="1000 Sukhumvit Road, Bangkok 10110" class="w-full border-0 bg-transparent text-sm" /></td></tr>
                            <tr><td class="py-1 pr-2 font-semibold text-gray-600">Negara</td><td class="border-b border-gray-400">:</td><td class="border-b border-gray-400 pl-2"><input type="text" name="consignee_negara" value="Thailand" class="w-full border-0 bg-transparent text-sm" /></td></tr>
                            <tr><td class="py-1 pr-2 font-semibold text-gray-600">Telp.</td><td class="border-b border-gray-400">:</td><td class="border-b border-gray-400 pl-2"><input type="text" name="consignee_telp" value="+66 2 123 4567" class="w-full border-0 bg-transparent text-sm" /></td></tr>
                            <tr><td class="py-1 pr-2 font-semibold text-gray-600">Email</td><td class="border-b border-gray-400">:</td><td class="border-b border-gray-400 pl-2"><input type="text" name="consignee_email" value="info@abctrading.co.th" class="w-full border-0 bg-transparent text-sm" /></td></tr>
                        </table>
                    </div>
                </div>

            <div class="mt-4 grid grid-cols-2 gap-4">
                <div class="rounded border border-gray-300 p-3">
                    <div class="flex justify-between text-sm font-semibold text-gray-700"><span>Country of Origin</span><span>:</span><span class="ml-2 font-bold text-gray-900">Indonesia</span></div>
                    <div class="mt-2 flex justify-between text-sm font-semibold text-gray-700"><span>Port of Loading</span><span>:</span><span class="ml-2 font-bold text-gray-900">Tanjung Priok, Indonesia</span></div>
                    <div class="mt-2 flex justify-between text-sm font-semibold text-gray-700"><span>Port of Discharge</span><span>:</span><span class="ml-2 font-bold text-gray-900">Laem Chabang, Thailand</span></div>
                </div>
                <div class="rounded border border-gray-300 p-3">
                    <div class="flex justify-between text-sm font-semibold text-gray-700"><span>Country of Destination</span><span>:</span><span class="ml-2 font-bold text-gray-900">Thailand</span></div>
                    <div class="mt-2 flex justify-between text-sm font-semibold text-gray-700"><span>Vessel / Voyage</span><span>:</span><span class="ml-2 font-bold text-gray-900">MV OCEAN STAR / OS-0826E</span></div>
                    <div class="mt-2 flex justify-between text-sm font-semibold text-gray-700"><span>Date of Shipment</span><span>:</span><span class="ml-2 font-bold text-gray-900">20 August 2026</span></div>
                </div>
            </div>

            <div class="mt-5 overflow-hidden rounded border border-gray-300">
                <table class="w-full border-collapse text-sm">
                    <thead class="bg-blue-900 text-white">
                        <tr>
                            <th class="border border-blue-900 px-2 py-2 text-left">No.</th>
                            <th class="border border-blue-900 px-2 py-2 text-left">Description of Goods</th>
                            <th class="border border-blue-900 px-2 py-2 text-left">HS Code</th>
                            <th class="border border-blue-900 px-2 py-2 text-left">Quantity</th>
                            <th class="border border-blue-900 px-2 py-2 text-left">Unit</th>
                            <th class="border border-blue-900 px-2 py-2 text-left">Unit Price (USD)</th>
                            <th class="border border-blue-900 px-2 py-2 text-left">Amount (USD)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 px-2 py-3">1</td>
                            <td class="border border-gray-300 px-2 py-3">MESIN PRODUKSI MODEL XYZ</td>
                            <td class="border border-gray-300 px-2 py-3">8479.82.00</td>
                            <td class="border border-gray-300 px-2 py-3">2</td>
                            <td class="border border-gray-300 px-2 py-3">Unit</td>
                            <td class="border border-gray-300 px-2 py-3">12,500.00</td>
                            <td class="border border-gray-300 px-2 py-3">25,000.00</td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 px-2 py-3">2</td>
                            <td class="border border-gray-300 px-2 py-3">SPARE PARTS MESIN</td>
                            <td class="border border-gray-300 px-2 py-3">8483.90.90</td>
                            <td class="border border-gray-300 px-2 py-3">150</td>
                            <td class="border border-gray-300 px-2 py-3">Pcs</td>
                            <td class="border border-gray-300 px-2 py-3">33.33</td>
                            <td class="border border-gray-300 px-2 py-3">5,000.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-5 grid grid-cols-2 gap-4">
                <div class="rounded border border-gray-300 p-3 text-sm text-gray-700">
                    <div class="font-bold uppercase text-gray-800">Total In Words</div>
                    <div class="mt-2">THIRTY THOUSAND FIVE HUNDRED DOLLARS ONLY</div>
                </div>
                <div class="rounded border border-gray-300 p-3 text-sm text-gray-700">
                    <div class="grid grid-cols-2 gap-2">
                        <div class="font-semibold text-gray-600">Sub Total</div><div class="text-right font-bold">30,000.00</div>
                        <div class="font-semibold text-gray-600">Freight</div><div class="text-right font-bold">350.00</div>
                        <div class="font-semibold text-gray-600">Insurance</div><div class="text-right font-bold">150.00</div>
                        <div class="font-semibold text-gray-600">Total (USD)</div><div class="text-right font-bold bg-blue-50 px-2 rounded">30,500.00</div>
                    </div>
                </div>
            </div>

            <div class="mt-5 rounded border border-gray-300 p-3">
                <div class="mb-2 text-sm font-bold uppercase text-gray-800">Bank Details</div>
                <div class="grid grid-cols-2 gap-3 text-sm text-gray-700">
                    <div class="grid grid-cols-2 gap-1"><span>Bank Name</span><span>: Bank Mandiri</span></div>
                    <div class="grid grid-cols-2 gap-1"><span>For and on behalf of</span><span>: PT Gajah Unggul International</span></div>
                    <div class="grid grid-cols-2 gap-1"><span>Account Name</span><span>: PT Gajah Unggul International</span></div>
                    <div class="grid grid-cols-2 gap-1"><span>Authorized Signature</span><span>:</span></div>
                    <div class="grid grid-cols-2 gap-1"><span>Account No.</span><span>: 123-00-1234567-8</span></div>
                    <div class="grid grid-cols-2 gap-1"><span>Swift Code</span><span>: BRM IJD A</span></div>
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
        </div>
    </form>
    </div>
</x-app-layout>
