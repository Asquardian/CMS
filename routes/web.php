<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\RegController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\SessionsController;
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

Route::get('/', function () {
    return view('start');
});

Route::post('/add', [AnimeController::class, 'add'])->name('create-anime')->middleware('admin');
Route::post('/add-studio', [StudiosController::class, 'add'])->name('create-studio')->middleware('admin');
Route::post('/add-genre', [GenreController::class, 'add'])->name('create-genre')->middleware('admin');

Route::get('/autocomplete', [AnimeController::class, 'autocomplete'])->name('autocomplete');


Route::get('/anime', function (Request $req) {
    $studios = DB::table('studios')->select(['id', 'name'])->get();
    return view('main', ['studios' => $studios,'req' => $req, 'genre' => GenreController::selectName()]);
})->name('main');

Route::get('/create/studio', function () {
    return view('create-studio');
})->name('form-studio')->middleware('admin');

Route::get('/create/genre', function () {
    return view('genre');
})->name('form-genre')->middleware('admin');

Route::get('/create/anime', function () {
    $studios = DB::table('studios')->select(['id', 'name'])->get();
    return view('create', ['studios' => $studios, 'genre' => GenreController::selectName()]);
})->name('form-anime')->middleware('admin');

Route::get('/anime/{url?}', function ($url) {
    return View::make('page', ['url' => $url]);
});


Route::get('/register', [RegController::class, 'create'])->middleware('user');
Route::post('/register', [RegController::class, 'store'])->name('user-create')->middleware('user');

Route::get('/login', [SessionsController::class, 'create'])->middleware('user');
Route::post('/login', [SessionsController::class, 'store'])->name('login-succsses')->middleware('user');
Route::get('/logout',  [SessionsController::class, 'destroy'])->name('logout')->middleware('non-user');

