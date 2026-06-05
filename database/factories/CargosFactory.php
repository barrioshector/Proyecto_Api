<?php

namespace Database\Factories;

use App\Models\Cargos;
use Illuminate\Database\Eloquent\Factories\Factory;

class CargosFactory extends Factory
{
    protected $model = Cargos::class;

    public function definition(): array
    {
        return [
            'nombre_cargo' => fake()->jobTitle(),
            'descripcion' => fake()->sentence(),
        ];
    }
}
