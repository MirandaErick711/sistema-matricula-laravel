<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $fillable = [
        'estudiante_id',
        'semestre_id',
        'fecha_matricula',
        'estado',
    ];

    protected $casts = [
        'fecha_matricula' => 'date',
    ];

    public function estudiante()
    {
        return $this->belongsTo(
            Estudiante::class
        );
    }

    public function semestre()
    {
        return $this->belongsTo(
            SemestreAcademico::class,
            'semestre_id'
        );
    }

    public function detalles()
    {
        return $this->hasMany(
            DetalleMatricula::class
        );
    }
}