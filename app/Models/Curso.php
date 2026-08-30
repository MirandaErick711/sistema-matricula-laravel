<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Curso extends Model
{
    protected $fillable = [
        'nombre',
        'creditos',
    ];

    public function carreras()
    {
        return $this->belongsToMany(
            Carrera::class,
            'carrera_curso',
            'curso_id',
            'carrera_id'
        );
    }

    public function grupos()
    {
        return $this->hasMany(Grupo::class);
    }

    public function prerrequisitos(): BelongsToMany
    {
        return $this->belongsToMany(
            Curso::class,
            'prerrequisitos',
            'curso_id',
            'prerrequisito_id'
        );
    }

    public function esPrerrequisitoDe(): BelongsToMany
    {
        return $this->belongsToMany(
            Curso::class,
            'prerrequisitos',
            'prerrequisito_id',
            'curso_id'
        );
    }
}