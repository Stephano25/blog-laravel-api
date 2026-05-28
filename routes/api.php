<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use GraphQL\GraphQL;

// Route pour GraphQL Playground (interface web)
Route::get('/graphql-playground', function () {
    return view('graphql-playground');
});

// Route pour l'API GraphQL
Route::post('/graphql', function (Request $request) {
    return app()->make(\Nuwave\Lighthouse\GraphQL::class)->executeRequest($request);
});

// Alternative: Utiliser le controller Lighthouse
Route::post('/graphql', [\Nuwave\Lighthouse\Http\GraphQLController::class, '__invoke']);