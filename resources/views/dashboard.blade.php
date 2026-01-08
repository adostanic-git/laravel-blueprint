<x-app-layout>
    <!-- Header -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div
                    x-data="{ show: true }"
                    x-init="setTimeout(() => show = false, 5000)"
                    x-show="show"
                    x-transition
                    class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded"
                >
                    {{ session('success') }}
                </div>
            @endif

            <!-- Info kartice -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">

                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-gray-500 text-sm">Ukupno proizvoda</h3>
                    <p class="text-2xl font-bold text-gray-800">
                        {{ \App\Models\Proizvod::count() }}
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-gray-500 text-sm">Kupci</h3>
                    <p class="text-2xl font-bold text-gray-800">
                        {{ \App\Models\Kupac::count() }}
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-gray-500 text-sm">Dobavljači</h3>
                    <p class="text-2xl font-bold text-gray-800">
                        {{ \App\Models\Dobavljac::count() }}
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-gray-500 text-sm">Narudžbine</h3>
                    <p class="text-2xl font-bold text-gray-800">
                        {{ \App\Models\Narudzbina::count() }}
                    </p>
                </div>

            </div>

            <!-- Poslednje narudžbine -->
            <div class="bg-white shadow-sm sm:rounded-lg mb-8">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">
                        Poslednje narudžbine
                    </h3>

                    <table class="min-w-full border border-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 border">Redni broj</th>
                                <th class="px-4 py-2 border">Kupac</th>
                                <th class="px-4 py-2 border">Ukupna cena</th>
                                <th class="px-4 py-2 border">Status</th>
                                <th class="px-4 py-2 border">Datum</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (
                                \App\Models\Narudzbina::orderBy('created_at', 'desc')->take(5)->get()
                                as $narudzbina
                            )
                                <tr class="text-center">
                                    <td class="px-4 py-2 border">{{ $narudzbina->id }}</td>
                                    <td class="px-4 py-2 border">
                                        {{ $narudzbina->kupac->ime ?? 'N/A' }}
                                    </td>
                                    <td class="px-4 py-2 border">
                                        {{ $narudzbina->ukupan_iznos }} RSD
                                    </td>
                                    <td class="px-4 py-2 border">
                                        {{ ucfirst($narudzbina->status) }}
                                    </td>
                                    <td class="px-4 py-2 border">
                                        {{ $narudzbina->created_at->format('d.m.Y') }}
                                    </td>
                                </tr>
                            @endforeach

                            @if(\App\Models\Narudzbina::count() === 0)
                                <tr>
                                    <td colspan="5" class="px-4 py-4 text-center text-gray-500">
                                        Trenutno nema narudžbina.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">
                        Administrativni panel
                    </h3>

                    <p>
                        Dashboard omogućava brz pregled stanja sistema i
                        najvažnijih poslovnih podataka vezanih za prodaju
                        proizvoda od kruške.
                    </p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
