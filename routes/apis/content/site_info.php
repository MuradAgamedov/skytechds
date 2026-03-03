<?php

use App\Http\Controllers\SiteInfoController;
use Illuminate\Support\Facades\Route;

Route::resource("site-infos", SiteInfoController::class);
