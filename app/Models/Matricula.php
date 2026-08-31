<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Matricula extends Model
{
    use HasFactory;

    protected $table = 'matriculas';

    protected $fillable = [
        'estudiante_id',
        'semestre',
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

    public function detalles(): HasMany
    {
        return $this->hasMany(DetalleMatricula::class);
    }
}
