<?php

namespace App\Http\Controllers;

use App\Repositories\IngredientRepository;

class IngredientController extends Controller
{
    /**
     * @var IngredientRepository
     */
    private $ingredientRepository;

    /**
     * IngredientController constructor.
     * @param IngredientRepository $ingredientRepository
     */
    public function __construct(IngredientRepository $ingredientRepository)
    {
        $this->ingredientRepository = $ingredientRepository;
    }

    public function index()
    {
        // Get all Ingredients
        $ingredients = $this->ingredientRepository->search()->get();

        return view('ingredients.list', compact('ingredients'));

    }
}
