<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleMatricula extends Model
{
    protected $table = 'detalle_matricula';

    protected $fillable = [
        'matricula_id',
        'grupo_id',
    ];

    public function matricula()
    {
        return $this->belongsTo(
            Matricula::class
        );
    }

    public function grupo()
    {
        return $this->belongsTo(
            Grupo::class
        );
    }
}