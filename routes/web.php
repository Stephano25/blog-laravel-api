<?php

use Illuminate\Support\Facades\Route;
use Nuwave\Lighthouse\Http\GraphQLController;

// Route pour GraphQL API
Route::post('/graphql', [GraphQLController::class, '__invoke'])
    ->name('graphql');

// Route pour GraphQL Playground (vue personnalisée)
Route::get('/graphql-playground', function () {
    return view('graphql.playground');
})->name('graphql-playground');

// Route alternative
Route::get('/playground', function () {
    return view('graphql.playground');
})->name('playground');