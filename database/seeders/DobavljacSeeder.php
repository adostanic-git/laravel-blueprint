<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dobavljac;
use Faker\Factory as Faker;

class DobavljacSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $naziviDobavljaca = [
            'Agro Fru Šabac',
            'Voćar Novi Sad',
            'Voćarska zadruga Jagodina',
            'Plodovi Srbije',
            'Voćni raj Niš',
            'Zlatna Kruška',
            'Voćna bašta',
            'Kruška Plus',
            'Voćarski Centar Beograd',
            'Voćni svet Sombor'
        ];

        $kontaktOsobe = [
            'Marko Petrovic', 'Nikola Jovanovic', 'Milan Nikolic',
            'Ana Ilic', 'Milica Stojanovic', 'Jelena Pavlovic',
            'Filip Kovacevic', 'Ivana Popovic', 'Petar Djordjevic',
            'Stefan Markovic'
        ];

        for ($i = 0; $i < count($naziviDobavljaca); $i++) {
            Dobavljac::create([
                'naziv' => $naziviDobavljaca[$i],
                'kontakt_osoba' => $kontaktOsobe[$i],
                'telefon' => $faker->phoneNumber(),
                'email' => $faker->companyEmail(),
            ]);
        }
    }
}
