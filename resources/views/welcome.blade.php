<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Andrej Dostanic</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Dropdown profil */
        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: #1e40af; /* plava za logout */
            min-width: 160px; 
            z-index: 50;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-top: 0.5rem; /* malo ispod profile dugmeta */
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content button {
            width: 100%;
            text-align: left;
            background-color: #1e40af; /* plava */
            color: white;
            border: none;
            border-radius: 0.5rem;
            padding: 0.5rem 1rem; /* manji padding, da ne pokriva Dashboard */
            font-size: 1rem;
            font-weight: 500;
        }

        .dropdown-content button:hover {
            background-color: #2563eb; /* svetlija plava */
        }

        /* Profile dugme boja (vratili smo staru) */
        .profile-btn {
            background-color: white; /* prethodna svetla boja */
            color: #111827;
            border: 1px solid #d1d5db;
            padding: 0.5rem 1rem;
        }

        .profile-btn:hover {
            background-color: #f3f4f6;
        }

        /* Proizvodi kartice vece i dugme Kupi ispod */
        .product-card {
            padding: 2rem; /* veće od prethodno */
            width: 100%;
        }

        .buy-btn {
            margin-top: 2rem; /* još više ispod teksta */
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 font-sans">

    <!-- Header -->
    <header class="w-full lg:max-w-6xl mx-auto p-6 flex justify-between items-center relative">
        <div class="text-xl font-bold text-gray-800 dark:text-gray-100">Andrej Dostanic</div>
        <nav class="flex items-center gap-4">
            @if(Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">Dashboard</a>

                    <!-- Profile dropdown -->
                    <div class="relative dropdown">
                        <button class="px-4 py-2 rounded profile-btn">
                            Profile ▼
                        </button>
                        <div class="dropdown-content">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 border rounded hover:bg-gray-200 dark:hover:bg-gray-700 transition">Login</a>
                    @if(Route::has('register'))
                        <a href="{{ route('register') }}" class="px-4 py-2 border rounded hover:bg-gray-200 dark:hover:bg-gray-700 transition">Register</a>
                    @endif
                @endauth
            @endif
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-red-50 to-red-100 dark:from-gray-800 dark:to-gray-900 py-20">
        <div class="lg:max-w-6xl mx-auto flex flex-col items-center text-center gap-6 px-6">
            <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 dark:text-gray-100">Dobrodošli na naš sajt</h1>
            <p class="text-gray-700 dark:text-gray-300 text-lg max-w-2xl">
                Nudimo najbolje proizvode i usluge za naše klijente. Kvalitet i pouzdanost su naša misija.
            </p>
            <a href="{{ auth()->check() ? route('prodavnica.index') : route('login') }}" class="px-6 py-3 bg-red-600 text-white rounded shadow hover:bg-red-700 transition">Posetite prodavnicu</a>
        </div>
    </section>

    <!-- About Section -->
    <section class="lg:max-w-6xl mx-auto p-6 lg:p-20 space-y-8">
        <h2 class="text-3xl font-bold text-center text-gray-900 dark:text-gray-100">O nama</h2>
        <p class="text-center text-gray-700 dark:text-gray-300 max-w-3xl mx-auto">
            Naša firma postoji više od 10 godina, pružajući vrhunske proizvode i usluge. 
            Posvećeni smo inovacijama i kvalitetu, sa ciljem da vaša iskustva budu nezaboravna.
        </p>
        <div class="grid lg:grid-cols-3 gap-8 mt-10">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow hover:shadow-lg transition">
                <h3 class="font-semibold text-xl mb-2 text-gray-900 dark:text-gray-100">Kvalitetni proizvodi</h3>
                <p class="text-gray-600 dark:text-gray-300">Svi naši proizvodi prolaze strogu kontrolu kvaliteta.</p>
            </div>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow hover:shadow-lg transition">
                <h3 class="font-semibold text-xl mb-2 text-gray-900 dark:text-gray-100">Brza dostava</h3>
                <p class="text-gray-600 dark:text-gray-300">Vaša narudžbina stiže sigurno i brzo do vas.</p>
            </div>
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow hover:shadow-lg transition">
                <h3 class="font-semibold text-xl mb-2 text-gray-900 dark:text-gray-100">Podrška korisnicima</h3>
                <p class="text-gray-600 dark:text-gray-300">Uvek smo tu za sva vaša pitanja i pomoć.</p>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="lg:max-w-6xl mx-auto p-6 lg:p-20 space-y-8">
        <h2 class="text-3xl font-bold text-center text-gray-900 dark:text-gray-100">Naši proizvodi</h2>
        <p class="text-center text-gray-700 dark:text-gray-300 max-w-3xl mx-auto">
            Pogledajte naše proizvode iz oblasti proizvodnje kruške.
        </p>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8 mt-10">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition product-card">
                <h3 class="font-semibold text-lg mb-1 text-gray-900 dark:text-gray-100">Sveže kruške</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-2">Hrustave i sočne kruške iz naših voćnjaka.</p>
                <a href="{{ auth()->check() ? route('prodavnica.index') : route('login') }}" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition buy-btn">Kupi</a>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition product-card">
                <h3 class="font-semibold text-lg mb-1 text-gray-900 dark:text-gray-100">Sok od kruške</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-2">Prirodni sok, osvežavajući i zdrav.</p>
                <a href="{{ auth()->check() ? route('prodavnica.index') : route('login') }}" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition buy-btn">Kupi</a>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition product-card">
                <h3 class="font-semibold text-lg mb-1 text-gray-900 dark:text-gray-100">Džem od kruške</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-2">Slatki domaći džem sa prirodnim sastojcima.</p>
                <a href="{{ auth()->check() ? route('prodavnica.index') : route('login') }}" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition buy-btn">Kupi</a>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition product-card">
                <h3 class="font-semibold text-lg mb-1 text-gray-900 dark:text-gray-100">Sušene kruške</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-2">Ukusna i zdrava grickalica, prirodno sušena.</p>
                <a href="{{ auth()->check() ? route('prodavnica.index') : route('login') }}" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition buy-btn">Kupi</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-200 dark:bg-gray-900 text-gray-700 dark:text-gray-300 p-6 lg:p-12 mt-20 text-center">
        <p>&copy; {{ date('Y') }} {{ config('app.name', 'Naš sajt') }}. Sva prava zadržana.</p>
    </footer>
</body>
</html>
