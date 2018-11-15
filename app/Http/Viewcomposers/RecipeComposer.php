<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 14/11/18
 * Time: 09:30 PM
 */

namespace App\Http\Viewcomposers;


use App\Repositories\RecipeRepository;

class RecipeComposer
{
    protected $recipeRepository;

    public function __construct(RecipeRepository $recipeRepository)
    {
        $this->recipeRepository = $recipeRepository;
    }

    public function compose($view)
    {
        $recipes = $this->recipeRepository->search()->get();

        $view->with('recipes', $recipes);
    }
}