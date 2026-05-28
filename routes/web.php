<?php

use Illuminate\Support\Facades\Route;
use Nuwave\Lighthouse\Http\GraphQLController;

// Route pour GraphQL
Route::post('graphql', [GraphQLController::class, '__invoke'])
    ->middleware('web')
    ->name('graphql');

// Route pour GraphQL Playground (interface de test)
Route::get('graphql-playground', function () {
    return view('lighthouse::graphql-playground');
})->middleware('web')->name('graphql-playground');