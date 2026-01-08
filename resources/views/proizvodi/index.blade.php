<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Proizvodi
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Dugme za dodavanje proizvoda -->
            <div class="mb-4">
                <a href="{{ route('proizvodi.create') }}"
                   class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    + Dodaj proizvod
                </a>
            </div>

            <!-- Tabela proizvoda -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <table class="min-w-full border border-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 border">ID</th>
                                <th class="px-4 py-2 border">Naziv</th>
                                <th class="px-4 py-2 border">Cena (RSD)</th>
                                <th class="px-4 py-2 border">Količina</th>
                                <th class="px-4 py-2 border">Akcije</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($proizvodi as $proizvod)
                                <tr class="text-center">
                                    <td class="px-4 py-2 border">{{ $proizvod->id }}</td>
                                    <td class="px-4 py-2 border">{{ $proizvod->naziv }}</td>
                                    <td class="px-4 py-2 border text-green-600 font-semibold">
                                        {{ number_format($proizvod->cena, 2) }}
                                    </td>
                                    <td class="px-4 py-2 border">
                                        {{ $proizvod->kolicina_na_stanju }}
                                    </td>
                                    <td class="px-4 py-2 border space-x-2">

                                        <a href="{{ route('proizvodi.show', $proizvod->id) }}"
                                           class="text-blue-600 hover:underline">
                                            Prikaži
                                        </a>

                                        <a href="{{ route('proizvodi.edit', $proizvod->id) }}"
                                           class="text-yellow-600 hover:underline">
                                            Izmeni
                                        </a>

                                        <form action="{{ route('proizvodi.destroy', $proizvod->id) }}"
                                              method="POST"
                                              class="inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                onclick="return confirm('Da li ste sigurni da želite da obrišete proizvod?')"
                                                class="text-red-600 hover:underline">
                                                Obriši
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach

                            @if($proizvodi->count() === 0)
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-gray-500">
                                        Nema unetih proizvoda.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
