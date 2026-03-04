<?php

use App\Repositories\TagRepository;
use Illuminate\Support\Facades\Route;

Route::resource("tags", TagRepository::class);
