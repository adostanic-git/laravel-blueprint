<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Narudžbine
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @forelse(\App\Models\Narudzbina::orderBy('created_at', 'desc')->get() as $narudzbina)
                <div class="bg-white shadow-md rounded-lg p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-semibold mb-2">
                                Kupac: {{ $narudzbina->kupac->ime ?? 'Nepoznat' }}
                            </h3>
                            <p class="text-gray-700">
                                Ukupna cena: <span class="font-bold text-green-600">{{ $narudzbina->ukupan_iznos }} RSD</span>
                            </p>
                            <p class="text-gray-700">
                                Datum: {{ $narudzbina->created_at->format('d.m.Y H:i') }}
                            </p>
                        </div>

                        <!-- Status sa desne strane -->
                        <span class="px-3 py-1 rounded-full text-white
                            @if($narudzbina->status === 'nova') bg-blue-600
                            @elseif($narudzbina->status === 'u obradi') bg-yellow-500
                            @elseif($narudzbina->status === 'završena') bg-green-600
                            @else bg-gray-500
                            @endif">
                            {{ ucfirst($narudzbina->status) }}
                        </span>
                    </div>

                    <!-- Dugme ispod -->
                    <div class="mt-4 text-center">
                        <a href="{{ route('narudzbine.edit', $narudzbina->id) }}"
                           class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                           Izmeni narudžbinu
                        </a>
                    </div>
                </div>
            @empty
                <div class="bg-white shadow-md rounded-lg p-6 text-center text-gray-500">
                    Trenutno nema narudžbina.
                </div>
            @endforelse

        </div>
    </div>
</x-app-layout>
