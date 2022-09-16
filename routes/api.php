<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ApiRegisterController;
use App\Http\Controllers\AspirasiController;
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

Route::post('/user/login',[ApiRegisterController::class, 'LoginUser']);
Route::post('/user/register',[ApiRegisterController::class, 'RegisterUser']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/user/create',[AspirasiController::class, 'ApiStore']);
    Route::patch('/edit/{id}',[AspirasiController::class, 'ApiEdit']);  
    Route::put('/update/{id}',[AspirasiController::class, 'ApiUpdate']);  
    Route::delete('/delete/{aspirasi}',[AspirasiController::class, 'ApiDestroy']);
    Route::get('/user/collection/{aspirasi}',[AspirasiController::class, 'ApiShow']);
    Route::post('/komentar',[AspirasiController::class, 'ApiKomentar']);
    Route::post('/user/logout',[ApiRegisterController::class, 'LogoutUser']);

});