<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $fillable = [
        'curso_id',
        'semestre_id',
        'docente_id',
        'aula_id',
        'nombre',
        'tipo',
        'capacidad',
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function semestre()
    {
        return $this->belongsTo(
            SemestreAcademico::class,
            'semestre_id'
        );
    }

    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }

    public function detallesMatricula()
    {
        return $this->hasMany(
            DetalleMatricula::class
        );
    }
}