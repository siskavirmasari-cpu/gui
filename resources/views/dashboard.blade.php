<x-app-layout>
<x-slot name="header">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                {{ __('Dashboard Utama') }}
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                PT. Gajah Unggul International
            </p>
        </div>

        <a href="{{ route('login') }}"
           class="inline-flex items-center gap-2 rounded-xl
                  bg-indigo-600 px-5 py-2.5 text-sm font-semibold
                  text-white shadow-md hover:bg-indigo-700
                  transition duration-200">

            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 12H3m12 0l-4-4m4 4l-4 4
                         M21 4v16a2 2 0 01-2 2H9"/>
            </svg>

            Login Sistem
        </a>
    </div>
</x-slot>


<div class="py-8 bg-gray-50 min-h-screen">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


        <!-- ===================================================== -->
        <!-- WELCOME CARD -->
        <!-- ===================================================== -->

        <div class="dashboard-hero-gradient relative overflow-hidden rounded-3xl p-7 mb-7 shadow-xl">

            <!-- Decorative Circle -->
            <div class="absolute -right-16 -top-16
                        w-48 h-48 rounded-full
                        bg-white/10">
            </div>

            <div class="absolute -right-5 -bottom-20
                        w-56 h-56 rounded-full
                        bg-white/5">
            </div>


            <div class="relative z-10">

                <div class="flex flex-col md:flex-row
                            md:items-center md:justify-between gap-6">

                    <div>

                        <span class="inline-flex items-center gap-2
                                     px-3 py-1 rounded-full
                                     bg-white/10 text-indigo-100
                                     text-xs font-semibold mb-4">

                            <span class="w-2 h-2 rounded-full bg-green-400"></span>

                            Sistem Aktif
                        </span>


                        <h1 class="text-2xl md:text-3xl
                                   font-bold text-white">

                            Sistem Informasi Peti Kemas
                        </h1>


                        <p class="text-indigo-100 text-sm md:text-base
                                  mt-2 max-w-2xl">

                            Dashboard Operasional Import - Export
                            PT. Gajah Unggul International.
                            Pantau data peti kemas, trip kendaraan,
                            dokumen, dan aktivitas operasional perusahaan
                            melalui satu halaman.
                        </p>

                    </div>


                    <!-- Icon -->
                    <div class="hidden md:flex
                                w-24 h-24 rounded-3xl
                                bg-white/10 backdrop-blur-sm
                                items-center justify-center">

                        <svg class="w-14 h-14 text-white"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="1.5"
                                  d="M3 7h18M5 7v10a2 2 0 002 2h10a2 2 0 002-2V7
                                     M8 11h8M8 15h5"/>
                        </svg>

                    </div>

                </div>

            </div>

        </div>



        <!-- ===================================================== -->
        <!-- STATISTIC CARDS -->
        <!-- ===================================================== -->

        <div class="grid grid-cols-1 sm:grid-cols-2
                    lg:grid-cols-4 gap-5 mb-7">


            <!-- PETI KEMAS -->

            <div class="bg-white rounded-2xl p-5
                        border border-gray-100
                        shadow-sm hover:shadow-lg
                        transition duration-200">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm font-medium text-gray-500">
                            Peti Kemas
                        </p>

                        <h3 class="text-3xl font-bold text-gray-800 mt-2">
                            {{ $totalPetiKemas ?? 248 }}
                        </h3>

                        <p class="text-xs text-green-600 mt-2 font-medium">
                            ↑ 12% dari bulan lalu
                        </p>

                    </div>


                    <div class="w-14 h-14 rounded-2xl
                                bg-blue-100 text-blue-600
                                flex items-center justify-center">

                        <svg class="w-7 h-7"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="1.8"
                                  d="M3 7h18M5 7v10a2 2 0 002 2h10a2 2 0 002-2V7
                                     M9 11v4m6-4v4"/>
                        </svg>

                    </div>

                </div>

            </div>



            <!-- TRIP -->

            <div class="bg-white rounded-2xl p-5
                        border border-gray-100
                        shadow-sm hover:shadow-lg
                        transition duration-200">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm font-medium text-gray-500">
                            Trip Kendaraan
                        </p>

                        <h3 class="text-3xl font-bold text-gray-800 mt-2">
                            {{ $totalTrip ?? 126 }}
                        </h3>

                        <p class="text-xs text-green-600 mt-2 font-medium">
                            ↑ 8% dari bulan lalu
                        </p>

                    </div>


                    <div class="w-14 h-14 rounded-2xl
                                bg-green-100 text-green-600
                                flex items-center justify-center">

                        <svg class="w-7 h-7"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="1.8"
                                  d="M3 13h2l2-6h10l2 6h2
                                     M5 13v5h14v-5
                                     M7 18v2m10-2v2"/>
                        </svg>

                    </div>

                </div>

            </div>
            <!-- DOKUMEN -->
            <div class="bg-white rounded-2xl p-5
                        border border-gray-100
                        shadow-sm hover:shadow-lg
                        transition duration-200">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm font-medium text-gray-500">
                            Dokumen
                        </p>

                        <h3 class="text-3xl font-bold text-gray-800 mt-2">
                            {{ $totalDokumen ?? 184 }}
                        </h3>

                        <p class="text-xs text-orange-600 mt-2 font-medium">
                            {{ $dokumenPerluPeriksa ?? 17 }} perlu diperiksa
                        </p>

                    </div>


                    <div class="w-14 h-14 rounded-2xl
                                bg-orange-100 text-orange-600
                                flex items-center justify-center">

                        <svg class="w-7 h-7"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="1.8"
                                  d="M7 3h8l4 4v14H7a2 2 0 01-2-2V5a2 2 0 012-2z
                                     M9 13h6M9 17h4M15 3v5h4"/>
                        </svg>

                    </div>

                </div>

            </div>



            <!-- AKUN -->

            <div class="bg-white rounded-2xl p-5
                        border border-gray-100
                        shadow-sm hover:shadow-lg
                        transition duration-200">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm font-medium text-gray-500">
                            Akun Pengguna
                        </p>

                        <h3 class="text-3xl font-bold text-gray-800 mt-2">
                            {{ $totalUsers ?? 24 }}
                        </h3>

                        <p class="text-xs text-purple-600 mt-2 font-medium">
                            {{ $rolesCount ?? 3 }} role pengguna
                        </p>

                    </div>


                    <div class="w-14 h-14 rounded-2xl
                                bg-purple-100 text-purple-600
                                flex items-center justify-center">

                        <svg class="w-7 h-7"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="1.8"
                                  d="M16 7a4 4 0 11-8 0
                                     4 4 0 018 0z
                                     M12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>

                    </div>

                </div>

            </div>

        </div>



        <!-- ===================================================== -->
        <!-- CHART AREA -->
        <!-- ===================================================== -->

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-7">


            <!-- OPERASIONAL CHART -->

            <div class="lg:col-span-2
                        bg-white rounded-2xl
                        border border-gray-100
                        shadow-sm p-6">

                <div class="flex items-center justify-between mb-6">

                    <div>

                        <h3 class="text-lg font-bold text-gray-800">
                            Aktivitas Operasional
                        </h3>

                        <p class="text-sm text-gray-500 mt-1">
                            Statistik aktivitas sistem
                        </p>

                    </div>


                    <select
                        class="text-sm border-gray-200
                               rounded-lg focus:ring-indigo-500
                               focus:border-indigo-500">

                        <option>7 Hari</option>
                        <option>30 Hari</option>
                        <option>3 Bulan</option>

                    </select>

                </div>


                <!-- LINE CHART -->

                <div class="dashboard-chart-shell rounded-2xl border border-indigo-100 p-4">

                    <div class="relative h-64 overflow-hidden rounded-xl border border-indigo-100/70 bg-white/70 flex items-center justify-center">
                        <canvas id="opsChart" class="h-full w-full"></canvas>
                    </div>

                    <div class="mt-4 grid grid-cols-7 text-center text-[11px] font-semibold uppercase tracking-wide text-gray-400">
                        @foreach (($labels ?? ['Sen','Sel','Rab','Kam','Jum','Sab','Min']) as $lab)
                            <span>{{ $lab }}</span>
                        @endforeach
                    </div>

                    <div class="mt-4 flex flex-wrap justify-center gap-4 text-xs text-gray-500">
                        <div class="flex items-center gap-2">
                            <span class="h-2.5 w-2.5 rounded-full bg-indigo-600"></span>
                            Peti Kemas
                        </div>

                        <div class="flex items-center gap-2">
                            <span class="h-2.5 w-2.5 rounded-full bg-emerald-400"></span>
                            Trip
                        </div>
                    </div>

                </div>

            </div>



            <!-- STATUS DOKUMEN -->

            <div class="bg-white rounded-2xl
                        border border-gray-100
                        shadow-sm p-6">

                <h3 class="text-lg font-bold text-gray-800">
                    Status Dokumen
                </h3>

                <p class="text-sm text-gray-500 mt-1 mb-6">
                    Kelengkapan dokumen
                </p>


                <!-- DONUT -->

                <div class="flex justify-center mb-7">

                    <div class="relative w-40 h-40">

                        <div class="flex items-center justify-center">
                            <div class="relative w-40 h-40">
                                <canvas id="dokumenDonut" class="w-40 h-40"></canvas>
                                <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                                    <div class="text-center">
                                        <div class="text-3xl font-bold text-gray-800">{{ $totalDokumen ?? 0 }}</div>
                                        <div class="text-xs text-gray-400">Dokumen</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>


                <!-- STATUS LIST -->

                <div class="space-y-4">

                    <div class="flex items-center justify-between">

                        <div class="flex items-center gap-3">

                            <span class="w-3 h-3 rounded-full bg-green-500"></span>

                            <span class="text-sm text-gray-600">
                                Lengkap
                            </span>

                        </div>

                        <span class="font-semibold text-gray-800">
                            {{ $dokumenLengkap ?? 0 }}
                        </span>

                    </div>


                    <div class="flex items-center justify-between">

                        <div class="flex items-center gap-3">

                            <span class="w-3 h-3 rounded-full bg-blue-500"></span>

                            <span class="text-sm text-gray-600">
                                Diproses
                            </span>

                        </div>

                        <span class="font-semibold text-gray-800">
                            {{ $dokumenDiproses ?? 0 }}
                        </span>

                    </div>


                    <div class="flex items-center justify-between">

                        <div class="flex items-center gap-3">

                            <span class="w-3 h-3 rounded-full bg-orange-400"></span>

                            <span class="text-sm text-gray-600">
                                Perlu Pemeriksaan
                            </span>

                        </div>
                        <span class="font-semibold text-gray-800">
                            {{ $dokumenPerluPeriksa ?? 0 }}
                        </span>

                    </div>

                </div>

            </div>

        </div>



        <!-- ===================================================== -->
        <!-- MODUL SISTEM -->
        <!-- ===================================================== -->

        <div class="bg-white rounded-2xl
                    border border-gray-100
                    shadow-sm p-6">

            <div class="flex items-center justify-between mb-6">

                <div>

                    <h3 class="text-lg font-bold text-gray-800">
                        Modul Sistem
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        Akses cepat ke modul operasional
                    </p>

                </div>

            </div>


            <div class="grid grid-cols-1 sm:grid-cols-2
                        lg:grid-cols-3 gap-5">


                <!-- PETI KEMAS -->

                     <a href="{{ route('peti-kemas.index') }}"
                   class="group p-5 rounded-2xl
                          border border-blue-100
                          bg-blue-50
                          hover:bg-blue-100
                          hover:-translate-y-1
                          hover:shadow-md
                          transition">

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12 rounded-xl
                                    bg-blue-600 text-white
                                    flex items-center justify-center">

                            <svg class="w-6 h-6"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="1.8"
                                      d="M3 7h18M5 7v10a2 2 0 002 2h10a2 2 0 002-2V7"/>
                            </svg>

                        </div>


                        <div>

                            <h4 class="font-bold text-gray-800">
                                Data Peti Kemas
                            </h4>

                            <p class="text-xs text-gray-500 mt-1">
                                Kelola data container
                            </p>

                        </div>

                    </div>

                </a>



                <!-- TRIP -->

                     <a href="{{ route('trip.index') }}"
                   class="group p-5 rounded-2xl
                          border border-green-100
                          bg-green-50
                          hover:bg-green-100
                          hover:-translate-y-1
                          hover:shadow-md
                          transition">

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12 rounded-xl
                                    bg-green-600 text-white
                                    flex items-center justify-center">

                            <svg class="w-6 h-6"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="1.8"
                                      d="M3 13h2l2-6h10l2 6h2M5 13v5h14v-5"/>
                            </svg>

                        </div>


                        <div>

                            <h4 class="font-bold text-gray-800">
                                Data Trip
                            </h4>

                            <p class="text-xs text-gray-500 mt-1">
                                Perjalanan kendaraan
                            </p>

                        </div>

                    </div>

                </a>



                <!-- DOKUMEN -->

                     <a href="{{ route('dokumen.index') }}"
                   class="group p-5 rounded-2xl
                          border border-orange-100
                          bg-orange-50
                          hover:bg-orange-100
                          hover:-translate-y-1
                          hover:shadow-md
                          transition">

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12 rounded-xl
                                    bg-orange-500 text-white
                                    flex items-center justify-center">

                            <svg class="w-6 h-6"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="1.8"
                                      d="M7 3h8l4 4v14H7a2 2 0 01-2-2V5a2 2 0 012-2z"/>
                            </svg>

                        </div>


                        <div>

                            <h4 class="font-bold text-gray-800">
                                Dokumen
                            </h4>

                            <p class="text-xs text-gray-500 mt-1">
                                Import - Export
                            </p>

                        </div>

                    </div>

                </a>



                <!-- LAPORAN -->

                     <a href="{{ route('laporan.index') }}"
                   class="group p-5 rounded-2xl
                          border border-purple-100
                          bg-purple-50
                          hover:bg-purple-100
                          hover:-translate-y-1
                          hover:shadow-md
                          transition">

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12 rounded-xl
                                    bg-purple-600 text-white
                                    flex items-center justify-center">

                            <svg class="w-6 h-6"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="1.8"
                                      d="M9 17v-6m4 6V7m4 10v-9"/>
                            </svg>

                        </div>


                        <div>

                            <h4 class="font-bold text-gray-800">
                                Laporan
                            </h4>

                            <p class="text-xs text-gray-500 mt-1">
                                Rekap operasional
                            </p>

                        </div>

                    </div>

                </a>



                <!-- TRACKING -->

                     <a href="{{ route('tracking.index') }}"
                   class="group p-5 rounded-2xl
                          border border-cyan-100
                          bg-cyan-50
                          hover:bg-cyan-100
                          hover:-translate-y-1
                          hover:shadow-md
                          transition">

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12 rounded-xl
                                    bg-cyan-600 text-white
                                    flex items-center justify-center">

                            <svg class="w-6 h-6"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="1.8"
                                      d="M9 12l2 2 4-4
                                         m6 2a9 9 0 11-18 0
                                         9 9 0 0118 0z"/>
                            </svg>

                        </div>


                        <div>

                            <h4 class="font-bold text-gray-800">
                                Tracking Dokumen
                            </h4>

                            <p class="text-xs text-gray-500 mt-1">
                                Pantau status dokumen
                            </p>

                        </div>

                    </div>

                </a>



                <!-- AKUN -->

                     <a href="{{ route('profile.edit') }}"
                   class="group p-5 rounded-2xl
                          border border-pink-100
                          bg-pink-50
                          hover:bg-pink-100
                          hover:-translate-y-1
                          hover:shadow-md
                          transition">

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12 rounded-xl
                                    bg-pink-600 text-white
                                    flex items-center justify-center">

                            <svg class="w-6 h-6"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="1.8"
                                      d="M16 7a4 4 0 11-8 0
                                         4 4 0 018 0z
                                         M12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>

                        </div>


                        <div>

                            <h4 class="font-bold text-gray-800">
                                Manajemen Akun
                            </h4>

                            <p class="text-xs text-gray-500 mt-1">
                                Admin, Operasional & Pimpinan
                            </p>

                        </div>

                    </div>

                </a>

            </div>

        </div>
        <!-- FOOTER DASHBOARD -->
        <div class="text-center mt-7">

            <p class="text-xs text-gray-400">
                Sistem Informasi Peti Kemas & Import-Export
                PT. Gajah Unggul International
            </p>

        </div>

    </div>

