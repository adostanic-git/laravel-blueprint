<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dobavljači
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Dugme za dodavanje -->
            <div class="mb-4">
                <a href="{{ route('dobavljaci.create') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    + Dodaj dobavljača
                </a>
            </div>

            <!-- Tabela -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <table class="min-w-full border border-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 border">ID</th>
                                <th class="px-4 py-2 border">Naziv</th>
                                <th class="px-4 py-2 border">Kontakt osoba</th>
                                <th class="px-4 py-2 border">Email</th>
                                <th class="px-4 py-2 border">Telefon</th>
                                <th class="px-4 py-2 border">Akcije</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dobavljaci as $dobavljac)
                                <tr class="text-center">
                                    <td class="px-4 py-2 border">{{ $dobavljac->id }}</td>
                                    <td class="px-4 py-2 border">{{ $dobavljac->naziv }}</td>
                                    <td class="px-4 py-2 border">{{ $dobavljac->kontakt_osoba }}</td>
                                    <td class="px-4 py-2 border">{{ $dobavljac->email }}</td>
                                    <td class="px-4 py-2 border">{{ $dobavljac->telefon }}</td>
                                    <td class="px-4 py-2 border space-x-2">

                                        <a href="{{ route('dobavljaci.show', $dobavljac->id) }}"
                                           class="text-blue-600 hover:underline">
                                            Prikaži
                                        </a>

                                        <a href="{{ route('dobavljaci.edit', $dobavljac->id) }}"
                                           class="text-yellow-600 hover:underline">
                                            Izmeni
                                        </a>

                                        <form action="{{ route('dobavljaci.destroy', $dobavljac->id) }}"
                                              method="POST"
                                              class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Da li ste sigurni?')"
                                                class="text-red-600 hover:underline">
                                                Obriši
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach

                            @if($dobavljaci->count() === 0)
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-gray-500">
                                        Nema unetih dobavljača.
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
