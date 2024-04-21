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

  'accepted' => ":attribute doit être accepté.",
  'accepted_if' => ':attribute doit être accepté lorsque :other est :value.',
  'active_url' => ":attribute n'est pas une URL valide.",
  'after' => ':attribute doit être une date postérieure à :date.',
  'after_or_equal' => ':attribute doit être une date postérieure ou égale à :date.',
  'alpha' => ':attribute ne doit contenir que des lettres.',
  'alpha_dash' => ':attribute ne doit contenir que des lettres, des chiffres, des tirets et des traits de soulignement.',
  'alpha_num' => ':attribute ne doit contenir que des lettres et des chiffres.',
  'array' => ':attribute doit être un tableau.',
  'before' => ':attribute doit être une date antérieure à :date.',
  'before_or_equal' => ':attribute doit être une date antérieure ou égale à :date.',
  'between' => [
    'array' => ':attribute doit contenir entre :min et :max items.',
    'file' => ':attribute doit être comprise entre :min et :max kilobytes.',
    'numeric' => ':attribute doit être comprise entre :min et :max.',
    'string' => 'The :attribute doit être comprise entre :min et :max caractères.',
  ],
  'boolean' => ':attribute le champ doit être vrai ou faux.',
  'confirmed' => ':attribute  confirmation ne correspond pas.',
  'current_password' => 'Le mot de passe est incorrect.',
  'date' => ":attribute n'est pas une date valide.",
  'date_equals' => ':attribute doit être à :date.',
  'date_format' => ':attributene correspond pas au format :format.',
  'declined' => ':attribute doit être est refusée.',
  'declined_if' => ':attribute doit être refusée lorsque :other est :value.',
  'different' => ':attribute et :other doivent être différents.',
  'digits' => ':attribute doit être :digits digits.',
  'digits_between' => ':attribute doit être comprise entre :min et :max digits.',
  'dimensions' => ":attribute a des dimensions d'image non valides.",
  'distinct' => ':attribute le champ a une valeur en double.',
  'email' => ':attribute doit être une adresse email valide.',
  'ends_with' => ":attribute doit se terminer par l'un des éléments suivants : :values.",
  'enum' => "L'option :attribute sélectionnée  est invalide.",
  'exists' => "L'option :attribute sélectionnée  est invalide.",
  'file' => ':attribute doit être un fichier.',
  'filled' => ':attribute doit avoir une valeur.',
  'gt' => [
    'array' => ':attribute doit avoir plus de :value.',
    'file' => ':attribute doit être supérieure à :value kilobytes.',
    'numeric' => ':attribute doit être supérieure à :value.',
    'string' => ':attribute doit être supérieure à :value characters.',
  ],
  'gte' => [
    'array' => ':attribute doit avoir des éléments :value ou plus.',
    'file' => ':attribute doit être supérieur ou égal à :value kilobytes.',
    'numeric' => 'The :attribute doit être supérieur ou égal à :value.',
    'string' => 'The :attribute doit être supérieur ou égal à :value caractère.',
  ],
  'image' => ':attribute doit être une image.',
  'in' => "L'option :attribute sélectionnée  est invalide.",
  'in_array' => ":attribute n'existe pas dans :other.",
  'integer' => ':attribute doit être un entier.',
  'ip' => ':attribute doit être un adresse IP.',
  'ipv4' => ':attribute  doit être un adresse IPv4.',
  'ipv6' => ':attribute  doit être un adresse IPv6.',
  'json' => ':attribute  doit être un JSON .',
  'lt' => [
    'array' => ':attribute doit être inférieur à :value.',
    'file' => ':attribute doit être inférieure à :value kilobytes.',
    'numeric' => ':attribute doit être inférieure à :value.',
    'string' => ':attribute doit être inférieure à :value characters.',
  ],
  'lte' => [
    'array' => ':attribute ne doit pas comporter plus de :value.',
    'file' => ':attribute doit être inférieure  ou égal à :value kilobytes.',
    'numeric' => ':attribute doit être inférieure  ou égal à:value.',
    'string' => ':attribute doit être inférieure  ou égal à:value caractère.',
  ],
  'mac_address' => ':attribute doit être une adresse MAC .',
  'max' => [
    'array' => ':attribute ne doit pas comporter plus de :max.',
    'file' => ':attributene doit pas être supérieure à :max kilobytes.',
    'numeric' => 'The :attributene doit pas être supérieure à :max.',
    'string' => 'The :attributene doit pas être supérieure à :max cqrqctère.',
  ],
  'mimes' => ':attribute doit être un fichier du type ::values.',
  'mimetypes' => 'The :attribute doit être un fichier du type ::values.',
  'min' => [
    'array' => ':attribute doivent avoir au moins :min *.',
    'file' => ':attribute doivent avoir au moins :min kilobytes.',
    'numeric' => ':attribute doivent avoir au moins :min.',
    'string' => ':attribute doivent avoir au moins :min caractère.',
  ],
  'multiple_of' => ':attribute doit être un multiple de :value.',
  'not_in' => "L'option :attribute est invalide.",
  'not_regex' => ":attribute n'est pas valable.",
  'numeric' => 'The :attribute must be a number.',
  'password' => 'The password is incorrect.',
  'present' => 'The :attribute field must be present.',
  'prohibited' => 'The :attribute field is prohibited.',
  'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
  'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
  'prohibits' => 'The :attribute field prohibits :other from being present.',
  'regex' => ":attribute n'est pas valable.",
  'required' => 'Le champ :attribute est requis.',
  'required_array_keys' => ':attribute Le champ doit contenir des entrées pour: :values.',
  'required_if' => 'Le champ :attribute est obligatoire lorsque :other est :value.',
  'required_unless' => 'Le champ :attribute est obligatoire sauf si  :other est dans :values.',
  'required_with' => 'Le champ :attribute est obligatoire lorsque  :values est présent.',
  'required_with_all' => 'Le champ :attribute est obligatoire lorsque :values ​​sont présentes.',
  'required_without' => 'Le champ :attribute est obligatoire lorsque :values is not present.',
  'required_without_all' => 'Le champ :attribute est obligatoire lorsque none of :values ​​sont présentes.',
  'same' => ':attribute et :other doivent correspondre.',
  'size' => [
    'array' => ':attribute doit contenir :size items.',
    'file' => ':attribute doit être :size kilobytes.',
    'numeric' => ':attribute doit être :size.',
    'string' => ':attribute doit être :size caractère.',
  ],
  'starts_with' => ":attribute doit commencer par l'un des éléments suivants: :values.",
  'string' => ':attribute doit être une chaine de caractère.',
  'timezone' => ':attribute doit être un fuseau horaire valide.',
  'unique' => ':attribute a déjà été pris.',
  'uploaded' => ':attribute échec du téléchargement.',
  'url' => ':attribute doit être une URL valide.',
  'uuid' => ':attribute doit être un UUID valide.',

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

  'attributes' => [],

];
