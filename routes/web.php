<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;

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

Route::get('/admin/upload', function () {
    return view('admin/upload');
});

Route::get('/admin/recipe-list', function () {
    return view('admin/recipe-list');
});

// Route::group(['middleware' => ['auth']], function() {
//     Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
// });

require __DIR__.'/auth.php';
