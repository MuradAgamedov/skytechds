<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::post("login", [AuthController::class, 'login'])->name("login");
Route::post("verify-2fa", [AuthController::class, 'verifyTwoFactor'])->name("verify-2fa");
Route::post("logout", [AuthController::class, 'logout'])->name("logout");

