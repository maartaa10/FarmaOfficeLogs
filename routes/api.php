<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MetricController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/metrics', [MetricController::class, 'store']);
Route::get('/metrics/{id}', [MetricController::class, 'findById']); 
Route::delete('/metrics/{id}', [MetricController::class, 'destroy']); 
Route::get('/metrics', [MetricController::class, 'findAll']);