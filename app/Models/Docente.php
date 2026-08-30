<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Docente extends Model
{
    protected $fillable = [
        'nombres',
        'apellidos',
    ];

    public function grupos(): HasMany
    {
        return $this->hasMany(Grupo::class);
    }
}