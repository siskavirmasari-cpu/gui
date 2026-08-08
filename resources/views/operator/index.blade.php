<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            Dashboard Operator
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-6xl mx-auto">

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

                <a href="{{ route('peti-kemas.index') }}"
                   class="bg-blue-600 text-white rounded-xl p-6 text-center shadow hover:bg-blue-700">

                    📦

                    <h3 class="font-bold mt-3">
                        Data Peti Kemas
                    </h3>

                </a>

                <a href="{{ route('barang.index') }}"
                   class="bg-green-600 text-white rounded-xl p-6 text-center shadow hover:bg-green-700">

                    🚢

                    <h3 class="font-bold mt-3">
                        Import & Export
                    </h3>

                </a>

                <a href="{{ route('trip.index') }}"
                   class="bg-yellow-500 text-white rounded-xl p-6 text-center shadow hover:bg-yellow-600">

                    🚛

                    <h3 class="font-bold mt-3">
                        Data Trip
                    </h3>

                </a>

                <a href="{{ route('dokumen.index') }}"
                   class="bg-purple-600 text-white rounded-xl p-6 text-center shadow hover:bg-purple-700">

                    📄

                    <h3 class="font-bold mt-3">
                        Upload Dokumen
                    </h3>

                </a>

            </div>

        </div>

    </div>

</x-app-layout>