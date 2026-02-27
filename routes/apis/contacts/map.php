<?php

use App\Http\Controllers\MapController;
use Illuminate\Support\Facades\Route;


Route::resource("maps", MapController::class);