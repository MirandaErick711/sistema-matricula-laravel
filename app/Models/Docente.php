<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $fillable = [
        'nombres',
        'apellidos',
    ];

    public function grupos()
    {
        return $this->hasMany(Grupo::class);
    }
}