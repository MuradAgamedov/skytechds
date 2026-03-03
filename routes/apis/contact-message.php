<?php

use App\Http\Controllers\ContactMessageController;
use Illuminate\Support\Facades\Route;


Route::patch(
    "/contact-messages/{contactMessage}/read",
    [ContactMessageController::class, "toggleRead"]
);

Route::resource("contact-messages", ContactMessageController::class);