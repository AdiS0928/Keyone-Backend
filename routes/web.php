<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;

Route::get('/leads', [LeadController::class, 'index']);
Route::post('/leads', [LeadController::class, 'store']);
Route::get('/leads/{id}', [LeadController::class, 'show']);
Route::put('/leads/{id}', [LeadController::class, 'update']);
Route::delete('/leads/{id}', [LeadController::class, 'destroy']);
