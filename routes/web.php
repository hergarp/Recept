<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AlapanyagController;
use App\Http\Controllers\Alapanyag_mertekegysegController;
use App\Http\Controllers\AllergenController;
use App\Http\Controllers\ReceptController;

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
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/recipe', function () {
    return view('recipe');
});

Route::get('/upload', function () {
    return view('upload');
});

Route::get('/results', function () {
    return view('results');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/admin/upload', [ReceptController::class, 'create']);
Route::post('/admin/upload', [ReceptController::class, 'store']);


Route::get('/admin/recipe-list', function () {
    return view('admin/recipe-list');
});

Route::get('/admin/materials', [AlapanyagController::class, 'index']);
Route::get('/admin/matunits', [Alapanyag_mertekegysegController::class, 'index']);
Route::post('/admin/add-materials', [AlapanyagController::class, 'store']);
Route::post('/admin/add-matunits', [Alapanyag_mertekegysegController::class, 'store']);
Route::post('/admin/add-allergen', [AllergenController::class, 'store']);

Route::get('/upload', [ReceptController::class, 'create']);

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy']);



require __DIR__.'/auth.php';
