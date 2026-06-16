<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Cargos;

class Empleados extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'fecha_ingreso',
        'salario',
        'estado',
        'cargo_id',
    ];

    public function cargo()
    {
        return $this->belongsTo(Cargos::class, 'cargo_id');
    }
}
