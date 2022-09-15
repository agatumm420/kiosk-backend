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

    'accepted'             => ':attribute musi zostać zaakceptowany.',
    'active_url'           => ':attribute jest nieprawidłowym adresem URL.',
    'after'                => ':attribute musi być datą późniejszą od :date.',
    'after_or_equal'       => 'The :attribute must be a date after or equal to :date.',
    'alpha'                => ':attribute może zawierać jedynie litery.',
    'alpha_dash'           => ':attribute może zawierać jedynie litery, cyfry i myślniki.',
    'alpha_num'            => ':attribute może zawierać jedynie litery i cyfry.',
    'array'                => ':attribute musi być tablicą.',
    'before'               => ':attribute musi być datą wcześniejszą od :date.',
    'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => ':attribute musi zawierać się w granicach :min - :max.',
        'file'    => ':attribute musi zawierać się w granicach :min - :max kilobajtów.',
        'string'  => ':attribute musi zawierać się w granicach :min - :max znaków.',
        'array'   => ':attribute musi składać się z :min - :max elementów.',
    ],
    'boolean'              => ':attribute musi mieć wartość prawda albo fałsz',
    'confirmed'            => 'Potwierdzenie :attribute nie zgadza się.',
    'date'                 => ':attribute nie jest prawidłową datą.',
    'date_format'          => ':attribute nie jest w formacie :format.',
    'different'            => ':attribute oraz :other muszą się różnić.',
    'digits'               => ':attribute musi składać się z :digits cyfr.',
    'digits_between'       => ':attribute musi mieć od :min do :max cyfr.',
    'dimensions'           => ':attribute ma niepoprawne wymiary.',
    'distinct'             => ':attribute ma zduplikowane wartości.',
    'email'                => 'Format :attribute jest nieprawidłowy.',
    'exists'               => 'Zaznaczony :attribute jest nieprawidłowy.',
    'file' => ':attribute musi być plikiem.',
    'filled' => 'Pole :attribute musi mieć wartość.',
    'gt' => [
        'numeric' => ':attribute musi być większy niż: wartość.',
        'file' => ':attribute musi być większy niż: wartość kilobajtów.',
        'string' => ':attribute musi być większy niż: wartość znaków.',
        'array' => ':attribute musi mieć więcej niż: wartości pozycji.',
    ],
    'gte' => [
        'numeric' => ':attribute musi być większy lub równy: value.',
        'file' => ':attribute musi być większy lub równy: wartość kilobajtów.',
        'string' => ':attribute musi być większy lub równy: wartość znaków.',
        'array' => ':attribute musi mieć: wartość elementów lub więcej.',
    ],
    'image' => ':attribute musi być obrazem.',
    'in' => 'Wybrany atrybut jest nieprawidłowy.',
    'in_array' => 'Pole: :attribute nie istnieje w :other.',
    'integer' => ':attribute musi być liczbą całkowitą.',
    'ip' => ':attribute musi być prawidłowym adresem IP.',
    'ipv4' => ':attribute musi być prawidłowym adresem IPv4.',
    'ipv6' => ':attribute musi być prawidłowym adresem IPv6.',
    'json' => ':attribute musi być prawidłowym ciągiem JSON.',
    'lt' => [
        'numeric' => ':attribute: musi być mniejszy niż: value.',
        'file' => ':attribute musi być mniejszy niż: wartość kilobajtów.',
        'string' => ':attribute musi być mniejszy niż: wartość znaków.',
        'array' => ':attribute musi mieć mniej niż: wartości pozycji.',
    ],
    'lte' => [
        'numeric' => ':attribute musi być mniejszy lub równy :value.',
        'file' => ':attribute musi być mniejszy lub równy :value kilobajtów.',
        'string' => ':attribute musi być mniejszy lub równy :value znaków.',
        'tablica' => ':attribute nie może mieć więcej niż :value elementów.',
    ],
    'max' => [
        'numeric' => ':attribute nie może być większy niż :max.',
        'file' => ':attribute nie może być większy niż :max kilobajtów.',
        'string' => ':attribute nie może być większy niż :max znaków.',
        'array' => ':attribute nie może mieć więcej niż :max.',
    ],
    'mimes' => ':attribute musi być plikiem typu: :values.',
    'mimetypes' => ':attribute musi być plikiem typu: :values.',
    'min' => [
        'numeric' => ':attribute musi mieć co najmniej :min.',
        'file' => ':attribute musi mieć co najmniej :min kilobajtów.',
        'string' => ':attribute musi mieć co najmniej :min. znaków.',
        'array' => ':attribute musi mieć co najmniej :min. elementów.',
    ],
    'not_in' => 'Wybrany atrybut jest nieprawidłowy.',
    'not_regex' => 'Format :attribute jest nieprawidłowy.',
    'numeric' => ':attribute musi być liczbą.',
    'present' => 'Pole: :attribute musi być obecne.',
    'regex' => 'Format :attribute jest nieprawidłowy.',
    'required' => 'Wymagane pole: :attribute.',
    'required_if' => 'Pole: :attribute jest wymagane, gdy: other is: value.',
    'required_unless' => 'Pole: :attribute jest wymagane, chyba że: other is in: values.',
    'required_with' => 'Pole: :attribute jest wymagane, gdy: wartości są obecne.',
    'required_with_all '=>' Pole: :attribute jest wymagane, gdy: wartości są obecne. ',
    'required_without' => 'Pole: :attribute jest wymagane, gdy: nie ma wartości.',
    'required_without_all' => 'Pole: :attribute jest wymagane, gdy nie ma żadnej z wartości.',
    'same' => ':attribute i: inny musi pasować.',
    'size' => [
        'numeric' => ':attribute musi być: size.',
        'file' => ':attribute musi być: size kilobajtów.',
        'string' => ':attribute musi być: size characters.',
        'array' => ':attribute musi zawierać: elementy wielkości.',
    ],
    'string' => ':attribute musi być ciągiem',
    'timezone' => ':attribute musi być prawidłową strefą.',
    'unique' => ':attribute został już zajęty.',
    'uploaded' => ':attribute nie został przesłany.',
    'url' => 'Format :attribute jest nieprawidłowy.',

    'base64image' => ':attribute nie może być większy niż :base64image MB.',
    'header_image' => ':attribute musi być większe niż :imageWidthx:imageHeight px.',
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
        'g-recaptcha-response' => [
            'recaptcha' => 'Udowodnij że nie jesteś robotem',
        ],
        'email' => [
            'required' => 'Podaj swój e-mail',
            'confirmed' => 'Pole e-mail muszą być identyczne',
        ],
        'last_name' => [
            'unique' => 'Podane imię i nazwisko już istnieje',
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

    'attributes' => [
		'name' => 'Tytuł',
	],

];
