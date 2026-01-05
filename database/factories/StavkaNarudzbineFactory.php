<?php

namespace Database\Factories;

use App\Models\Narudzbina;
use App\Models\Proizvod;
use Illuminate\Database\Eloquent\Factories\Factory;

class StavkaNarudzbineFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'narudzbina_id' => Narudzbina::factory(),
            'proizvod_id' => Proizvod::factory(),
            'kolicina' => fake()->numberBetween(-10000, 10000),
            'cena' => fake()->randomFloat(2, 0, 999999.99),
        ];
    }
}
