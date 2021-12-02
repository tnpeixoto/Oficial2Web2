<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AtivoController;
use App\Http\Controllers\AuthController;

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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */




Route::post('/login', [AuthController::class, 'login']);


Route::group(['middleware' => ['jwt.verify']], function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/ativo', [AtivoController::class, 'index']);
    Route::post('/ativo', [AtivoController::class, 'store']);
    Route::get('/ativo/{id}', [AtivoController::class, 'show']);
    Route::put('/ativo/{id}', [AtivoController::class, 'update']);
    Route::delete('ativo/{id}', [AtivoController::class, 'destroy']);
});
