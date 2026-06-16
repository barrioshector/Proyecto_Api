<?php

namespace Database\Factories;

use App\Models\FuncionesCargos;
use App\Models\Cargos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<FuncionesCargos>
 */
class FuncionesCargosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'descripcion_funcion' => $this->faker->sentence(),
            'estado' => $this->faker->randomElement(['activo', 'inactivo']),
            'cargo_id'=>Cargos::factory(),
        ];
    }
}
