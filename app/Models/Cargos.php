<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cargos extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'nombre_cargo',
        'descripcion',
    ];

    public function empleados()
    {
        return $this->hasMany(Empleados::class, 'cargo_id');
    }

    public function funcionesCargos()
    {
        return $this->hasMany(FuncionesCargos::class, 'cargo_id');
    }
    
}
