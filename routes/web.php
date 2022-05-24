<?php

use App\Http\Controllers\NotificationsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
Route::get('/areas/{area_id}', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/notifications', [App\Http\Controllers\NotificationsController::class, 'index'])->name('emails');
Route::get('/user', [App\Http\Controllers\AuthController::class, 'index'])->name('user');
Route::post('/user', [App\Http\Controllers\AuthController::class, 'store'])->name('userRegister');
Route::put('/user/{user}', [App\Http\Controllers\AuthController::class, 'update']);

Route::post('/notifemails', [App\Http\Controllers\NotificationsController::class, 'update'])->name('emailsRegister');
Route::delete('/user/{user_id}', [App\Http\Controllers\AuthController::class, 'destroy']);
Route::get('/user/{user_id}', [App\Http\Controllers\AuthController::class, 'show']);

//Aeropuertos
Route::get('/aero', [App\Http\Controllers\AeropuertoController::class, 'index'])->name('aeropuertoIndex');
Route::post('/aero', [App\Http\Controllers\AeropuertoController::class, 'store'])->name('aeroRegister');
Route::delete('/aero/{aero_id}', [App\Http\Controllers\AeropuertoController::class, 'destroy']);
Route::put('/aero/{aero_id}', [App\Http\Controllers\AeropuertoController::class, 'update'])->name('aeroEdit');
Route::get('/aero/{aero_id}', [App\Http\Controllers\AeropuertoController::class, 'show']);

//Areas
Route::get('/gestareas/{aero_id}', [App\Http\Controllers\AreasController::class, 'index'])->name('areasIndex');
Route::post('/gestareas', [App\Http\Controllers\AreasController::class, 'store'])->name('areaRegister');
Route::get('/area/{area_id}', [App\Http\Controllers\AreasController::class, 'show']);
Route::delete('/area/{area_id}', [App\Http\Controllers\AreasController::class, 'destroy']);
Route::put('/area/{area_id}', [App\Http\Controllers\AreasController::class, 'update']);


// Reportes
Route::get('/report/energy', [App\Http\Controllers\reportsController::class, 'getEnergyReportView'])->name('getEnergyReportView');
Route::post('/report/energy/f', [App\Http\Controllers\reportsController::class, 'filterEnergyData'])->name('filterData');
Route::get('/report/energy/f', [App\Http\Controllers\reportsController::class, 'filterEnergyData']);

//Diesel
Route::get('/report/diesel', [App\Http\Controllers\reportsController::class, 'getDieselReportView'])->name('getDieselReportView');
Route::get('/report/diesel/c', function () {
    // return DB::select("CALL GetDieselReport('2022-04-04 19:00:00','2022-04-04 22:42:50',1)");
    return DB::table('energy_records')->leftJoin('areas', 'energy_records.area_id', '=', 'areas.id')->select('energy_records.id', 'energy_records.volDiesel', 'energy_records.regtime as fecha', 'energy_records.volDiesel')->whereBetween('regtime', ['2022-04-04 19:00:00','2022-04-04 22:42:50'])->where('area_id', 1)->get();
});
Route::post('/report/diesel/f', [App\Http\Controllers\reportsController::class, 'filterDieselData'])->name('filterDieselData');
Route::get('/report/diesel/f', [App\Http\Controllers\reportsController::class, 'filterDieselData']);

//ExportDAta
Route::post('/report/energy/download', [App\Http\Controllers\reportsController::class, 'exportDocument'])->name('exportDocument');
// Route::get('/report/energy/download', [App\Http\Controllers\reportsController::class, 'exportDocument'])->name('exportDocument');
