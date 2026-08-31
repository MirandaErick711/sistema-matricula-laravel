<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetalleMatricula extends Model
{
    use HasFactory;

    protected $table = 'detalle_matricula';

    protected $fillable = [
        'matricula_id',
        'horario_id',
        'nota',
    ];

    protected $casts = [
        'nota' => 'decimal:2',
    ];

    public function matricula(): BelongsTo
    {
        return $this->belongsTo(Matricula::class);
    }

    public function horario(): BelongsTo
    {
        return $this->belongsTo(Horario::class);
    }
}
