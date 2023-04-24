<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimeController;
use App\Http\Models\Anime;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/add', [AnimeController::class, 'add'])->name('create-anime');

Route::get('/anime', function () {
    return view('main');
});

Route::get('/anime/{name?}', function ($name) {
    return View::make('page', ['url' => $name]);
});

Route::get('/create/anime', function () {
    return view('create');
});

