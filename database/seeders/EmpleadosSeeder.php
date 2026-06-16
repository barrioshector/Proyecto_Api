<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Empleados;
use App\Models\Cargos;
use Illuminate\Database\Seeder;

class EmpleadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $cargoIds = Cargos::query()->pluck('id');

        if ($cargoIds->isEmpty()) {
            $cargoIds = Cargos::factory()->count(40)->create()->pluck('id');
        }

        Empleados::factory()
            ->count(30)
            ->create([
                'cargo_id' => fn () => $cargoIds->random(),
            ]);
    }
}
