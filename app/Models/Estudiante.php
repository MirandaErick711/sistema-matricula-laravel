<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'estudiantes';

    protected $fillable = [
        'nombres',
        'apellidos',
        'dni',
        'email',
        'carrera_id',
    ];

    public function getNombreCompletoAttribute(): string
    {
        return "{$this->apellidos}, {$this->nombres}";
    }

    public function carrera(): BelongsTo
    {
        return $this->belongsTo(Carrera::class);
    }

    public function matriculas(): HasMany
    {
        return $this->hasMany(Matricula::class);
    }
}
