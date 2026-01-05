<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Narudzbina;
use App\Models\Kupac;
use Faker\Factory as Faker;

class NarudzbinaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('sr_RS');
        $kupci = Kupac::all();

        foreach ($kupci as $kupac) {
            Narudzbina::create([
                'kupac_id' => $kupac->id,
                'ukupan_iznos' => $faker->randomFloat(2, 500, 15000),
                'status' => $faker->randomElement([
                    'nova',
                    'u obradi',
                    'završena'
                ]),
            ]);
        }
    }
}
