<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $fillable = ['nombres', 'apellidos'];

    public function cursos()
    {
        return $this->hasMany(Curso::class);
    }
}