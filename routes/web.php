<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\TvShowController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/movies', [App\Http\Controllers\MoviesController::class, 'index'])->name('browse');
Route::get('/movies/{id}', [App\Http\Controllers\MoviesController::class, 'show'])->name('movies.show');
Route::post('/movies/{movie}/comments', [App\Http\Controllers\MoviesController::class,'store'])->name('comments.store');

Route::get('/tv', [App\Http\Controllers\TvShowController::class, 'index'])->name('browsetv');
Route::get('/tv/{id}', [App\Http\Controllers\TvShowController::class, 'show'])->name('tvshows.show');


Route::get('/search', [App\Http\Controllers\SearchController::class,'search'])->name('search');