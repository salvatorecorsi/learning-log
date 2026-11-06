<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recipe;
use App\Models\Ingredient;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Recipe::factory()->count(10)->has(Ingredient::factory()->count(3))->create();
        //Recipe::factory()->count(10)->count(3)->create();
    }
}
