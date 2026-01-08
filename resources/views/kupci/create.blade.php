<x-app-layout>
    <div class="lg:max-w-2xl mx-auto p-6 bg-gray-50 dark:bg-gray-800 rounded-lg shadow mt-10">
        <h1 class="text-2xl font-bold mb-6 text-gray-900 dark:text-gray-100 text-center">Dodaj novog kupca</h1>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 dark:bg-red-800 text-red-700 dark:text-red-200 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('kupci.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="ime" class="block mb-1 font-medium text-gray-700 dark:text-gray-200">Ime</label>
                <input type="text" name="ime" id="ime" value="{{ old('ime') }}" 
                    class="w-full px-4 py-2 rounded border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>

            <div>
                <label for="prezime" class="block mb-1 font-medium text-gray-700 dark:text-gray-200">Prezime</label>
                <input type="text" name="prezime" id="prezime" value="{{ old('prezime') }}" 
                    class="w-full px-4 py-2 rounded border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>

            <div>
                <label for="email" class="block mb-1 font-medium text-gray-700 dark:text-gray-200">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" 
                    class="w-full px-4 py-2 rounded border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>

            <div>
                <label for="telefon" class="block mb-1 font-medium text-gray-700 dark:text-gray-200">Telefon</label>
                <input type="text" name="telefon" id="telefon" value="{{ old('telefon') }}" 
                    class="w-full px-4 py-2 rounded border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>

            <div>
                <label for="adresa" class="block mb-1 font-medium text-gray-700 dark:text-gray-200">Adresa</label>
                <input type="text" name="adresa" id="adresa" value="{{ old('adresa') }}" 
                    class="w-full px-4 py-2 rounded border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>

            <div class="flex justify-end mt-6">
                <a href="{{ route('kupci.index') }}" 
                    class="px-6 py-2 mr-4 bg-gray-400 text-white rounded hover:bg-gray-500 transition">Nazad</a>
                <button type="submit" 
                    class="px-6 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">Dodaj kupca</button>
            </div>
        </form>
    </div>
</x-app-layout>
