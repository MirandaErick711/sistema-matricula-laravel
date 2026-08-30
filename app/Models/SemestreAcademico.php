<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SemestreAcademico extends Model
{
    protected $table = 'semestres_academicos';

    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'fecha_fin',
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
    ];

    public function grupos()
    {
        return $this->hasMany(Grupo::class, 'semestre_id');
    }

    public function matriculas()
    {
        return $this->hasMany(Matricula::class, 'semestre_id');
    }
}