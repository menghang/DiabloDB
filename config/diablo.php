<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Sitename
    |--------------------------------------------------------------------------
    |
    | Set the sites name
    |
    */
    'sitename' => 'Diablo 3 Database',
    
    /*
    |--------------------------------------------------------------------------
    | Registration Enabled
    |--------------------------------------------------------------------------
    |
    | Set this to false if you do not currently wish to allow new users to register.
    | You will still be able to register them by hand if you are an administrator.
    |
    */
    'registration_enabled' => true,

    /*
    |--------------------------------------------------------------------------
    | Clan
    |--------------------------------------------------------------------------
    |
    | If you would like to allow the app to retrieve all clan members for a given
    | clan name enter it here.
    */
    'clan' => '',
    
    'battlenet' => [

        'region' => 'eu', // valid options: EU, US
        'api_key' => '',
    ]
];