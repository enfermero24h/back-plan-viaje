<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\CiudadController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\PresupuestoController;

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

// routes/api.php

Route::get('paises', [PaisController::class, 'index']);
Route::get('paises/{id}', [PaisController::class, 'show']);
Route::get('paises/{paisId}/ciudades', [PaisController::class, 'showPaisCiudades']);
Route::post('paises', [PaisController::class, 'store']);
Route::put('paises/{id}', [PaisController::class, 'update']);
Route::delete('paises/{id}', [PaisController::class, 'destroy']);

Route::get('paises/{paisId}/ciudades', [CiudadController::class, 'index']);
Route::get('ciudades/all', [CiudadController::class, 'indexAll']);
Route::get('ciudades/{id}', [CiudadController::class, 'show']);
Route::post('ciudades', [CiudadController::class, 'store']);
Route::put('ciudades/{id}', [CiudadController::class, 'update']);
Route::delete('ciudades/{id}', [CiudadController::class, 'destroy']);

Route::get('ciudades/{ciudadId}/historial', [HistorialController::class, 'index']);
Route::get('historial/all', [HistorialController::class, 'indexAll']);
Route::get('historial/{id}', [HistorialController::class, 'show']);
Route::post('historial', [HistorialController::class, 'store']);
Route::put('historial/{id}', [HistorialController::class, 'update']);
Route::delete('historial/{id}', [HistorialController::class, 'destroy']);

Route::get('historial/{historialId}/presupuestos', [PresupuestoController::class, 'index']);
Route::get('presupuestos/{id}', [PresupuestoController::class, 'show']);
Route::post('presupuestos', [PresupuestoController::class, 'store']);
Route::put('presupuestos/{id}', [PresupuestoController::class, 'update']);
Route::delete('presupuestos/{id}', [PresupuestoController::class, 'destroy']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
