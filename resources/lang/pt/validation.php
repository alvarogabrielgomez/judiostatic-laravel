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

    'accepted'             => ':attribute deve ser aceito.',
    'active_url'           => 'O campo :attribute não é um URL válido.',
    'after'                => 'O campo :attribute deve ser uma data após a :date.',
    'alpha'                => 'O campo :attribute deve conter apenas letras.',
    'alpha_dash'           => 'O campo :attribute deve conter apenas letras números e guiones.',
    'alpha_num'            => 'O campo :attribute deve conter letras e números.',
    'array'                => 'O campo :attribute deve ser um array.',
    'before'               => 'O campo :attribute deve ser uma data anterior a :date.',
    'between'              => [
        'numeric' => 'O campo :attribute deve estar entre :min e :max.',
        'file'    => 'O campo :attribute deve estar entre :min e :max kilobytes.',
        'string'  => 'O campo :attribute deve estar entre :min e :max caracteres.',
        'array'   => 'O campo :attribute deve ter entre :min e :max elementos.',
    ],
    'boolean'              => 'O campo :attribute deve ser verdadero ou falso.',
    'confirmed'            => 'O campo :attribute confirmação não coincide.',
    'date'                 => 'O campo :attribute não é uma data válida.',
    'date_format'          => 'O campo :attribute não corresponde ao formato :format.',
    'different'            => 'O campo :attribute e :other deven ser diferentes.',
    'digits'               => 'O campo :attribute deve ser de :digits dígitos.',
    'digits_between'       => 'O campo :attribute deve estar entre :min e :max dígitos.',
    'distinct'             => 'O campo :attribute tem  um valor duplicado.',
    'email'                => 'O campo :attribute deve ser uma dirección de correo válida.',
    'exists'               => 'O campo :attribute não é válido.',
    'filled'               => 'O campo :attribute é obrigatório.',
    'image'                => 'O campo :attribute deve ser uma imagen.',
    'in'                   => 'O campo :attribute não é válido',
    'in_array'             => 'O campo :attribute não existe en :other.',
    'integer'              => 'O campo :attribute deve ser um entero.',
    'ip'                   => 'O campo :attribute deve ser uma dirección IP válida.',
    'json'                 => 'O campo :attribute deve ser uma cadena JSON válida.',
    'max'                  => [
        'numeric' => 'O campo :attribute não deve ser mayor que :max.',
        'file'    => 'O campo :attribute não deve ser mayor que :max kilobytes.',
        'string'  => 'O campo :attribute não deve ser mayor que :max caracteres.',
        'array'   => 'O campo :attribute não deve conter más de :max elementos.',
    ],
    'mimes'                => 'O campo :attribute deve ser um archivo do tipo: :values.',
    'min'                  => [
        'numeric' => 'O campo :attribute deve ser pelo menos :min.',
        'file'    => 'O campo :attribute deve ser pelo menos :min kilobytes.',
        'string'  => 'O campo :attribute deve ser pelo menos :min caracteres.',
        'array'   => 'O campo :attribute deve ter al menos :min elementos.',
    ],
    'not_in'               => 'O campo selected :attribute não é válido.',
    'numeric'              => 'O campo :attribute deve ser um número.',
    'present'              => 'O campo :attribute deve estar presente.',
    'regex'                => 'O formato do campo :attribute não é válido.',
    'required'             => 'O campo :attribute é obrigatório.',
    'required_if'          => 'O campo :attribute é obrigatório quando :other é :value.',
    'required_unless'      => 'O campo :attribute é obrigatório a menos que :other esté en :values.',
    'required_with'        => 'O campo :attribute é obrigatório quando :values está presente.',
    'required_with_all'    => 'O campo :attribute é obrigatório quando :values está presente.',
    'required_without'     => 'O campo :attribute é obrigatório quando :values não está presente.',
    'required_without_all' => 'O campo :attribute é obrigatório quando ninguno de :values está presente.',
    'same'                 => 'Os campos :attribute e :other deven coincidir.',
    'size'                 => [
        'numeric' => 'O campo :attribute deve ser de :size.',
        'file'    => 'O campo :attribute deve ser de :size kilobytes.',
        'string'  => 'O campo :attribute deve ser de :size caracteres.',
        'array'   => 'O campo :attribute deve contenter :size elementos.',
    ],
    'string'               => 'O campo :attribute deve ser uma cadena de texto.',
    'timezone'             => 'O campo :attribute deve ser uma zona válida.',
    'unique'               => 'O campo :attribute deve ser único.',
    'url'                  => 'O campo :attribute tem um formato não válido.',

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