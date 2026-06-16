<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cargos;
use App\Models\FuncionesCargos;

class FuncionesCargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
            Cargos::all()->each(function (Cargos $cargo): void {
            FuncionesCargos::factory()
                ->count(5)
                ->create([
                    'cargo_id' => $cargo->id,
                ]);
        });
    }
}
