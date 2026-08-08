<x-guest-layout>
    <div class="mb-4 text-center">
        <h2 class="text-xl font-bold text-purple-600">Login Khusus Pimpinan</h2>
        <p class="text-xs text-gray-500">PT Gajah Unggul International</p>
    </div>

    <form method="POST" action="{{ route('login.pimpinan') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="bg-purple-600 hover:bg-purple-700">
                {{ __('Masuk sebagai Pimpinan') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>