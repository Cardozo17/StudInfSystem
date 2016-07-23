<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
        'document_id' => [
            'required' => 'El campo Cédula es obligatorio!',
            'regex'=>'El campo Cédula debe tener un formato válido',
            'unique'=>'Ya existe un alumno con esta Cédula registrado en el sistema',
        ],
        'name' => [
            'required' => 'El campo Nombre es obligatorio!',
            'min'=>'El campo Nombre debe tener una longitud mínima de 3 carácteres',
            'max'=>'El campo Nombre debe tener una longitud máxima de 45 carácteres'
        ],
        'last_name' => [
            'required' => 'El campo Apellido es obligatorio!',
            'min'=>'El campo Apellido debe tener una longitud mínima de 3 carácteres',
            'max'=>'El campo Apellido debe tener una longitud máxima de 45 carácteres'
        ],
        'height' => [
            'numeric' => 'El campo Altura debe  ser un número!',
        ],
         'weight' => [
            'numeric' => 'El campo Peso debe ser un número!',
        ],
         'born_date' => [
            'required'=>  'El campo Fecha de Nacimiento es obligatorio!',
            'date_format' => 'El campo Fecha de Nacimiento no concuerda con el formato AAAA-MM-DD!',
        ],
         'born_place' => [
            'required'=>  'El campo Lugar de Nacimiento es obligatorio!',
        ],
         'home_address' => [
            'required'=>  'El campo Dirección es obligatorio!',
        ],
        'repLegDocId' => [
            'required' => 'El campo Cédula del Rep. Legal es obligatorio!',
            'regex'=>'El campo Cédula del Rep. Legal debe tener un formato válido',
        ],
        'repLegName' => [
            'required' => 'El campo Nombre del Rep. Legal es obligatorio!',
        ],
         'repLegLastName' => [
            'required' => 'El campo Apellido del Rep. Legal es obligatorio!',
        ],
        'repLegEmail' => [
            'email' => 'El campo Correo Electrónico debe tener un formato válido!',
        ],
        'type' => [
            'required' => 'El campo Tipo es obligatorio!',
        ],
        'password' => [
            'required' => 'El campo Contraseña es obligatorio!',
            'confirmed'=> 'La confirmación de contraseña no coincide'
        ],
         'selectedRelationshipWithStudent' => [
            'required' => 'El campo Relación del Rep. Legal con el Alumno es obligatorio!',
        ],


    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
