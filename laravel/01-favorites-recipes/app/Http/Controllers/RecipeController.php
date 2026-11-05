<?php

namespace App\Http\Controllers;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function getAll() {
        $pageTitle = 'Ricette';
        $recipes = Recipe::all();
        return view('recipes.index', compact('pageTitle', 'recipes'));
    }

    public function fakeRecipes($count = 10) {
        return Recipe::factory()->create($count)->make();
    }

}
