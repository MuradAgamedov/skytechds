<?php

use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;


Route::resource("languages", LanguageController::class);