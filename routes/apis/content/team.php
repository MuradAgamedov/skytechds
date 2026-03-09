<?php

use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::resource("teams", TeamController::class);
