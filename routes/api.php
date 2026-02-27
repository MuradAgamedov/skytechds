<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group(['prefix' => "admin", "as" => "admin."], function() {
    include 'apis/auth.php';

    Route::group(['middleware' => "auth:sanctum"],function() {
        include 'apis/phone.php';
        include 'apis/email.php';
        include 'apis/map.php';
        include 'apis/social_networks.php';
    });
});
