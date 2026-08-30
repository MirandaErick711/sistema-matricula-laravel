<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Carrera extends Model
{
    protected $fillable = [
        'nombre',
    ];

    public function estudiantes(): HasMany
    {
        return $this->hasMany(Estudiante::class);
    }

    public function cursos(): BelongsToMany
    {
        return $this->belongsToMany(
            Curso::class,
            'carrera_curso'
        );
    }
}