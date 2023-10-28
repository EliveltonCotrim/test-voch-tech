<?php

namespace Database\Factories;

use App\Models\Cargo;
use App\Models\Colaborador;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CargoColaborador>
 */
class CargoColaboradorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cargo = Cargo::inRandomOrder()->first();

        return [
            'cargo_id' => $cargo->id,
            'colaborador_id' => Colaborador::factory()->create()->id,
            'nota_desempenho' => fake()->randomFloat(2, 0, 10),
        ];
    }
}
