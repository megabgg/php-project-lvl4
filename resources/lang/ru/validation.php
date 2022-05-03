<?php

return [
    "confirmed" => "Пароль и подтверждение не совпадают",

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using Поле
    | convention "attribute.rule" to name Поле lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'password' => [
            'min' => [
                "string" => "Пароль должен иметь длину не менее :min символов",
            ],
        ],
    ],
];
