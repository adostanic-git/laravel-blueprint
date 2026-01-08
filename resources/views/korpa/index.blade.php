<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            Korpa
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if(count($korpa) > 0)

                <div class="bg-white shadow rounded-lg p-6">

                    <table class="min-w-full border">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border px-4 py-2">Proizvod</th>
                                <th class="border px-4 py-2">Cena</th>
                                <th class="border px-4 py-2">Količina</th>
                                <th class="border px-4 py-2">Ukupno</th>
                                <th class="border px-4 py-2">Akcija</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php $total = 0; @endphp

                            @foreach($korpa as $id => $item)
                                @php
                                    $ukupno = $item['cena'] * $item['kolicina'];
                                    $total += $ukupno;
                                @endphp

                                <tr class="text-center">
                                    <td class="border px-4 py-2">{{ $item['naziv'] }}</td>
                                    <td class="border px-4 py-2 text-green-600">
                                        {{ number_format($item['cena'], 2) }} RSD
                                    </td>
                                    <td class="border px-4 py-2">{{ $item['kolicina'] }}</td>
                                    <td class="border px-4 py-2 font-semibold">
                                        {{ number_format($ukupno, 2) }} RSD
                                    </td>
                                    <td class="border px-4 py-2">
                                        <form action="{{ route('korpa.remove', $id) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="text-red-600 hover:underline">
                                                Ukloni
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                    <div class="text-right mt-6 text-xl font-bold text-green-700">
                        Ukupno: {{ number_format($total, 2) }} RSD
                    </div>

                </div>

            @else
                <p class="text-gray-500 text-center">
                    Korpa je prazna.
                </p>
            @endif

        </div>
    </div>
</x-app-layout>
