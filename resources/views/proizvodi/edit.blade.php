<x-guest-layout>
    <div class="max-w-lg mx-auto mt-16 p-6 rounded-lg shadow bg-gray-100">
        <h1 class="text-2xl font-bold mb-6 text-center">Izmeni proizvod</h1>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('proizvodi.update', $proizvod->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="naziv" class="block mb-1 font-medium">Naziv</label>
                <input type="text" name="naziv" id="naziv" value="{{ old('naziv', $proizvod->naziv) }}"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-gray-400">
            </div>

            <div>
                <label for="opis" class="block mb-1 font-medium">Opis</label>
                <textarea name="opis" id="opis" rows="3"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-gray-400">{{ old('opis', $proizvod->opis) }}</textarea>
            </div>

            <div>
                <label for="cena" class="block mb-1 font-medium">Cena</label>
                <input type="number" name="cena" id="cena" value="{{ old('cena', $proizvod->cena) }}" step="0.01"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-gray-400">
            </div>

            <div>
                <label for="kolicina_na_stanju" class="block mb-1 font-medium">Količina na stanju</label>
                <input type="number" name="kolicina_na_stanju" id="kolicina_na_stanju" value="{{ old('kolicina_na_stanju', $proizvod->kolicina_na_stanju) }}" 
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-gray-400">
            </div>

            <div class="flex justify-end mt-6">
                <a href="{{ route('proizvodi.index') }}"
                    class="px-6 py-2 mr-4 bg-gray-400 text-white rounded hover:bg-gray-500 transition">Nazad</a>
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Sačuvaj izmene</button>
            </div>
        </form>
    </div>
</x-guest-layout>
