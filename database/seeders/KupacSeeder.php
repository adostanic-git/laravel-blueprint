<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kupac;
use Faker\Factory as Faker;

class KupacSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $imena = [
            'Marko', 'Nikola', 'Milan', 'Petar', 'Stefan',
            'Aleksandar', 'Jovan', 'Nemanja', 'Filip', 'Luka',
            'Ana', 'Milica', 'Jelena', 'Marija', 'Ivana'
        ];

        $prezimena = [
            'Petrovic', 'Jovanovic', 'Nikolic', 'Ilic', 'Stojanovic',
            'Markovic', 'Pavlovic', 'Djordjevic', 'Kovacevic', 'Popovic'
        ];

        for ($i = 0; $i < 15; $i++) {
            Kupac::create([
                'ime' => $faker->randomElement($imena),
                'prezime' => $faker->randomElement($prezimena),
                'email' => $faker->unique()->safeEmail(),
                'telefon' => $faker->phoneNumber(),
                'adresa' => $faker->streetAddress() . ', ' . $faker->city(),
            ]);
        }
    }
}
