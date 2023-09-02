<?php

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

Route::post('/create', [\App\Http\Controllers\ParcelController::class, 'store'])
    ->name('create');
Route::patch('/update', [\App\Http\Controllers\ParcelController::class, 'update'])
    ->name('updatestatus');
Route::patch('/getbytracking', [\App\Http\Controllers\ParcelController::class, 'getbytracking'])
    ->name('getbytracking');


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
