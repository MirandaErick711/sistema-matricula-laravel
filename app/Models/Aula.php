<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    protected $fillable = ['nombre', 'capacidad'];

    public function cursos()
    {
        return $this->hasMany(Curso::class);
    }
}
