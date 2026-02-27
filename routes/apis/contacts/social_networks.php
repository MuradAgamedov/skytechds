<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialNetworksController;


Route::resource("social-networks", SocialNetworksController::class);

