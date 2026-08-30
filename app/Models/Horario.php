<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $fillable = [
        'grupo_id',
        'dia',
        'hora_inicio',
        'hora_fin',
    ];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }
}