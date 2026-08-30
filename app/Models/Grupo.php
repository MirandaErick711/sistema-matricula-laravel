<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Grupo extends Model
{
    protected $fillable = [
        'curso_id',
        'semestre_id',
        'docente_id',
        'aula_id',
        'nombre',
    ];

    public function curso(): BelongsTo
    {
        return $this->belongsTo(Curso::class);
    }

    public function semestre(): BelongsTo
    {
        return $this->belongsTo(
            SemestreAcademico::class,
            'semestre_id'
        );
    }

    public function docente(): BelongsTo
    {
        return $this->belongsTo(Docente::class);
    }

    public function aula(): BelongsTo
    {
        return $this->belongsTo(Aula::class);
    }

    public function horarios(): HasMany
    {
        return $this->hasMany(Horario::class);
    }

    public function detallesMatricula(): HasMany
    {
        return $this->hasMany(DetalleMatricula::class);
    }
}