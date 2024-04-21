<?php

return [
    'articles' => [
        'new_article' => [
            'message' => "L'article : :name a été crée",
        ],
    ],

    'new_devi' => [
        'message' => "L'utilisateur : :fullname a créé le devi :reference"
    ],

    'datachange'=> [
        'subject' => ':app_name' .':entée' . 'action' . 'dans' . ':model_name',
        'greeting' => 'Bonjour,',
        'body1' => "nous vous informons que l'inscription a été effectuée " . ':action' .'dans' . ':model_name',
        'body2' => 'Veuillez vous connecter pour en savoir plus.',
        'body3' => 'Merci', 
        'body4'=> ':app_name'. 'Equipe'

        
        ], 

    'default_notif' => [
        'message1'=> 'Introduction de la notification.',
        'action' => 'Mesures de notification, :link',
        'message2' => "Merci d'avoir utilisé notre application !"
    ] 
];
