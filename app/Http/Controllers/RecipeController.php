<?php

namespace App\Http\Controllers;

use App\Repositories\RecipeRepository;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * @var RecipeRepository
     */
    private $recipeRepository;

    /**
     * RecipeController constructor.
     * @param RecipeRepository $recipeRepository
     */
    public function __construct(RecipeRepository $recipeRepository)
    {
        $this->recipeRepository = $recipeRepository;
    }

    public function index()
    {
        $recipes = $this->recipeRepository->search()->get();
        return view('recipes.list', compact('recipes'));
    }
}
