<?php

return [
    // Le routeur GraphQL
    'route' => [
        'prefix' => 'graphql',
        'middleware' => [
            \Nuwave\Lighthouse\Support\Http\Middleware\AcceptJson::class,
        ],
    ],
    
    // Le routeur GraphQL Playground
    'graphiql' => [
        'enabled' => env('LIGHTHOUSE_GRAPHIQL_ENABLED', true),
        'route' => [
            'prefix' => 'graphql-playground',
            'middleware' => [
                \Illuminate\Session\Middleware\StartSession::class,
            ],
        ],
    ],
    
    // Le schéma GraphQL
    'schema' => [
        'register' => base_path('graphql/schema.graphql'),
    ],
];