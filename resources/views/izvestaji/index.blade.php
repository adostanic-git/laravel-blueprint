<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Izveštaji - Andrej Dostanic</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
            margin-top: 0.5rem;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content button {
            width: 100%;
            text-align: left;
            background-color: #1e40af;
            color: white;
            border: none;
            border-radius: 0.5rem;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            font-weight: 500;
        }

        .dropdown-content button:hover {
            background-color: #2563eb;
        }

        .profile-btn {
            background-color: white;
            color: #111827;
            border: 1px solid #d1d5db;
            padding: 0.5rem 1rem;
        }

        .profile-btn:hover {
            background-color: #f3f4f6;
        }

        /* Tabela izvestaja */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
            background-color: #1e293b; /* tamno plava/ljubičasta */
            color: #f3f4f6; /* svetlo siva za tekst */
        }

        th, td {
            padding: 0.75rem 1rem;
            border: 1px solid #334155; /* tamniji obrub */
            text-align: left;
        }

        th {
            background-color: #1e40af; /* tamnija plava */
            color: #f3f4f6;
            font-weight: 600;
        }

        td {
            background-color: #1e293b; /* ista kao tabela, jednobojno */
        }

        .print-btn {
            background-color: #dc2626;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-weight: 500;
            margin-top: 1rem;
            display: inline-block;
        }

        .print-btn:hover {
            background-color: #b91c1c;
        }

        /* Chart container */
        .chart-container {
            background-color: #1e293b;
            padding: 2rem;
            border-radius: 0.5rem;
            margin-top: 2rem;
            color: #f3f4f6;
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
                    <a href="{{ route('prodavnica.index') }}" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">Prodavnica</a>
                    <a href="{{ route('kupci.index') }}" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">Kupci</a>
                    <a href="{{ route('dobavljaci.index') }}" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">Dobavljači</a>
                    <a href="{{ route('proizvodi.index') }}" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">Proizvodi</a>

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
                @endauth
            @endif
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-red-50 to-red-100 dark:from-gray-800 dark:to-gray-900 py-16">
        <div class="lg:max-w-6xl mx-auto text-center px-6">
            <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 dark:text-gray-100">Izveštaji proizvodnje kruške</h1>
            <p class="text-gray-700 dark:text-gray-300 mt-4">Pregledajte sve ključne podatke o proizvodnji, skladištenju i prodaji.</p>
            <button onclick="window.print()" class="print-btn mt-6">Štampa izveštaja</button>
        </div>
    </section>

    <!-- Reports Table Section -->
    <section class="lg:max-w-6xl mx-auto p-6 lg:p-20">
        <h2 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Dnevni izveštaj proizvoda</h2>

        <div class="overflow-x-auto">
            <table>
                <thead>
                    <tr>
                        <th>Datum</th>
                        <th>Vrsta proizvoda</th>
                        <th>Količina (kg)</th>
                        <th>Status skladišta</th>
                        <th>Napomene</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2026-01-01</td>
                        <td>Sveže kruške</td>
                        <td>1200</td>
                        <td>Popunjeno</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>2026-01-01</td>
                        <td>Sok od kruške</td>
                        <td>800</td>
                        <td>Dovoljno</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>2026-01-01</td>
                        <td>Džem od kruške</td>
                        <td>500</td>
                        <td>Nedovoljno</td>
                        <td>Potrebno dopuniti</td>
                    </tr>
                    <tr>
                        <td>2026-01-01</td>
                        <td>Sušene kruške</td>
                        <td>300</td>
                        <td>Dovoljno</td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Additional section for grafici / statistiku -->
        <div class="mt-12 space-y-6">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-gray-100">Statistika prodaje</h3>
                <p class="text-gray-600 dark:text-gray-300">Grafički prikaz prodatih količina po proizvodima.</p>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="chart-container">
            <h3 class="text-xl font-semibold mb-4 text-gray-100">Prodaja po proizvodima (kg)</h3>
            <canvas id="prodajaChart" width="400" height="200"></canvas>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-200 dark:bg-gray-900 text-gray-700 dark:text-gray-300 p-6 lg:p-12 mt-20 text-center">
        <p>&copy; {{ date('Y') }} {{ config('app.name', 'Naš sajt') }}. Sva prava zadržana.</p>
    </footer>

    <script>
        const ctx = document.getElementById('prodajaChart').getContext('2d');
        const prodajaChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Sveže kruške', 'Sok od kruške', 'Džem od kruške', 'Sušene kruške'],
                datasets: [{
                    label: 'Količina (kg)',
                    data: [1200, 800, 500, 300],
                    backgroundColor: ['#f87171', '#fbbf24', '#60a5fa', '#34d399'],
                    borderColor: ['#b91c1c', '#b45309', '#1e40af', '#065f46'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: { color: '#f3f4f6' }
                    }
                },
                scales: {
                    x: {
                        ticks: { color: '#f3f4f6' },
                        grid: { color: '#334155' }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: { color: '#f3f4f6' },
                        grid: { color: '#334155' }
                    }
                }
            }
        });
    </script>
</body>
</html>
