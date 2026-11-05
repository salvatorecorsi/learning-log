<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Models\Recipe;

Route::get('/', function () {
    $pageTitle = 'Home';
    return view('home', compact('pageTitle'));
});

Route::get('/recipes', [RecipeController::class, 'getAll'])->name('recipes.index');

Route::get('/recipes/create', function () {
    $pageTitle = 'Crea';
    $name = "Pollone";

    $result = Recipe::create([
        'name' =>  $name,
        'slug' => strtolower($name), // si lo so che è unique e che fallirà al secondo, stiamo calmi eh
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    return view('recipes.create', compact('pageTitle','result'));
})->name('recipes.create');

Route::get('/recipes/{id}', function ($id) {
    $recipe = Recipe::find($id);
    $pageTitle = 'Ricetta trovata';

    return view('recipes.get', compact('pageTitle','recipe'));
})->name('recipes.get');

Route::get('/ingredients', function () {
    $pageTitle = 'Ingredienti';
    return view('ingredients', compact('pageTitle'));
});