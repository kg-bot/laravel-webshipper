<?php

return [
    'username' => env( 'WEBSHIPPER_USERNAME' ),
    'email' => env('WEBSHIPPER_EMAIL'),
    'password' => env('WEBSHIPPER_PASSWORD'),
    'token' => env( 'WEBSHIPPER_TOKEN' ),
    'user_agent' => env('WEBSHIPPER_USER_AGENT', 'Rackbeat integration lra@rackbeat.com'),
];