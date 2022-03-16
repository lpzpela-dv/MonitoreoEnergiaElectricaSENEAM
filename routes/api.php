<?php

use App\Http\Controllers\RecordEnery0001;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('energy/data/r0001', RecordEnery0001::class);
Route::get('energy/data/hst/{id}', [RecordEnery0001::class, 'gethst']);
Route::get('energy/data/lst/r0001', [RecordEnery0001::class, 'getlast']);
Route::get('user/lst', [App\Http\Controllers\AuthController::class, 'indexAPI']);

// Route::get('/data',function(){
//     //return "getData";
// });

// Route::post('/data',[DataController::class,'store']);