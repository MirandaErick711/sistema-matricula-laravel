<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $fillable = [
        'nombres',
        'apellidos',
        'dni',
        'carrera_id',
    ];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }

    public function matriculas()
    {
        return $this->hasMany(Matricula::class);
    }
}