<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

use function Laravel\Prompts\search;

Route::get('/', function () {
    return view('index');
});


Route::get('/search' , [PostController::class,'search']);
