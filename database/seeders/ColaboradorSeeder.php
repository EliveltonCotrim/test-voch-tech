<?php

namespace Database\Seeders;

use App\Models\CargoColaborador;
use App\Models\Colaborador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColaboradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Colaborador::factory(100)
            ->has(CargoColaborador::factory()->count(1))
            ->create();
    }
}
