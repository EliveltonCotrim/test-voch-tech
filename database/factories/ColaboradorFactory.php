<?php

namespace Database\Factories;

use App\Models\Unidade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Colaborador>
 */
class ColaboradorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $unidade = Unidade::inRandomOrder()->first();

        return [
            'unidade_id' => $unidade->id,
            'nome' => fake('pt_BR')->name,
            'email' => fake('pt_BR')->unique()->safeEmail(),
            'cpf' => fake()->unique()->numerify('###########'),
        ];
    }
}
