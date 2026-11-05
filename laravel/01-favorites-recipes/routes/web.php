<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/recipes', function () {
    return view('recipes');
});

Route::get('/ingredients', function () {
    return view('ingredients');
});