<?php

namespace App\Repositories;

use App\Models\Recipe;

class RecipeRepository extends AbstractRepository
{
    /**
     * IngredientRepository constructor.
     * @param Recipe $model
     */
    public function __construct(Recipe $model)
    {
        $this->model = $model;
    }

    public function search(array $filters = [], $distinct = true)
    {
        $query = $this->model->select('recipes.*');

        if ($distinct) {
            $query->distinct();
        }

        return $query->orderBy('recipes.id', 'desc');
    }

}