<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    protected $fillable = [
        'nombre',
        'capacidad',
    ];

    public function grupos()
    {
        return $this->hasMany(Grupo::class);
    }
}
