<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-gray-800">Login Akses Sistem</h2>
        <p class="text-sm text-gray-500">Admin, Operasional & Pimpinan</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <div class="mt-6 border-t border-gray-200 pt-5">
        <p class="mb-3 text-xs font-semibold uppercase tracking-wide text-gray-500">Registrasi cepat</p>
        <div class="grid grid-cols-1 gap-2 sm:grid-cols-3">
            <a href="{{ route('regis.admin') }}" class="rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-center text-xs font-semibold text-red-700 hover:bg-red-100">Admin</a>
            <a href="{{ route('regis.operasional') }}" class="rounded-lg border border-blue-200 bg-blue-50 px-3 py-2 text-center text-xs font-semibold text-blue-700 hover:bg-blue-100">Operasional</a>
            <a href="{{ route('regis.pimpinan') }}" class="rounded-lg border border-purple-200 bg-purple-50 px-3 py-2 text-center text-xs font-semibold text-purple-700 hover:bg-purple-100">Pimpinan</a>
        </div>
    </div>
</x-guest-layout>
