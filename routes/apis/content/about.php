<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;

Route::resource("about", AboutController::class);
