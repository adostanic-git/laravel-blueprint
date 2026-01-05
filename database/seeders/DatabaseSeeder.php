<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Pokretanje svih seedera u aplikaciji
     */
    public function run(): void
    {
        $this->call([
            // Seederi za osnovne modele aplikacije
            ProizvodSeeder::class,
            KupacSeeder::class,
            DobavljacSeeder::class,
            NarudzbinaSeeder::class,
            StavkaNarudzbineSeeder::class,
        ]);
    }
}
