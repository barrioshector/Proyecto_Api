<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Cargos;

class FuncionesCargos extends Model
{
    //
    use HasFactory;

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
