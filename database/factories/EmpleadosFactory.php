<?php

namespace Database\Factories;

use App\Models\Empleados;
use App\Models\Cargos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Empleados>
 */
class EmpleadosFactory extends Factory
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
            
            'nombre' => $this->faker->firstName(),
            'apellido'=> $this->faker->lastName(),
            'fecha_nacimiento'=> $this->faker->date(),
            'fecha_ingreso'=> $this->faker->date(),
            'salario'=> $this->faker->randomFloat(2, 1000, 10000),
            'estado'=> $this->faker->randomElement(['activo', 'inactivo']),
            'cargo_id' => Cargos::query()->inRandomOrder()->value('id') ?? Cargo::factory(),
       
        ];
    }
}
