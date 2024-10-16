<?php

use App\Http\Controllers\ApiArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//aggiungere API articoli

/*
Route::apiResource('articles', ArticleController::class)->only([
    'index', 'show'
])->middleware('auth:sanctum');
*/

Route::apiResource('/articles',ApiArticleController::class,['index','store','destroy']);
