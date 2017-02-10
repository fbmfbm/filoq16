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

    'accepted'             => 'Le champ :attribute doit être accepté.',
    'active_url'           => 'Le champ :attribute n\'est pas une URL valide.',
    'after'                => 'Le champ :attribute doit être une date après :date.',
    'alpha'                => 'Le champ :attribute ne peu contenir que des lettres',
    'alpha_dash'           => 'Le champ :attribute ne peu contenir que des lettres, des nombre ou des tirets.',
    'alpha_num'            => 'Le champ :attribute ne peu contenir que des lettres et des nombres.',
    'array'                => 'Le champ :attribute doit être un tableau.',
    'before'               => 'Le champ :attribute doit être une date avant :date.',
    'between'              => [
        'numeric' => 'Le champ :attribute doit être constitué de :min à :max. chiffres',
        'file'    => 'Le champ :attribute doit être compris entre :min et :max kilobytes.',
        'string'  => 'Le champ :attribute doit être constitué de :min à :max caractères.',
        'array'   => 'Le champ :attribute doit être constitué de :min à :max items.',
    ],
    'boolean'              => 'Le champ :attribute doit être vrai ou faux.',
    'confirmed'            => 'Le champ :attribute ne correspond pas à la confirmation.',
    'date'                 => 'Le champ :attribute n\'est pas une date valide.',
    'date_format'          => 'Le champ :attribute ne respecte pas le format :format.',
    'different'            => 'Le champ :attribute et :other doivent être differents.',
    'digits'               => 'Le champ :attribute doit être constitué de :digits chiffres.',
    'digits_between'       => 'Le champ :attribute doit être entre :min et :max chiffres.',
    'email'                => 'Le champ :attribute doit être une adresse email valide.',
    'exists'               => 'Le champ sélectionné :attribute n\'est pas valide.',
    'filled'               => 'Le champ :attribute est requis.',
    'image'                => 'Le champ :attribute doit être une image.',
    'in'                   => 'Le champ sélectionné :attribute n\'est pas valide.',
    'integer'              => 'Le champ :attribute doit être un entier.',
    'ip'                   => 'Le champ :attribute doit être une adresse IP valide.',
    'json'                 => 'Le champ :attribute doit être un phrase JSON valide.',
    'max'                  => [
        'numeric' => 'Le champ :attribute ne doit pas être plus grand que :max.',
        'file'    => 'Le champ :attribute ne doit pas être plus grand que :max kilobytes.',
        'string'  => 'Le champ :attribute ne doit pas être plus grand que :max caractères.',
        'array'   => 'Le champ :attribute ne doit pas être plus grand que :max items.',
    ],
    'mimes'                => 'Le champ :attribute doit être un fichier de type : :values.',
    'min'                  => [
        'numeric' => 'Le champ :attribute doit être au moins de :min.',
        'file'    => 'Le champ :attribute doit être au moins de :min kilobytes.',
        'string'  => 'Le champ :attribute doit être au moins de :min caractères.',
        'array'   => 'Le champ :attribute doit être au moins de :min items.',
    ],
    'not_in'               => 'Le champ sélectionné :attribute n\'est pas valide.',
    'numeric'              => 'Le champ :attribute doit être un nombre.',
    'regex'                => 'Le champ :attribute est d\'un format non valide.',
    'required'             => 'Le champ :attribute est requis.',
    'required_if'          => 'Le champ :attribute field est requis quand :other est :value.',
    'required_with'        => 'Le champ :attribute field est requis quand :values est present.',
    'required_with_all'    => 'Le champ :attribute field est requis quand :values est present.',
    'required_without'     => 'Le champ :attribute field est requis quand :values n\'est pas present.',
    'required_without_all' => 'Le champ :attribute field est requis quand auqu\'un :values n\'est present.',
    'same'                 => 'Le champ :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'Le champ :attribute doit être inférieur à :size.',
        'file'    => 'Le fichier ne doit pas dépasser :size kilobytes.',
        'string'  => 'Le champ :attribute doit être composé de :size caractères maximum.',
        'array'   => 'L\' :attribute doit contenir :size objets.',
    ],
    'string'               => 'Le champ :attribute doit être une chaîne de caractères.',
    'timezone'             => 'Le champ :attribute doit être une zone valide.',
    'unique'               => 'Le champ :attribute à dèjà été soumis.',
    'url'                  => 'Le champ :attribute est d\'un format non valide.',

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
