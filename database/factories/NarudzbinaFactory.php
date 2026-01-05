<?php

namespace Database\Factories;

use App\Models\Kupac;
use Illuminate\Database\Eloquent\Factories\Factory;

class NarudzbinaFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'kupac_id' => Kupac::factory(),
            'ukupan_iznos' => fake()->randomFloat(2, 0, 99999999.99),
            'status' => fake()->word(),
        ];
    }
}
