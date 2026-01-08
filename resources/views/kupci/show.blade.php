<x-guest-layout>
    <div class="max-w-2xl mx-auto mt-16 p-6 bg-white rounded-lg shadow">
        <h1 class="text-3xl font-bold mb-6 text-center">{{ $kupac->ime }} {{ $kupac->prezime }}</h1>

        <div class="space-y-4">
            <p><span class="font-semibold">Email:</span> {{ $kupac->email }}</p>
            <p><span class="font-semibold">Telefon:</span> {{ $kupac->telefon }}</p>
            <p><span class="font-semibold">Adresa:</span> {{ $kupac->adresa }}</p>
        </div>

        <div class="flex justify-center mt-6">
            <a href="{{ route('kupci.index') }}" 
               class="px-6 py-2 bg-gray-400 text-white rounded hover:bg-gray-500 transition">Nazad na kupce</a>
        </div>
    </div>
</x-guest-layout>
