<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h1 class="text-2xl font-bold text-center mb-6 text-gray-800">Dodaj novog kupca</h1>

    <form method="POST" action="{{ route('kupci.store') }}">
        @csrf

        <!-- Ime -->
        <div class="mt-4">
            <x-input-label for="ime" :value="__('Ime')" />
            <x-text-input id="ime" class="block mt-1 w-full" type="text" name="ime" :value="old('ime')" required autofocus />
            <x-input-error :messages="$errors->get('ime')" class="mt-2" />
        </div>

        <!-- Prezime -->
        <div class="mt-4">
            <x-input-label for="prezime" :value="__('Prezime')" />
            <x-text-input id="prezime" class="block mt-1 w-full" type="text" name="prezime" :value="old('prezime')" required />
            <x-input-error :messages="$errors->get('prezime')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Telefon -->
        <div class="mt-4">
            <x-input-label for="telefon" :value="__('Telefon')" />
            <x-text-input id="telefon" class="block mt-1 w-full" type="text" name="telefon" :value="old('telefon')" required />
            <x-input-error :messages="$errors->get('telefon')" class="mt-2" />
        </div>

        <!-- Adresa -->
        <div class="mt-4">
            <x-input-label for="adresa" :value="__('Adresa')" />
            <x-text-input id="adresa" class="block mt-1 w-full" type="text" name="adresa" :value="old('adresa')" required />
            <x-input-error :messages="$errors->get('adresa')" class="mt-2" />
        </div>

        <!-- Dugmad -->
        <div class="flex items-center justify-end mt-6">
            <a href="{{ route('kupci.index') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Nazad
            </a>

            <x-primary-button class="ms-3">
                {{ __('Dodaj kupca') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
