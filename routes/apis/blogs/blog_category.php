<?php

use App\Http\Controllers\BlogCategoryController;
use Illuminate\Support\Facades\Route;

Route::resource("blog-categories", BlogCategoryController::class);
