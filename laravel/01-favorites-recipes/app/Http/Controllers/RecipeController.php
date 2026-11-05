<?php

namespace App\Http\Controllers;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function getAll() {
        $pageTitle = 'Ricette';
        
        //$recipes = Recipe::all();
        $recipes = Recipe::with('ingredients')->get(); // è come all ma prende con gli ingredients
        
        return view('recipes.index', compact('pageTitle', 'recipes'));
    }

}
