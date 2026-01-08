<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h1 class="text-2xl font-bold text-center mb-6 text-gray-800">Dodaj novog dobavljača</h1>

    <form method="POST" action="{{ route('dobavljaci.store') }}">
        @csrf

        <!-- Naziv firme -->
        <div class="mt-4">
            <x-input-label for="naziv" :value="__('Naziv firme')" />
            <x-text-input id="naziv" class="block mt-1 w-full" type="text" name="naziv" :value="old('naziv')" required autofocus />
            <x-input-error :messages="$errors->get('naziv')" class="mt-2" />
        </div>

        <!-- Kontakt osoba -->
        <div class="mt-4">
            <x-input-label for="kontakt_osoba" :value="__('Kontakt osoba')" />
            <x-text-input id="kontakt_osoba" class="block mt-1 w-full" type="text" name="kontakt_osoba" :value="old('kontakt_osoba')" required />
            <x-input-error :messages="$errors->get('kontakt_osoba')" class="mt-2" />
        </div>

        <!-- Telefon -->
        <div class="mt-4">
            <x-input-label for="telefon" :value="__('Telefon')" />
            <x-text-input id="telefon" class="block mt-1 w-full" type="text" name="telefon" :value="old('telefon')" required />
            <x-input-error :messages="$errors->get('telefon')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Dugmad -->
        <div class="flex items-center justify-end mt-6">
            <a href="{{ route('dobavljaci.index') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Nazad
            </a>

            <x-primary-button class="ms-3">
                {{ __('Dodaj dobavljača') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
