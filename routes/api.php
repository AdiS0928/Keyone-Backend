<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;

Route::middleware('api')->group(function () {
    Route::post('/leads', [LeadController::class, 'store']);
    Route::get('/leads', [LeadController::class, 'index']);
    Route::get('/leads/{id}', [LeadController::class, 'show']);
    Route::put('/leads/{id}', [LeadController::class, 'update']);
    Route::delete('/leads/{id}', [LeadController::class, 'destroy']);
});
