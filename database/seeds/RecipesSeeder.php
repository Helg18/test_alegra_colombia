<?php

use App\Repositories\IngredientRepository;
use App\Repositories\RecipeRepository;
use Illuminate\Database\Seeder;

class RecipesSeeder extends Seeder
{
    /**
     * @var RecipeRepository
     */
    private $recipeRepository;

    /**
     * @var IngredientRepository
     */
    private $ingredientRepository;

    /**
     * RecipesSeeder constructor.
     * @param RecipeRepository $recipeRepository
     * @param IngredientRepository $ingredientRepository
     */
    public function __construct(RecipeRepository $recipeRepository, IngredientRepository $ingredientRepository)
    {
        $this->recipeRepository = $recipeRepository;
        $this->ingredientRepository = $ingredientRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $recipes = collect([
            'Chicken Schnitzel',
            'Cast-Iron Skillet Pork Chops',
            'Parmesan Chicken Cutlets',
            'Bacon-Wrapped Pork Tenderloin',
            'Crispy Thai Pork with Cucumber Salad',
            'Steak Tacos with Cilantro-Radish Salsa'
        ]);

        $recipes->each(function ($recipe){
            $this->recipeRepository->create(['name'=>$recipe]);
        });

        $recipes = $this->recipeRepository->search()->get();
        $ingredients = $this->ingredientRepository->search()->get();

        $recipes->each(function ($recipe) use ($ingredients){
            $ingredients->each(function ($ingredient) use ($recipe){
                $ingredient->recipes()->attach($recipe->id, ['quantity' => rand(1, 3)]);
            });
        });



    }
}
