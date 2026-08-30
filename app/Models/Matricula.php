<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function estudiante(): BelongsTo
    {
        return $this->belongsTo(Estudiante::class);
    }

    public function semestre(): BelongsTo
    {
        return $this->belongsTo(
            SemestreAcademico::class,
            'semestre_id'
        );
    }

    public function detalles(): HasMany
    {
        return $this->hasMany(DetalleMatricula::class);
    }
}