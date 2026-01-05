<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proizvod;
use Faker\Factory as Faker;

class ProizvodSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('sr_RS');

        $naziviProizvoda = [
            'Sveža kruška viljamovka',
            'Sveža kruška konferans',
            'Sveža kruška abate fetel',
            'Sveža kruška pakamska',
            'Kruška za industrijsku preradu',
            'Kruška za sok',
            'Kruška za kompot',
            'Kruška za rakiju',
            'Sušena kruška',
            'Kruška prva klasa',
            'Kruška druga klasa',
            'Organska kruška',
            'Kruška iz domaće proizvodnje',
            'Kruška za izvoz',
            'Kruška za domaće tržište'
        ];

        foreach ($naziviProizvoda as $naziv) {
            Proizvod::create([
                'naziv' => $naziv,
                'opis' => 'Proizvod iz proizvodnje kruške namenjen za prodaju ili preradu.',
                'cena' => $faker->randomFloat(2, 40, 250),
                'kolicina_na_stanju' => $faker->numberBetween(100, 5000),
            ]);
        }
    }
}
