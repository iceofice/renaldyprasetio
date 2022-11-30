<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');;

Route::group([
    'middleware'    => 'auth:web',
    'prefix'        => 'admin',
    'as'            => 'admin.'
], function () {
    Route::get('/', function () {
        return view('admin');
    })->name('home');

    Route::resource('/projects', ProjectController::class );
});