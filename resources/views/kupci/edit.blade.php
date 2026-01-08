<x-guest-layout>
    <div class="max-w-lg mx-auto mt-16 p-6 rounded-lg shadow bg-gray-100">
        <h1 class="text-2xl font-bold mb-6 text-center">Izmeni kupca</h1>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('kupci.update', $kupac->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="ime" class="block mb-1 font-medium">Ime</label>
                <input type="text" name="ime" id="ime" value="{{ old('ime', $kupac->ime) }}"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-gray-400">
            </div>

            <div>
                <label for="prezime" class="block mb-1 font-medium">Prezime</label>
                <input type="text" name="prezime" id="prezime" value="{{ old('prezime', $kupac->prezime) }}"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-gray-400">
            </div>

            <div>
                <label for="email" class="block mb-1 font-medium">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $kupac->email) }}"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-gray-400">
            </div>

            <div>
                <label for="telefon" class="block mb-1 font-medium">Telefon</label>
                <input type="text" name="telefon" id="telefon" value="{{ old('telefon', $kupac->telefon) }}"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-gray-400">
            </div>

            <div>
                <label for="adresa" class="block mb-1 font-medium">Adresa</label>
                <input type="text" name="adresa" id="adresa" value="{{ old('adresa', $kupac->adresa) }}"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-gray-400">
            </div>

            <div class="flex justify-end mt-6">
                <a href="{{ route('kupci.index') }}"
                    class="px-6 py-2 mr-4 bg-gray-400 text-white rounded hover:bg-gray-500 transition">Nazad</a>
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Sačuvaj izmene</button>
            </div>
        </form>
    </div>
</x-guest-layout>
