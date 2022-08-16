<?php

use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('movies')->group(function () {
  Route::get('/search',[HomeController::class,'multiSearch'])->name('movies.search');
  Route::get('/popular',[HomeController::class,'popular'])->name('movies.popular');
  Route::get('/{movie}',[HomeController::class,'getMovieDetails'])->name('movies.getMovieDetails');
});

require __DIR__.'/auth.php';
