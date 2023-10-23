<?php

namespace Database\Seeders;

use App\Models\CargoColaborador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CargoColaboradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CargoColaborador::factory(100)->create();
    }
}
