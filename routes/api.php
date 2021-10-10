<?php

use App\Models\Reservation;
use App\Http\Controllers\ReservationsApiController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => ['auth:sanctum']], function () {
// HERE WE PUT ROUTES THAT CAN BE USED ONLY IF AUTHENTICATED

    // PROTECTED USERS

    Route::post('/logout', [AuthController::class, 'logout']);

    // PROTECTED RESERVATIONS

    Route::get('/reservations', [ReservationsApiController::class, 'index']);
    Route::get('/reservations/{reservationCode}', [ReservationsApiController::class, 'show']);
    Route::put('/reservations/{reservation}', [ReservationsApiController::class, 'update']);
    Route::delete('/reservations/{reservation}', [ReservationsApiController::class, 'destroy']);

    // PROTECTED ORDERS

    Route::get('/orders', [OrderController::class, 'index']);
    Route::post('/orders', [OrderController::class, 'store']);
    Route::get('/orders/{orderCode}', [OrderController::class, 'show']);
    Route::put('/orders/{order}', [OrderController::class, 'update']);
    Route::delete('/orders/{order}', [OrderController::class, 'destroy']);

});

// PUBLIC RESERVATIONS

Route::post('/reservations', [ReservationsApiController::class, 'store']);

// PUBLIC USERS

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);