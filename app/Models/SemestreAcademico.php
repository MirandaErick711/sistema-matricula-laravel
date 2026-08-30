<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SemestreAcademico extends Model
{
    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'fecha_fin',
    ];

    public function matriculas(): HasMany
    {
        return $this->hasMany(Matricula::class, 'semestre_id');
    }

    public function grupos(): HasMany
    {
        return $this->hasMany(Grupo::class, 'semestre_id');
    }
}