<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'Cursos';

    protected $fillable = [
        'codigo',
        'nombre',
        'horas_teoria',
        'horas_practica',
        'docente',
        'aula',
        'creditos',
    ];
}
