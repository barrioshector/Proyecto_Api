<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Cargos;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\Sanctum;

class AuthEmpleadoTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
public function test_usuario_puede_registrarse()
{
    $response = $this->postJson('/api/register', [
        'name' => 'Hector',
        'email' => 'hector@test.com',
        'password' => '123456'
    ]);

    $response->assertStatus(200);

    $this->assertDatabaseHas('users', [
        'email' => 'hector@test.com'
    ]);
}
    public function test_usuario_puede_loguearse()
    {
        User::create([
            'name' => 'Hector',
            'email' => 'hector@test.com',
            'password' => Hash::make('123456')
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'hector@test.com',
            'password' => '123456'
        ]);

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'token'
                 ]);
    }
    public function test_usuario_autenticado_puede_crear_empleado()
{
    $user = User::factory()->create();

    Sanctum::actingAs($user);

    $cargo = Cargos::create([
        'nombre_cargo' => 'Administrador'
    ]);

    $response = $this->postJson('/api/empleados', [
        'nombre' => 'Juan',
        'apellido' => 'Perez',
        'fecha_nacimiento' => '2000-01-01',
        'fecha_ingreso' => '2025-01-01',
        'salario' => 2500000,
        'estado' => 'activo',
        'cargo_id' => $cargo->id
    ]);

    $response->assertStatus(201);
}
}
