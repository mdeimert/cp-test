<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\v1\StarshipController;

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

Route::namespace('API\v1')->prefix('v1')->name('api.v1.')->group(function() {
    Route::get('/starships/play', [StarshipController::class, 'play']);
    Route::get('/starships', [StarshipController::class, 'all']);
    Route::post('/starships', [StarshipController::class, 'create']);
    Route::get('/starships/{starship}', [StarshipController::class, 'get']);
    Route::put('/starships/{starship}', [StarshipController::class, 'update']);
    Route::delete('/starships/{starship}', [StarshipController::class, 'delete']);
});