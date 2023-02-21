<?php

return[

    'loading_duration' => env('LOADING_DURATION'),
    'loading_duration2' => env('LOADING_DURATION2'),
    'urlkey' => env('Key_Prefix'),

    'domains'=>
    [
        env('APP_DOMAIN_1'),
        env('APP_DOMAIN_2', null),
        env('APP_DOMAIN_3', null),
    ],
    'BotRedirectUrl'=>env('BotRedirectUrl'),
];

?>