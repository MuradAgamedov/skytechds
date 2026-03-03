<?php

use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::resource("testimonials", TestimonialController::class);
