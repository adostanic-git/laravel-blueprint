<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h1 class="text-2xl font-bold text-center mb-6 text-gray-800">Dodaj novi proizvod</h1>

    <form method="POST" action="{{ route('proizvodi.store') }}">
        @csrf

        <!-- Naziv proizvoda -->
        <div class="mt-4">
            <x-input-label for="naziv" :value="__('Naziv proizvoda')" />
            <x-text-input id="naziv" class="block mt-1 w-full" type="text" name="naziv" :value="old('naziv')" required autofocus />
            <x-input-error :messages="$errors->get('naziv')" class="mt-2" />
        </div>

        <!-- Opis -->
        <div class="mt-4">
            <x-input-label for="opis" :value="__('Opis')" />
            <x-text-input id="opis" class="block mt-1 w-full" type="text" name="opis" :value="old('opis')" required />
            <x-input-error :messages="$errors->get('opis')" class="mt-2" />
        </div>

        <!-- Cena -->
        <div class="mt-4">
            <x-input-label for="cena" :value="__('Cena (RSD)')" />
            <x-text-input id="cena" class="block mt-1 w-full" type="number" step="0.01" name="cena" :value="old('cena')" required />
            <x-input-error :messages="$errors->get('cena')" class="mt-2" />
        </div>

        <!-- Količina na stanju -->
        <div class="mt-4">
            <x-input-label for="kolicina_na_stanju" :value="__('Količina na stanju (kg)')" />
            <x-text-input id="kolicina_na_stanju" class="block mt-1 w-full" type="number" step="1" name="kolicina_na_stanju" :value="old('kolicina_na_stanju')" required />
            <x-input-error :messages="$errors->get('kolicina_na_stanju')" class="mt-2" />
        </div>

        <!-- Dugmad -->
        <div class="flex items-center justify-end mt-6">
            <a href="{{ route('proizvodi.index') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Nazad
            </a>

            <x-primary-button class="ms-3">
                {{ __('Dodaj proizvod') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
