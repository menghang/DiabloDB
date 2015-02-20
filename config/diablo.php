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

    'battlenet' => [

        /* Region: Valid Options: eu, us, kr, tw */
        'region' => 'eu',

        /* Locale:
         *  Valid Options
         *      Region EU: en_GB, de_DE, es_ES, fr_FR, it_IT, pl_PL, pt_PT, ru_RU */
        'locale' => 'en_GB',

        /* If you don't have an API key register for one here: https://dev.battle.net/ */
        'api_key' => 'INSERT_KEY_HERE',
    ]
];