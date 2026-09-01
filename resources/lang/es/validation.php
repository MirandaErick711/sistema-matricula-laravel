<?php

return [

    'required' => 'El campo :attribute es obligatorio.',

    'string' => 'El campo :attribute debe ser una cadena de texto.',

    'integer' => 'El campo :attribute debe ser un número entero.',

    'numeric' => 'El campo :attribute debe ser un número.',

    'email' => 'El campo :attribute debe ser una dirección de correo válida.',

    'url' => 'El campo :attribute debe ser una URL válida.',

    'date' => 'El campo :attribute debe ser una fecha válida.',

    'date_format' => 'El campo :attribute no corresponde al formato :format.',

    'boolean' => 'El campo :attribute debe ser verdadero o falso.',

    'array' => 'El campo :attribute debe ser una lista.',

    'min' => [
        'numeric' => 'El campo :attribute debe ser como mínimo :min.',
        'file' => 'El archivo :attribute debe pesar al menos :min kilobytes.',
        'string' => 'El campo :attribute debe tener al menos :min caracteres.',
        'array' => 'El campo :attribute debe tener al menos :min elementos.',
    ],

    'max' => [
        'numeric' => 'El campo :attribute no puede ser mayor que :max.',
        'file' => 'El archivo :attribute no puede pesar más de :max kilobytes.',
        'string' => 'El campo :attribute no puede tener más de :max caracteres.',
        'array' => 'El campo :attribute no puede tener más de :max elementos.',
    ],

    'size' => [
        'numeric' => 'El campo :attribute debe ser exactamente :size.',
        'file' => 'El archivo :attribute debe pesar exactamente :size kilobytes.',
        'string' => 'El campo :attribute debe tener exactamente :size caracteres.',
        'array' => 'El campo :attribute debe contener exactamente :size elementos.',
    ],

    'between' => [
        'numeric' => 'El campo :attribute debe estar entre :min y :max.',
        'file' => 'El archivo :attribute debe pesar entre :min y :max kilobytes.',
        'string' => 'El campo :attribute debe tener entre :min y :max caracteres.',
        'array' => 'El campo :attribute debe tener entre :min y :max elementos.',
    ],

    'in' => 'El valor seleccionado en :attribute no es válido.',

    'not_in' => 'El valor seleccionado en :attribute no es válido.',

    'same' => 'El campo :attribute debe coincidir con :other.',

    'different' => 'El campo :attribute debe ser diferente de :other.',

    'confirmed' => 'La confirmación de :attribute no coincide.',

    'unique' => 'El valor de :attribute ya está registrado.',

    'exists' => 'El valor seleccionado en :attribute no es válido.',

    'regex' => 'El formato del campo :attribute no es válido.',

    'alpha' => 'El campo :attribute solo puede contener letras.',

    'alpha_num' => 'El campo :attribute solo puede contener letras y números.',

    'alpha_dash' => 'El campo :attribute solo puede contener letras, números, guiones y guiones bajos.',

    'digits' => 'El campo :attribute debe tener exactamente :digits dígitos.',

    'digits_between' => 'El campo :attribute debe tener entre :min y :max dígitos.',

    'required_if' => 'El campo :attribute es obligatorio cuando :other es :value.',

    'required_unless' => 'El campo :attribute es obligatorio a menos que :other sea :value.',

    'required_with' => 'El campo :attribute es obligatorio cuando se proporciona :values.',

    'required_without' => 'El campo :attribute es obligatorio cuando no se proporciona :values.',

    'nullable' => 'El campo :attribute puede estar vacío.',

    'before' => 'El campo :attribute debe ser una fecha anterior a :date.',

    'after' => 'El campo :attribute debe ser una fecha posterior a :date.',

    'before_or_equal' => 'El campo :attribute debe ser una fecha anterior o igual a :date.',

    'after_or_equal' => 'El campo :attribute debe ser una fecha posterior o igual a :date.',

    'mimes' => 'El campo :attribute debe ser un archivo de tipo: :values.',

    'image' => 'El campo :attribute debe ser una imagen.',

    'file' => 'El campo :attribute debe ser un archivo.',

    'json' => 'El campo :attribute debe contener un JSON válido.',

    'ip' => 'El campo :attribute debe contener una dirección IP válida.',

    'ipv4' => 'El campo :attribute debe contener una dirección IPv4 válida.',

    'ipv6' => 'El campo :attribute debe contener una dirección IPv6 válida.',

    'not_regex' => 'El formato del campo :attribute no es válido.',

    'required_array_keys' => 'El campo :attribute debe contener las claves: :values.',

    'prohibited' => 'El campo :attribute no está permitido.',

    'prohibited_if' => 'El campo :attribute no está permitido cuando :other es :value.',

    'prohibited_unless' => 'El campo :attribute no está permitido a menos que :other sea :value.',

    'present' => 'El campo :attribute debe estar presente.',

    'timezone' => 'El campo :attribute debe contener una zona horaria válida.',

    'uuid' => 'El campo :attribute debe ser un UUID válido.',

    'password' => 'La contraseña no es correcta.',

    'current_password' => 'La contraseña actual no es correcta.',

    'required_if_accepted' => 'El campo :attribute es obligatorio cuando :other es aceptado.',

    'accepted' => 'El campo :attribute debe ser aceptado.',

    'declined' => 'El campo :attribute debe ser rechazado.',

    'lowercase' => 'El campo :attribute debe estar en minúsculas.',

    'uppercase' => 'El campo :attribute debe estar en mayúsculas.',

    'ascii' => 'El campo :attribute solo puede contener caracteres ASCII.',

    'hex_color' => 'El campo :attribute debe contener un color hexadecimal válido.',

    'decimal' => 'El campo :attribute debe tener :decimal decimales.',

    'multiple_of' => 'El campo :attribute debe ser múltiplo de :value.',

    'doesnt_start_with' => 'El campo :attribute no puede comenzar con: :values.',

    'doesnt_end_with' => 'El campo :attribute no puede terminar con: :values.',

    'starts_with' => 'El campo :attribute debe comenzar con: :values.',

    'ends_with' => 'El campo :attribute debe terminar con: :values.',

    'contains' => 'El campo :attribute debe contener: :value.',

    'doesnt_contain' => 'El campo :attribute no debe contener: :value.',

    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de los campos :values está presente.',

    'required_with_all' => 'El campo :attribute es obligatorio cuando todos los campos :values están presentes.',

    'same' => 'El campo :attribute debe coincidir con :other.',

    'different' => 'El campo :attribute debe ser diferente de :other.',

    'gt' => [
        'numeric' => 'El campo :attribute debe ser mayor que :value.',
        'string' => 'El campo :attribute debe tener más de :value caracteres.',
        'array' => 'El campo :attribute debe tener más de :value elementos.',
        'file' => 'El archivo :attribute debe ser mayor que :value kilobytes.',
    ],

    'gte' => [
        'numeric' => 'El campo :attribute debe ser mayor o igual que :value.',
        'string' => 'El campo :attribute debe tener al menos :value caracteres.',
        'array' => 'El campo :attribute debe tener al menos :value elementos.',
        'file' => 'El archivo :attribute debe pesar al menos :value kilobytes.',
    ],

    'lt' => [
        'numeric' => 'El campo :attribute debe ser menor que :value.',
        'string' => 'El campo :attribute debe tener menos de :value caracteres.',
        'array' => 'El campo :attribute debe tener menos de :value elementos.',
        'file' => 'El archivo :attribute debe pesar menos de :value kilobytes.',
    ],

    'lte' => [
        'numeric' => 'El campo :attribute debe ser menor o igual que :value.',
        'string' => 'El campo :attribute debe tener como máximo :value caracteres.',
        'array' => 'El campo :attribute debe tener como máximo :value elementos.',
        'file' => 'El archivo :attribute no puede pesar más de :value kilobytes.',
    ],

    'attributes' => [

        'nombre' => 'nombre',
        'apellido' => 'apellido',
        'dni' => 'DNI',
        'email' => 'correo electrónico',
        'telefono' => 'teléfono',
        'direccion' => 'dirección',

        'codigo' => 'código',
        'creditos' => 'créditos',
        'descripcion' => 'descripción',

        'aula_id' => 'aula',
        'docente_id' => 'docente',
        'curso_id' => 'curso',
        'carrera_id' => 'carrera',
        'semestre_id' => 'semestre académico',
        'grupo_id' => 'grupo',
        'estudiante_id' => 'estudiante',

        'hora_inicio' => 'hora de inicio',
        'hora_fin' => 'hora de fin',
        'dia' => 'día',

    ],

];