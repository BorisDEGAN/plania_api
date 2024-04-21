<?php

return [
    'articles' => [
        'new_article' => [
            'message' => "The article : :name has been created",
        ],
    ],

    'new_devi' => [
        'message' => " The user : :fullname has created devi :reference"
    ],
    'datachange'=>[
        'subject' => ':app_name' .':entry' . 'action' . 'in' . ':model_name',
        'greeting' => 'Hi,',
        'body1' => "we would like to inform you that entry has been  " . ':action' .'in' . ':model_name',
        'body2' => 'Please log in to see more information.',
        'body3' => 'Thank you',
        'body4'=> ':app_name'. 'Team'

    ],

    'default_notif' => [
        'message1' => 'The introduction to the notification.',
        'action' => 'Notification action, :link',
        'massage2' => 'Thank you for using our application!'
    ],


];
