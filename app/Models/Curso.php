<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = [
        'nombre',
        'creditos',
        'docente_id',
        'aula_id',
    ];

    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }

    public function prerrequisitos()
    {
        return $this->belongsToMany(
            Curso::class,
            'prerrequisitos',
            'curso_id',
            'prerrequisito_id'
        );
    }

    public function esPrerrequisitoDe()
    {
        return $this->belongsToMany(
            Curso::class,
            'prerrequisitos',
            'prerrequisito_id',
            'curso_id'
        );
    }
}