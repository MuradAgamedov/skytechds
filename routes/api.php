<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group(['prefix' => "admin", "as" => "admin."], function () {
    include 'apis/auth/auth.php';

    Route::group(['middleware' => "auth:sanctum"], function () {
        include 'apis/contacts/phone.php';
        include 'apis/contacts/email.php';
        include 'apis/contacts/map.php';
        include 'apis/contacts/social_networks.php';
        include 'apis/contacts/language.php';
        include 'apis/contacts/address.php';
        include 'apis/languageAndDictionary/dictionary.php';
        include 'apis/blogs/blog_category.php';
        include 'apis/blogs/blog.php';
    });
});
