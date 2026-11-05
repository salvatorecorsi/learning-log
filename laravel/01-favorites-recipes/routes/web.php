<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $pageTitle = 'Home';
    return view('home', compact('pageTitle'));
});

Route::get('/recipes', function () {
    $pageTitle = 'Ricette';
    return view('recipes', compact('pageTitle'));
});

Route::get('/ingredients', function () {
    $pageTitle = 'Ingredienti';
    return view('ingredients', compact('pageTitle'));
});