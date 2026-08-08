<nav x-data="{ open: false }" class="sticky top-0 flex h-screen w-72 flex-shrink-0 flex-col overflow-hidden border-r border-gray-200 bg-white shadow-sm">
    <div class="flex h-full flex-col">
        <div class="flex items-center justify-center border-b border-gray-200 px-4 py-5">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                <img src="{{ asset('logo.png') }}"
                     alt="PT. Gajah Unggul International"
                     class="h-10 w-auto object-contain">
                <span class="text-xs font-bold uppercase tracking-wide text-red-600">
                    GUI
                </span>
            </a>
        </div>

        <div class="flex-1 space-y-1 overflow-y-visible px-3 py-4">
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'bg-red-50 text-red-600 font-semibold' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition">
                <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                <span>Dashboard</span>
            </a>

            @php
                $role = Auth::check() ? Auth::user()->role : null;
            @endphp

            @if(Auth::check() && in_array($role, ['admin', 'pimpinan']))
                <a href="{{ route('peti-kemas.index') }}" class="{{ request()->routeIs('peti-kemas.*') ? 'bg-red-50 text-red-600 font-semibold' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition">
                    <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    <span>Peti Kemas</span>
                </a>

                <a href="{{ route('barang.index') }}" class="{{ request()->routeIs('barang.*') ? 'bg-red-50 text-red-600 font-semibold' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition">
                    <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
                    <span>Import & Export</span>
                </a>

                <a href="{{ route('trip.index') }}" class="{{ request()->routeIs('trip.*') ? 'bg-red-50 text-red-600 font-semibold' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition">
                    <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/></svg>
                    <span>Data Trip</span>
                </a>

                <a href="{{ route('dokumen.index') }}" class="{{ request()->routeIs('dokumen.*') ? 'bg-red-50 text-red-600 font-semibold' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition">
                    <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    <span>Dokumen</span>
                </a>
            @endif

            @if(Auth::check() && $role === 'operasional')
                <a href="{{ route('dokumen.index') }}" class="{{ request()->routeIs('dokumen.*') ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition">
                    <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    <span>Dokumen</span>
                </a>

                <a href="{{ route('operator.index') }}" class="{{ request()->routeIs('operator.*') ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition">
                    <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                    <span>Surat Jalan</span>
                </a>

                <a href="{{ route('barang.index') }}" class="{{ request()->routeIs('barang.*') ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition">
                    <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
                    <span>Import & Export</span>
                </a>
            @endif

            @if(Auth::check() && in_array($role, ['admin', 'pimpinan', 'operasional']))
                <a href="{{ route('tracking.index') }}" class="{{ request()->routeIs('tracking.*') ? 'bg-red-50 text-red-600 font-semibold' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition">
                    <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <span>Tracking</span>
                </a>
            @endif

            @if(Auth::check() && in_array($role, ['admin', 'pimpinan']))
                <a href="{{ route('laporan.index') }}" class="{{ request()->routeIs('laporan.*') ? 'bg-red-50 text-red-600 font-semibold' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition">
                    <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    <span>Laporan</span>
                </a>
            @endif

            @if(Auth::check() && in_array($role, ['admin', 'pimpinan']))
                <a href="{{ route('profile.edit') }}" class="{{ request()->routeIs('profile.*') ? 'bg-red-50 text-red-600 font-semibold' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition">
                    <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <span>Pengaturan</span>
                </a>
            @endif
        </div>

        <div class="border-t border-gray-200 p-3 space-y-2">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="flex w-full items-center justify-between rounded-xl border border-gray-200 bg-white px-3 py-2 text-left text-xs font-medium text-gray-700 transition hover:bg-gray-50">
                        <span class="truncate max-w-[120px]">
                            @if(Auth::check())
                                {{ Auth::user()->name }}
                            @else
                                Tamu
                            @endif
                        </span>
                        <svg class="h-3.5 w-3.5 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Pengaturan Akun') }}
                    </x-dropdown-link>

                    @if(Auth::check())
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    @endif
                </x-slot>
            </x-dropdown>

            @if(Auth::check())
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex w-full items-center justify-center gap-2 rounded-xl bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-100">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1" />
                        </svg>
                        Logout
                    </button>
                </form>
            @endif
        </div>
    </div>
</nav>

