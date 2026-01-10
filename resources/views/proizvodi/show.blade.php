<x-guest-layout>
    <div class="max-w-2xl mx-auto mt-16 p-6 bg-white rounded-lg shadow">
        <h1 class="text-3xl font-bold mb-6 text-center">{{ $proizvod->naziv }}</h1>

        <div class="space-y-4">
            <p><span class="font-semibold">Opis:</span> {{ $proizvod->opis }}</p>
            <p><span class="font-semibold">Cena:</span> {{ $proizvod->cena }} RSD</p>
            <p><span class="font-semibold">Količina na stanju:</span> {{ $proizvod->kolicina_na_stanju }} kg</p>
        </div>

        <div class="flex justify-center mt-6">
            <a href="{{ route('proizvodi.index') }}" 
               class="px-6 py-2 bg-gray-400 text-white rounded hover:bg-gray-500 transition">Nazad na proizvode</a>
        </div>
    </div>
</x-guest-layout>
