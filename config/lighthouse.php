<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Route Configuration
    |--------------------------------------------------------------------------
    */
    'route' => [
        'prefix' => 'graphql',
        'middleware' => [
            \Nuwave\Lighthouse\Support\Http\Middleware\AcceptJson::class,
        ],
    ],
    
    /*
    |--------------------------------------------------------------------------
    | GraphQL Playground Configuration
    |--------------------------------------------------------------------------
    */
    'graphiql' => [
        'enabled' => env('LIGHTHOUSE_GRAPHIQL_ENABLED', true),
        'route' => [
            'prefix' => 'graphql-playground',
            'middleware' => [
                // Désactiver temporairement StartSession pour SQLite
                // \Illuminate\Session\Middleware\StartSession::class,
            ],
        ],
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Schema Configuration
    |--------------------------------------------------------------------------
    */
    'schema' => [
        'register' => base_path('graphql/schema.graphql'),
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Scalar Configuration
    |--------------------------------------------------------------------------
    */
    'scalars' => [
        'DateTime' => \Nuwave\Lighthouse\Schema\Types\Scalars\DateTime::class,
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Cache Configuration
    |--------------------------------------------------------------------------
    */
    'cache' => [
        'enable' => env('LIGHTHOUSE_CACHE_ENABLE', false),
        'max_age' => env('LIGHTHOUSE_CACHE_MAX_AGE', 0),
    ],
];