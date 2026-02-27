<?php

use App\Http\Controllers\DictionaryController;
use Illuminate\Support\Facades\Route;

Route::resource("dictionaries", DictionaryController::class);
