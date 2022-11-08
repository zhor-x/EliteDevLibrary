<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\OrderController;
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
Route::post('/registration', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/books', [BookController::class, 'index']);
Route::get('/search', [BookController::class, 'search']);

Route::middleware('auth:api')->group(function () {
    Route::get('/buy/{book_id}', [OrderController::class, 'buy']);
    Route::get('/rent/{book_id}', [OrderController::class, 'rent']);
    Route::get('/my/orders', [OrderController::class, 'orders']);
});
