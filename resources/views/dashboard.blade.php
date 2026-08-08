<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Utama - PT. Gajah Unggul International') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Informasi Keseluruhan Operasional -->
            <div class="bg-indigo-900 text-white p-6 rounded-2xl shadow-lg mb-8">
                <h3 class="text-xl font-bold mb-2">Informasi Keseluruhan Operasional</h3>
                <p class="text-indigo-200 text-sm">
                    Selamat datang di Portal Utama PT Gajah Unggul International. Silakan pilih modul atau jalur akses di bawah ini sesuai dengan rancangan sistem.
                </p>
            </div>

            <div class="mb-6 flex justify-end">
                <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700">
                    Login Sistem &rarr;
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-100 flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 bg-red-100 text-red-600 rounded-xl flex items-center justify-center font-bold text-lg mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <h4 class="text-lg font-bold text-gray-800 mb-1">Admin</h4>
                        <p class="text-gray-500 text-sm mb-4">Daftar akun admin untuk mengelola data master, dokumen, dan operasional internal.</p>
                    </div>
                    <a href="{{ route('regis.admin') }}" class="inline-flex items-center justify-center px-4 py-2 bg-red-600 text-white text-sm font-semibold rounded-lg hover:bg-red-700 transition">
                        Daftar Admin &rarr;
                    </a>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-100 flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center font-bold text-lg mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                        </div>
                        <h4 class="text-lg font-bold text-gray-800 mb-1">Operasional</h4>
                        <p class="text-gray-500 text-sm mb-4">Daftar akun operasional untuk input kegiatan lapangan dan pengelolaan dokumen harian.</p>
                    </div>
                    <a href="{{ route('regis.operasional') }}" class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition">
                        Daftar Operasional &rarr;
                    </a>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-100 flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center font-bold text-lg mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        </div>
                        <h4 class="text-lg font-bold text-gray-800 mb-1">Pimpinan</h4>
                        <p class="text-gray-500 text-sm mb-4">Daftar akun pimpinan untuk monitoring laporan dan rekapitulasi operasional secara menyeluruh.</p>
                    </div>
                    <a href="{{ route('regis.pimpinan') }}" class="inline-flex items-center justify-center px-4 py-2 bg-purple-600 text-white text-sm font-semibold rounded-lg hover:bg-purple-700 transition">
                        Daftar Pimpinan &rarr;
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>