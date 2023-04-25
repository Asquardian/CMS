<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\StudiosController;
use Illuminate\Support\Facades\DB;

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
Route::post('/add-studio', [StudiosController::class, 'add'])->name('create-studio');


Route::get('/anime', function (Request $req) {
    if($req->exists("ord")){
        return view('main', ['by' => $req->input('by'), 'ord' => $req->input('ord')]);
    }
    return view('main', ['by' => 'anime.date', 'ord' => 'DESC']);
});

Route::get('/create/studio', function () {
    return view('create-studio');
});

Route::get('/anime/{name?}', function ($name) {
    return View::make('page', ['url' => $name]);
});

Route::get('/create/anime', function () {
    $studios = DB::table('studios')->select(['id', 'name'])->get();
    return view('create', ['studios' => $studios]);
});

