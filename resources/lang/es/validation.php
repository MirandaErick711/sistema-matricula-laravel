<?php

return [

    'required' => 'El campo :attribute es obligatorio.',
    'string' => 'El campo :attribute debe ser una cadena de texto.',

    'max' => [
        'string' => 'El campo :attribute no puede tener más de :max caracteres.',
        'integer' => 'El campo :attribute no puede ser mayor que :max.',
    ],

    'min' => [
        'integer' => 'El campo :attribute debe ser como mínimo :min.',
    ],

    'integer' => 'El campo :attribute debe ser un número entero.',

    'unique' => 'El :attribute ya está registrado.',

    'exists' => 'El :attribute seleccionado no es válido.',

    'attributes' => [
        'codigo' => 'código del curso',
        'nombre' => 'nombre de la asignatura',
        'creditos' => 'créditos académicos',
        'docente_id' => 'docente responsable',
    ],

];