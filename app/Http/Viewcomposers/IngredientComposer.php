<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 14/11/18
 * Time: 09:24 PM
 */

namespace App\Http\Viewcomposers;


use App\Repositories\IngredientRepository;

class IngredientComposer
{
    protected $ingredientRepository;

    public function __construct(IngredientRepository $ingredientRepository)
    {
        $this->ingredientRepository = $ingredientRepository;
    }

    public function compose($view)
    {
        $ingredients = $this->ingredientRepository->search()->get();

        $view->with('ingredients', $ingredients);
    }
}