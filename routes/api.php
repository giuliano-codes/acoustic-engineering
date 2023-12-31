<?php

use App\Http\Controllers\MeasurerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->post('/monitoring', function (Request $request) {
    return '';
});

Route::middleware('auth:sanctum')->post('/measurer', [MeasurerController::class, 'store']);
Route::middleware('auth:sanctum')->post('/measurer/{measurer}', [MeasurerController::class, 'addData']);
Route::middleware('auth:sanctum')->delete('/measurer/{measurer}', [MeasurerController::class, 'delete']);