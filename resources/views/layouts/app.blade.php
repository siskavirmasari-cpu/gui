<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="flex h-screen overflow-hidden bg-gray-100">
            <div class="h-screen shrink-0">
                @include('layouts.navigation')
            </div>

            <div class="flex-1 min-w-0 overflow-y-auto">
                <!-- Page Heading -->
                @isset($header)
                    <header class="border-b border-gray-200 bg-white/95 backdrop-blur-sm shadow-sm">
                        <div class="mx-auto max-w-7xl py-5 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main class="p-4 sm:p-6 lg:p-8">
                    {{ $slot }}
                </main>
            </div>
        </div>

        <!-- Stack scripts untuk memuat Chart.js dari halaman laporan -->
        @stack('scripts')
    </body>
</html>