</div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        (function(){
            const labels = @json($labels);
            const petiData = @json($petiKemasSeries);
            const tripData = @json($tripSeries);

            // Operational line chart
            const ctx = document.getElementById('opsChart');
            if (ctx) {
                new Chart(ctx.getContext('2d'), {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: 'Peti Kemas',
                                data: petiData,
                                borderColor: '#4f46e5',
                                backgroundColor: 'rgba(79,70,229,0.06)',
                                tension: 0.3,
                                fill: false,
                                pointRadius: 4,
                            },
                            {
                                label: 'Trip',
                                data: tripData,
                                borderColor: '#10b981',
                                backgroundColor: 'rgba(16,185,129,0.06)',
                                tension: 0.3,
                                fill: false,
                                pointRadius: 4,
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false }
                        },
                        scales: {
                            x: { grid: { display: false } },
                            y: { grid: { color: '#e6e9ef' }, beginAtZero: true }
                        }
                    }
                });
            }

            // Dokumen donut
            const dokCtx = document.getElementById('dokumenDonut');
            if (dokCtx) {
                const dokData = [@json($dokumenLengkap), @json($dokumenDiproses), @json($dokumenPerluPeriksa)];
                new Chart(dokCtx.getContext('2d'), {
                    type: 'doughnut',
                    data: {
                        labels: ['Lengkap','Diproses','Perlu Pemeriksaan'],
                        datasets: [{ data: dokData, backgroundColor: ['#10b981', '#3b82f6', '#f59e0b'] }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        cutout: '70%',
                        plugins: { legend: { display: false } }
                    }
                });
            }
        })();
    </script>
</x-app-layout>
