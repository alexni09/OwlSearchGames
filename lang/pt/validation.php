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

    'accepted' => ':attribute precisa ser aceito.',
    'accepted_if' => ':attribute precisa ser aceito quando :other é :value.',
    'active_url' => ':attribute não é uma URL válida.',
    'after' => ':attribute deve ser uma data posterior a :date.',
    'after_or_equal' => ':attribute deve ser uma data igual ou posterior a :date.',
    'alpha' => ':attribute deve conter apenas letras.',
    'alpha_dash' => ':attribute deve conter apenas letras, números, hífens e sublinhados.',
    'alpha_num' => ':attribute deve conter apenas letras e números.',
    'array' => ':attribute deve ser um array.',
    'ascii' => ':attribute deve conter apenas caracteres e símbolos alfanuméricos de um único byte.',
    'before' => ':attribute deve ser uma data anterior a :date.',
    'before_or_equal' => ':attribute deve ser uma data anterior ou igual a :date.',
    'between' => [
        'array' => ':attribute deve ter entre :min e :max itens.',
        'file' => ':attribute deve ter entre :min e :max kilobytes.',
        'numeric' => ':attribute deve estar entre :min e :max.',
        'string' => ':attribute deve possuir entre :min e :max caracteres.',
    ],
    'boolean' => 'O campo :attribute deve ser verdadeiro ou falso.',
    'confirmed' => 'A confirmação de :attribute não confere.',
    'current_password' => 'A senha está incorreta.',
    'date' => ':attribute não é uma data válida.',
    'date_equals' => ':attribute deve ser uma data igual a :date.',
    'date_format' => ':attribute não confere com o formato :format.',
    'decimal' => ':attribute deve possuir :decimal casas decimais.',
    'declined' => ':attribute deve ser recusado.',
    'declined_if' => ':attribute deve ser recusado quando :other possui :value.',
    'different' => ':attribute e :other devem ser diferentes.',
    'digits' => ':attribute precisa possuir :digits dígitos.',
    'digits_between' => ':attribute deve possuir quantidade de dígitos entre :min e :max.',
    'dimensions' => ':attribute possui dimensões de imagem inválidas.',
    'distinct' => 'O campo :attribute possui valor duplicado.',
    'doesnt_end_with' => ':attribute não pode terminar com algum dos seguintes valores: :values.',
    'doesnt_start_with' => ':attribute não pode começar com algum dos seguintes valores: :values.',
    'email' => ':attribute deve ser um endereço de email válido.',
    'ends_with' => ':attribute deve terminar com algum dos seguintes valores: :values.',
    'enum' => 'O campo :attribute está inválido.',
    'exists' => 'O campo :attribute está inválido.',
    'file' => ':attribute deve ser um arquivo.',
    'filled' => 'O campo :attribute deve possuir algum valor.',
    'gt' => [
        'array' => ':attribute deve possuir mais de :value itens.',
        'file' => ':attribute deve possuir mais de :value kilobytes.',
        'numeric' => ':attribute deve ser maior do que :value.',
        'string' => ':attribute deve possuir mais de :value caracteres.',
    ],
    'gte' => [
        'array' => ':attribute deve possuir :value itens ou mais.',
        'file' => ':attribute deve possuir :value kilobytes ou mais.',
        'numeric' => ':attribute deve ser maior ou igual a :value.',
        'string' => ':attribute deve possuir :value caracteres ou mais.',
    ],
    'image' => ':attribute deve ser uma imagem.',
    'in' => 'O campo :attribute está inválido.',
    'in_array' => 'O campo :attribute não existe em :other.',
    'integer' => ':attribute deve ser um número inteiro.',
    'ip' => ':attribute deve ser um endereço IP válido.',
    'ipv4' => ':attribute deve ser um endereço IPv4 válido.',
    'ipv6' => ':attribute deve ser um endereço IPv6 válido.',
    'json' => ':attribute deve ser uma cadeia de caracteres JSON válida.',
    'lowercase' => ':attribute precisa estar em caixa baixa.',
    'lt' => [
        'array' => ':attribute deve possuir menos de :value itens.',
        'file' => ':attribute deve possuir menos de :value kilobytes.',
        'numeric' => ':attribute deve ser menor do que :value.',
        'string' => ':attribute deve possuir menos de :value caracteres.',
    ],
    'lte' => [
        'array' => ':attribute deve possuir :value itens ou menos.',
        'file' => ':attribute deve possuir :value kilobytes ou menos.',
        'numeric' => ':attribute deve ser menor ou igual a :value.',
        'string' => ':attribute deve possuir :value caracteres ou menos.',
    ],
    'mac_address' => ':attribute deve ser um endereço MAC válido.',
    'max' => [
        'array' => ':attribute não pode possuir mais de :max itens.',
        'file' => ':attribute não pode possuir mais de :max kilobytes.',
        'numeric' => ':attribute não pode ser maior do que :max.',
        'string' => ':attribute não pode possuir mais de :max caracteres.',
    ],
    'max_digits' => ':attribute não pode possuir mais de :max dígitos.',
    'mimes' => ':attribute precisa ser um arquivo do tipo: :values.',
    'mimetypes' => ':attribute precisa ser um arquivo do tipo: :values.',
    'min' => [
        'array' => ':attribute precisa possuir :min itens ou mais.',
        'file' => ':attribute precisa possuir :min kilobytes ou mais.',
        'numeric' => ':attribute precisa ser :min ou maior.',
        'string' => ':attribute precisa possuir :min caracteres ou mais.',
    ],
    'min_digits' => ':attribute precisa possuir :min dígitos ou mais.',
    'missing' => 'O campo :attribute necessita estar ausente.',
    'missing_if' => 'O campo :attribute necessita estar ausente se :other é :value.',
    'missing_unless' => 'O campo :attribute necessita estar ausente a menos que :other seja :value.',
    'missing_with' => 'O campo :attribute necessita estar ausente quando :values está presente.',
    'missing_with_all' => 'O campo :attribute necessita estar ausente quando :values estão presentes.',
    'multiple_of' => ':attribute precisa ser múltiplo de :value.',
    'not_in' => 'O campo :attribute está inválido.',
    'not_regex' => 'O formato do campo :attribute está inválido.',
    'numeric' => ':attribute deve ser um número.',
    'password' => [
        'letters' => ':attribute deve conter pelo menos uma letra.',
        'mixed' => ':attribute deve conter pelo menos uma letra em caixa alta e outra letra em caixa baixa.',
        'numbers' => ':attribute deve conter pelo menos um número.',
        'symbols' => ':attribute deve conter pelo menos um símbolo.',
        'uncompromised' => 'O campo :attribute fornecido apareceu em um vazamento de informação. Por favor escolha um :attribute diferente.',
    ],
    'present' => 'O campo :attribute deve estar presente.',
    'prohibited' => 'O campo :attribute está proibido.',
    'prohibited_if' => 'O campo :attribute está proibido se :other é :value.',
    'prohibited_unless' => ':attribute está proibido a menos que :other esteja em :values.',
    'prohibits' => 'O campo :attribute proíbe :other de estar presente.',
    'regex' => 'O formato do campo :attribute está inválido.',
    'required' => 'O campo :attribute é obrigatório.',
    'required_array_keys' => 'O campo :attribute precisa conter entradas para valores: :values.',
    'required_if' => 'O campo :attribute é obrigatório quando :other é :value.',
    'required_if_accepted' => ':attribute é obrigatório quando :other está aceito.',
    'required_unless' => 'O campo :attribute é obrigatório a menos que :other esteja em: values.',
    'required_with' => ':attribute é obrigatório quando :values está presente.',
    'required_with_all' => ':attribute é obrigatório quando :values estão presentes.',
    'required_without' => ':attribute é obrigatório quando :values não está presente.',
    'required_without_all' => ':attribute é obrigatório quando nenhum de :values estão presentes.',
    'same' => ':attribute e :other devem corresponder.',
    'size' => [
        'array' => ':attribute deve conter :size itens.',
        'file' => ':attribute deve possuir :size kilobytes.',
        'numeric' => ':attribute deve ser do tamanho :size.',
        'string' => ':attribute deve possuir :size caracteres.',
    ],
    'starts_with' => ':attribute deve iniciar com algum dos seguintes valores: :values.',
    'string' => ':attribute deve ser uma cadeia de caracteres.',
    'timezone' => ':attribute deve ser um fuso horário válido.',
    'unique' => ':attribute deve ser único e já foi utilizado.',
    'uploaded' => 'Falhou o upload de :attribute.',
    'uppercase' => ':attribute precisa estar em caixa alta.',
    'url' => ':attribute deve ser um URL válido.',
    'ulid' => ':attribute deve ser um ULID válido.',
    'uuid' => ':attribute deve ser um UUID válido.',

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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'category_id' => 'categoria',
        'content' => 'conteúdo',
        'country_id' => 'país',
        'current_password' => 'palavra-passe atual',
        'lang' => 'linguagem',
        'locale_id' => 'linguagem',
        'new_password' => 'nova palavra-passe',
        'new_password_confirmation' => 'confirmar palavra-passe',
        'password' => 'palavra-passe',
        'password_confirmation' => 'confirmar palavra-passe',
        'pronoun_id' => 'pronome',
        'title' => 'título',
        'user_id' => 'ID de usuário'
    ],

];