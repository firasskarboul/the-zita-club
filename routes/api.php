<?php

use App\Models\Reservation;
use App\Http\Controllers\ReservationsApiController;
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

Route::get('/reservations', [ReservationsApiController::class, 'index']);

Route::post('/reservations', [ReservationsApiController::class, 'store']);

Route::put('/reservations/{reservation}', [ReservationsApiController::class, 'update']);

Route::delete('/reservations/{reservation}', [ReservationsApiController::class, 'destroy']);