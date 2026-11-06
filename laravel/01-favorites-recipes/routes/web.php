<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Models\Recipe;

Route::get('/', function () {
    $pageTitle = 'Home';
    return view('home', compact('pageTitle'));
});

Route::get('/recipes', [RecipeController::class, 'getAll'])->name('recipes.index');
Route::get('/recipes/{id}', function($id) {
    $recipe = Recipe::findOrFail($id);
    $pageTitle = 'Single - '.$recipe->title;
    return view('recipes.single', compact('recipe','pageTitle'));

})->name('recipes.single');

Route::get('/ingredients', function () {
    $pageTitle = 'Ingredienti';
    return view('ingredients', compact('pageTitle'));
});