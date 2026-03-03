<?php

use App\Http\Controllers\StatisticController;
use Illuminate\Support\Facades\Route;

Route::resource("statistics", StatisticController::class);
