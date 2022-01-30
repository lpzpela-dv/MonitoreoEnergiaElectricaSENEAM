<?php

use App\Http\Controllers\AreasController;
use App\Http\Controllers\DataController;
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

Route::apiResource('areas',AreasController::class);
Route::apiResource('data',DataController::class);
// Route::get('/data',function(){
//     //return "getData";
// });

// Route::post('/data',[DataController::class,'store']);