<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AlapanyagController;
use App\Http\Controllers\Alapanyag_mertekegysegController;
use App\Http\Controllers\AllergenController;
use App\Http\Controllers\ReceptController;
use App\Http\Controllers\ReceptkonyvController;
use App\Http\Controllers\AlkotjaController;
use App\Http\Controllers\LepesController;

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

Route::get('/index', [ReceptController::class, 'index']);
Route::get('/', [ReceptController::class, 'index']);

Route::get('/login', function () {
    return view('login');
});

Route::get('/admin/recipe-list', function () {
    return view('admin.recipe-list');
});

Route::get('/recipe/{url_slug}', [ReceptController::class, 'show']);
Route::get('/results', [ReceptController::class, 'search']);
Route::get('/profile', [ReceptkonyvController::class, 'show']);
Route::get('/upload', [ReceptController::class, 'create']);
Route::post('/upload', [ReceptController::class, 'store']);
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy']);

Route::get('/admin/materials', [AlapanyagController::class, 'index']);
Route::post('/admin/add-materials', [AlapanyagController::class, 'store']);
Route::post('/admin/add-matunits', [Alapanyag_mertekegysegController::class, 'store']);
Route::post('/admin/add-allergen', [AllergenController::class, 'store']);
Route::get('/admin/draft-recipe-list', [ReceptController::class, 'draftList']);
Route::get('/admin/edit/{id}', [ReceptController::class, 'edit']);
Route::post('/admin/edit/{id}', [ReceptController::class, 'update']);

Route::get('/api/matunits', [Alapanyag_mertekegysegController::class, 'index']);
Route::get('/api/materials', [AlapanyagController::class, 'show']);
Route::get('/api/recipe-list', [ReceptController::class, 'recipeList']);
Route::delete('/api/draft/{id}', [ReceptController::class, 'draft']);
Route::delete('/api/edit/{id}', [ReceptController::class, 'destroy']);

//segéd:
Route::get('/api/seged', [ReceptController::class, 'seged']);

require __DIR__.'/auth.php';
