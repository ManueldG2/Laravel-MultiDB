<?php

use App\Jobs\CallApi;
use App\Models\Values;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schedule;
use App\Http\Controllers\NorrisController;
use App\Http\Controllers\ArticleController;
use Illuminate\Contracts\Foundation\Application;

//Schedule::job(new CallApi() )->everyThirtyMinutes();


//welcome
Route::get('/', function(){
    return view('welcome');
})->name('home') ;

//articoli senza autenticazione
Route::get('/article/chart', [ArticleController::class,'showChart'])->name('article.chart');

//autenticazione
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('article', ArticleController::class);
});

Route::resource('article', ArticleController::class)->except([
    'create', 'store', 'update', 'destroy'
]);

//dati esterni Chuck Norris
Route::get('/ext/norris', [NorrisController::class,'read'])->name('norris');



