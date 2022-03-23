<?php

use Illuminate\Support\Facades\Auth;
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


Auth::routes();
Route::get('/', [App\Http\Controllers\GeneralController::class, 'index'])->name('general');
Route::get('/areas/ccar1', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/user', [App\Http\Controllers\AuthController::class, 'index'])->name('user');
Route::post('/user', [App\Http\Controllers\AuthController::class, 'store'])->name('userRegister');
Route::delete('/user/{user_id}', [App\Http\Controllers\AuthController::class, 'destroy']);
Route::get('/user/{user_id}', [App\Http\Controllers\AuthController::class, 'show']);
