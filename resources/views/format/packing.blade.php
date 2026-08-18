<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800 leading-tight">{{ __('Packing List') }}</h2>
            </div>
            <a href="{{ route('format.index') }}" class="inline-flex items-center justify-center rounded-xl bg-gray-600 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-700">Kembali</a>
        </div>
    </x-slot>

    <div class="py-8">
        <form method="POST" action="{{ route('format.packing.save') }}" class="space-y-6">
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
                    <div class="text-4xl font-black uppercase tracking-wide text-blue-900">Packing List</div>
                    <div class="mt-2 text-xs font-bold uppercase text-gray-700">Daftar Kemasan</div>
                </div>
            </div>

            <div class="mt-4 grid grid-cols-3 gap-4">
                <div class="rounded border border-gray-300 p-3">
                    <div class="mb-2 bg-blue-900 px-2 py-1 text-sm font-bold uppercase text-white">Shipper / Exporter</div>
                    <div class="text-sm">PT Gajah Unggul International<br />Jl. Raya Industri No. 88,<br />Tangerang, Banten 15135<br />Indonesia</div>
                </div>
                <div class="rounded border border-gray-300 p-3">
                    <div class="mb-2 bg-blue-900 px-2 py-1 text-sm font-bold uppercase text-white">Consignee / Importer</div>
                    <div class="text-sm">ABC TRADING CO., LTD<br />1000 Sukhumvit Road,<br />Bangkok 10110<br />Thailand</div>
                </div>
                <div class="rounded border border-gray-300 p-3">
                    <div class="mb-2 bg-blue-900 px-2 py-1 text-sm font-bold uppercase text-white">Shipment Details</div>
                    <div class="text-sm space-y-1">
                        <div><span class="font-semibold">Vessel / Voyage</span> : MV OCEAN STAR / OS-0826E</div>
                        <div><span class="font-semibold">Port of Loading</span> : Tanjung Priok, Indonesia</div>
                        <div><span class="font-semibold">Port of Discharge</span> : Laem Chabang, Thailand</div>
                        <div><span class="font-semibold">Final Destination</span> : Bangkok, Thailand</div>
                    </div>
                </div>
            </div>

            <div class="mt-5 overflow-hidden rounded border border-gray-300">
                <table class="w-full border-collapse text-sm">
                    <thead class="bg-blue-900 text-white">
                        <tr>
                            <th class="border border-blue-900 px-2 py-2 text-left">No.</th>
                            <th class="border border-blue-900 px-2 py-2 text-left">Container No.</th>
                            <th class="border border-blue-900 px-2 py-2 text-left">Seal No.</th>
                            <th class="border border-blue-900 px-2 py-2 text-left">Size</th>
                            <th class="border border-blue-900 px-2 py-2 text-left">Type</th>
                            <th class="border border-blue-900 px-2 py-2 text-left">Package</th>
                            <th class="border border-blue-900 px-2 py-2 text-left">Gross Weight (KG)</th>
                            <th class="border border-blue-900 px-2 py-2 text-left">Measurement (CBM)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td class="border border-gray-300 px-2 py-3 text-center">1</td><td class="border border-gray-300 px-2 py-3">TGHU1234567</td><td class="border border-gray-300 px-2 py-3">SL123456</td><td class="border border-gray-300 px-2 py-3">20 Feet</td><td class="border border-gray-300 px-2 py-3">Dry Container</td><td class="border border-gray-300 px-2 py-3">100</td><td class="border border-gray-300 px-2 py-3">2,700</td><td class="border border-gray-300 px-2 py-3">10.00</td></tr>
                        <tr><td class="border border-gray-300 px-2 py-3 text-center">2</td><td class="border border-gray-300 px-2 py-3">TGHU7654321</td><td class="border border-gray-300 px-2 py-3">SL654321</td><td class="border border-gray-300 px-2 py-3">40 Feet</td><td class="border border-gray-300 px-2 py-3">Dry Container</td><td class="border border-gray-300 px-2 py-3">80</td><td class="border border-gray-300 px-2 py-3">700</td><td class="border border-gray-300 px-2 py-3">5.00</td></tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-5 overflow-hidden rounded border border-gray-300">
                <div class="bg-gray-100 px-3 py-2 text-sm font-black uppercase text-gray-800">Details of Goods</div>
                <table class="w-full border-collapse text-sm">
                    <thead class="bg-gray-200 text-gray-800">
                        <tr>
                            <th class="border border-gray-300 px-2 py-2 text-left">No.</th>
                            <th class="border border-gray-300 px-2 py-2 text-left">Description of Goods</th>
                            <th class="border border-gray-300 px-2 py-2 text-left">HS Code</th>
                            <th class="border border-gray-300 px-2 py-2 text-left">Quantity</th>
                            <th class="border border-gray-300 px-2 py-2 text-left">Unit</th>
                            <th class="border border-gray-300 px-2 py-2 text-left">Package</th>
                            <th class="border border-gray-300 px-2 py-2 text-left">Gross Weight (KG)</th>
                            <th class="border border-gray-300 px-2 py-2 text-left">Measurement (CBM)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td class="border border-gray-300 px-2 py-3 text-center">1</td><td class="border border-gray-300 px-2 py-3">MESIN PRODUKSI MODEL XYZ</td><td class="border border-gray-300 px-2 py-3">8479.82.00</td><td class="border border-gray-300 px-2 py-3">2</td><td class="border border-gray-300 px-2 py-3">Unit</td><td class="border border-gray-300 px-2 py-3">2</td><td class="border border-gray-300 px-2 py-3">2,500</td><td class="border border-gray-300 px-2 py-3">9.00</td></tr>
                        <tr><td class="border border-gray-300 px-2 py-3 text-center">2</td><td class="border border-gray-300 px-2 py-3">SPARE PARTS MESIN</td><td class="border border-gray-300 px-2 py-3">8483.90.90</td><td class="border border-gray-300 px-2 py-3">150</td><td class="border border-gray-300 px-2 py-3">Pcs</td><td class="border border-gray-300 px-2 py-3">178</td><td class="border border-gray-300 px-2 py-3">900</td><td class="border border-gray-300 px-2 py-3">6.00</td></tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-5 grid grid-cols-2 gap-4">
                <div class="rounded border border-gray-300 p-3">
                    <div class="mb-2 text-sm font-black uppercase text-gray-800">Packing Summary</div>
                    <div class="space-y-2 text-sm text-gray-700">
                        <div class="flex justify-between"><span>Total Package</span><span>: 180</span></div>
                        <div class="flex justify-between"><span>Total Gross Weight</span><span>: 3,400 KG</span></div>
                        <div class="flex justify-between"><span>Total Measurement</span><span>: 15.00 CBM</span></div>
                    </div>
                </div>
                <div class="rounded border border-gray-300 p-3">
                    <div class="mb-2 text-sm font-black uppercase text-gray-800">Remarks</div>
                    <p class="text-sm text-gray-700">All goods are packed in good order and condition suitable for ocean transportation.</p>
                </div>
            </div>

            <div class="mt-6 grid grid-cols-2 gap-4 text-center">
                <div><div class="mb-6 border-t border-gray-400 pt-2 text-sm font-bold uppercase">Prepared By</div><div class="text-center text-sm text-gray-700">( Nama Jelas )</div></div>
                <div><div class="mb-6 border-t border-gray-400 pt-2 text-sm font-bold uppercase">For and on behalf of</div><div class="text-center text-sm text-gray-700">( Nama Jelas )</div></div>
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
