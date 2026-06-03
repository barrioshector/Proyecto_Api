<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    //
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
