<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProizvodFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'naziv' => fake()->word(),
            'opis' => fake()->text(),
            'cena' => fake()->randomFloat(2, 0, 999999.99),
            'kolicina_na_stanju' => fake()->numberBetween(-10000, 10000),
        ];
    }
}
