<?php

return [
    'footer' => [
        'message' => 'This email has been sent from :app_name, contact :app_email for more information',
        'copyright' => 'Copyright © ' . date('Y') . ':app_name . All rights reserved.',
    ],
    'evaluation' => [
        'message' => ['
        Hello :fullname,
        
        Please be informed that your evaluation on :app_name has just ended with a score of :score.
        
        The results of your evaluation will be available in your mailbox in the next few hours.
        
        Please do not hesitate to contact us if you have any questions.
        
        Sincerely,',]
    ],
    'alert' => [
        'message' => ['        
        Hello :fullname,
        
        We confirm that your password has been successfully changed. If you are not the source of the change, we advise you to recover your account.
        
        
        Security tips :
        - Never share your password with anyone.
        - Use a unique and complex password for each account.
        Change your password regularly.
        If you have any questions or encounter any difficulties, please contact our customer support.
        
        Sincerely,']
    ],

    'cotation' => [
        'table' => [
            'reference'=> 'Reference',
            'name'=> 'Name'
        ]
    ],

'instance' => [
    'message' => [ '
    Hello :fullname,
    
    We are pleased to inform you that your Dedminierp instance is ready for use.
    
    Your login details are as follows:
    
    Username: :id
    Password: :password
    License key: :license_key
    Please keep this information safe.
    
    You can access your instance using the following link: :link_instance
    
    
    
    We invite you to consult the online documentation to familiarize yourself with the features of your application: :link_doc
    
    
    If you have any questions or encounter any difficulties, please contact our customer support.
    
    Sincerely'
    ]
    ],

'new_account' => [
    'message' => ['
    Hello :fullname,\n
    
    We are pleased to inform you that an account has been created for you on our platform :app_name. \n
    
    Here are your login details: \n
    
    Email address associated with the account : :email \n
    To access your account, please follow the steps below: \n
    
    Go to our website at the following address: :link_site \n
    Click on the button: ":connection" \n
    Enter your e-mail address and password. \n
    Click on the button: :login. \n
    Reset your password
    
    If you\'ve forgotten your password, you can reset it by clicking on the :Forgot your password? link on the login page. \n
    
    If you have any questions, concerns or if you have not created this account, please contact us immediately at :app_mail \n
    
    Sincerely,']
        ],
    'reset_password' => [
        'message' => ['
        Hello :fulname,
        
        You are receiving this email because you have requested to reset your password.
         Please return to the :link_site page and enter the following code :code
        If you have not reset your password, please ignore this email.
        
        Here are some tips for choosing a strong password:
        
        Use a unique, complex password for each account.
        The password must contain at least 8 characters.
        It should include upper- and lower-case letters, numbers and symbols.
        Do not include any personal information in your password.
        Never share your password.
        Sincerely,']
        ],

    'tpe_code' => [
        'message' => [
        
        'Hello :fullname,
         Here is your TPE code :code

         Please keep this information safe.
        ']
    ],
];