<?php

use App\Repositories\TagRepository;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TagController;

Route::resource("tags", TagController::class);
