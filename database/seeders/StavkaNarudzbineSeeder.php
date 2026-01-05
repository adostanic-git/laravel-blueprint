<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StavkaNarudzbine;
use App\Models\Narudzbina;
use App\Models\Proizvod;

class StavkaNarudzbineSeeder extends Seeder
{
    public function run(): void
    {
        $narudzbine = Narudzbina::all();
        $proizvodi = Proizvod::all();

        foreach ($narudzbine as $narudzbina) {
            $broj_stavki = rand(1, 5);

            for ($i = 0; $i < $broj_stavki; $i++) {
                $proizvod = $proizvodi->random();

                StavkaNarudzbine::create([
                    'narudzbina_id' => $narudzbina->id,
                    'proizvod_id' => $proizvod->id,
                    'kolicina' => rand(1, 10),
                    'cena' => $proizvod->cena,
                ]);
            }
        }
    }
}
