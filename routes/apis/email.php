<?php

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;


Route::resource("emails", EmailController::class);