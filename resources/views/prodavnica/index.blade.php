<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            Prodavnica
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                @foreach($proizvodi as $proizvod)
                    <div class="bg-white rounded-xl shadow p-6 hover:shadow-lg transition">

                        {{-- Klik na naziv vodi na poseban proizvod --}}
                        <a href="{{ route('prodavnica.show', $proizvod->id) }}">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">
                                {{ $proizvod->naziv }}
                            </h3>
                        </a>

                        <p class="text-gray-600 text-sm mb-3">
                            {{ Str::limit($proizvod->opis, 90) }}
                        </p>

                        <p class="text-green-600 text-lg font-semibold mb-2">
                            {{ number_format($proizvod->cena, 2) }} RSD
                        </p>

                        <p class="text-sm text-gray-500 mb-4">
                            Na stanju: {{ $proizvod->kolicina_na_stanju }}
                        </p>

                        {{-- Dodaj u korpu --}}
                        <form action="{{ route('korpa.add', $proizvod->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="quantity" value="1">

                            <button type="submit"
                                class="w-full bg-green-600 text-white py-2 rounded-lg font-semibold hover:bg-green-700 transition">
                                Dodaj u korpu
                            </button>
                        </form>

                    </div>
                @endforeach

                @if($proizvodi->count() === 0)
                    <p class="text-gray-500">Nema proizvoda u prodavnici.</p>
                @endif

            </div>

        </div>
    </div>
</x-app-layout>
