<?php

use App\Http\Controllers\AlarmaController;
use App\Http\Controllers\ApirestController;
use App\Http\Controllers\NotificationsController;
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

Route::get('user/lst', [App\Http\Controllers\AuthController::class, 'indexAPI']);


//obtener el utlimo registro de cada area
Route::get('status/area/lst/{id}', [ApirestController::class, 'getAreaStatus']);

//Obtener losultimos 15 de area
Route::get('energy/data/hst/{id}', [ApirestController::class, 'gethst']);
//Obtener el ultimo registro
Route::get('energy/data/lst/{area_id}', [ApirestController::class, 'getLst']);
Route::get('notif/{notif_id}', [ApirestController::class, 'getNofitEmails']);
//Envíar notificaciónes por correo
Route::get('/notifications/{alertId}/{type}', [NotificationsController::class, 'sendAlert']);

Route::get('/alarmas/lst', [AlarmaController::class, 'getViewAlarma']);

// Route::get('/data',function(){
//     //return "getData";
// });

// Route::post('/data',[DataController::class,'store']);