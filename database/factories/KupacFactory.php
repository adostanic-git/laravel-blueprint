<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KupacFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'ime' => fake()->word(),
            'prezime' => fake()->word(),
            'email' => fake()->safeEmail(),
            'telefon' => fake()->word(),
            'adresa' => fake()->word(),
        ];
    }
}
