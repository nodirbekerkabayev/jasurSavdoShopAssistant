<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\DebtController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('debts', DebtController::class);
});
