<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cargos;

class FuncionesCargos extends Model
{
    //
    protected $fillable = [
        'descripcion_funcion',
        'estado',
        'cargo_id',
    ];

    public function cargo()
    {
        return $this->belongsTo(Cargos::class, 'cargo_id');
    }
}
