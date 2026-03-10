<?php

use App\Http\Controllers\PermissionCotnroller;
use Illuminate\Support\Facades\Route;

Route::resource("permissions", PermissionCotnroller::class);
