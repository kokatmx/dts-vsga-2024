<?php

namespace Database\Factories;

use App\Models\Categori;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categori>
 */
class CategoriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $code = 'KTG' . str_pad(Categori::count() + 1, 4, '0', STR_PAD_LEFT);
        return [
            'categori_code' => $code,
            'categori_nama' => fake()->name(),
        ];
    }
}
