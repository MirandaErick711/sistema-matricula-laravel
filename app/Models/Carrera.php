<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $fillable = [
        'nombre',
    ];

    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class);
    }

    public function cursos()
    {
        return $this->belongsToMany(
            Curso::class,
            'carrera_curso',
            'carrera_id',
            'curso_id'
        );
    }
}