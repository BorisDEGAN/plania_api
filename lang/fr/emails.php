<?php

return [
    'footer' => [
        'message' => 'Cet email a été envoyé depuis :app_name, contactez :app_email pour plus d\'informations',
        'copyright' => 'Copyright © ' . date('Y') . ':app_name . Tout droit réservé.',
    ],
    'evaluation' => [
        'message' => ['
        Bonjour :fullname,
        
        Nous vous informons que votre évaluation sur :app_name vient de se terminer avec un score de :score.
        
        Les résultats de votre évaluation seront disponibles dans votre boîte mail dans les prochaines heures.
        
        N\'hésitez pas à nous contacter si vous avez des questions.
        
        Cordialement.']
    ],
    'alert' => [
        'message' => ['        
        Bonjour :fullname,
        
        Nous vous confirmons que votre mot de passe a été modifié avec succès. Si vous n\'êtes pas à l\'origine de cette modification, nous vous conseillons de récupérer votre compte.
        
        Conseils de sécurité :
        - Ne partagez votre mot de passe avec personne.
        - Utilisez un mot de passe unique et complexe pour chaque compte.
        Modifiez votre mot de passe régulièrement.
        Si vous avez des questions ou si vous rencontrez des difficultés, veuillez contacter notre support client.
        
        Cordialement,']
    ],

    'cotation' => [
        'table' => [
            'reference' => 'Référence',
            'name' => 'Nom'
        ]
    ],
    'instance' => [
        'message' => ['
        Bonjour :fullname,
        
        Nous sommes heureux de vous informer que votre instance Dedminierp est prete pour utilisation.
        
        Vos identifiants de connexion sont les suivants :
        
        Identifiant : :id
        Mot de passe : :password
        Clé de licence : :license_key
        Veuillez conserver ces informations précieusement.
        
        Vous pouvez accéder à votre instance en utilisant le lien suivant : :link_instance
        
        Nous vous invitons à consulter la documentation en ligne pour vous familiariser avec les fonctionnalités de votre application: :link_doc
        
        
        Si vous avez des questions ou si vous rencontrez des difficultés, veuillez contacter notre support client.
        
        Cordialement,'
]
    ],

    'new_account' => [
        'message' => ['
        Bonjour :fullname,\n
        
        Nous sommes heureux de vous informer qu\'un compte a été créé pour vous sur notre plateforme :app_name. \n
        
        Voici les informations de connexion à votre compte : \n
        
        Adresse e-mail associée au compte : :email \n
        Pour accéder à votre compte, veuillez suivre les étapes ci-dessous : \n
        
        Accédez à notre site web à l\'adresse suivante : :link_site \n
        Cliquez sur le bouton: :connexion. \n
        Saisissez votre adresse e-mail et votre mot de passe. \n
        Cliquez sur le bouton : :se connecter. \n
        Réinitialisez votre mot de passe \n
        
        Si vous avez oublié votre mot de passe, vous pouvez le réinitialiser en cliquant sur le lien : Mot de passe oublié? \n
        Si vous avez des questions, des préoccupations ou si vous n\'avez pas créé ce compte, veuillez nous contacter immédiatement à l\'adresse suivante : :app_mail \n
        
        Cordialement,'

]
    ],


    'reset_password' => [
        'message' => ['
        Bonjour :fulname,
        
        Vous recevez ce mail parce que vous avez demandé à réintialiser votre mot de passe.
         Veuillez retournez sur la page :link_site et saisir le code suivant :code
        Si vous n\'avez pas effectué cette réinitialisation, veuillez ignorer ce mail.
        
        Voici quelques conseils pour choisir un mot de passe fort :
        
        Utilisez un mot de passe unique et complexe pour chaque compte.
        Le mot de passe doit contenir au moins 8 caractères.
        Il doit comporter des lettres majuscules et minuscules, des chiffres et des symboles.
        N\'utilisez pas d\'informations personnelles dans votre mot de passe.
        Ne partagez jamais votre mot de passe.
        Cordialement,']

    ],

    'tpe_code' => [
        'message' => [
        
        'Bonjour :fullname,
         Voici le code de votre TPE :code

         Veuillez conserver ce code en lieu sûr et ne le partager avec personne.
        ']
    ],

];
                     