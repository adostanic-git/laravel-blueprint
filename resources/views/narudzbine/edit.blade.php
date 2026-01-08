<x-guest-layout>
    <div class="max-w-2xl mx-auto mt-16 p-6 bg-white rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-6 text-center">Izmeni narudžbinu</h1>

        <form action="{{ route('narudzbine.update', $narudzbina->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="status" class="block mb-1 font-medium text-gray-700">Status</label>
                <select name="status" id="status" class="w-full px-4 py-2 rounded border border-gray-300">
                    <option value="nova" {{ $narudzbina->status === 'nova' ? 'selected' : '' }}>Nova</option>
                    <option value="u obradi" {{ $narudzbina->status === 'u obradi' ? 'selected' : '' }}>U obradi</option>
                    <option value="završena" {{ $narudzbina->status === 'završena' ? 'selected' : '' }}>Završena</option>
                </select>
            </div>

            <div>
                <label for="ukupan_iznos" class="block mb-1 font-medium text-gray-700">Ukupna cena</label>
                <input type="number" name="ukupan_iznos" id="ukupan_iznos" value="{{ $narudzbina->ukupan_iznos }}"
                       class="w-full px-4 py-2 rounded border border-gray-300">
            </div>

            <div class="flex justify-end mt-6">
                <a href="{{ route('narudzbine.index') }}"
                   class="px-6 py-2 mr-4 bg-gray-400 text-white rounded hover:bg-gray-500 transition">Nazad</a>
                <button type="submit"
                        class="px-6 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">Sačuvaj promene</button>
            </div>
        </form>
    </div>
</x-guest-layout>
