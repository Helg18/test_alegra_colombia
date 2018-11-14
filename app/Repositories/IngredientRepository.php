<?php

namespace App\Repositories;


use App\Models\Ingredient;

class IngredientRepository extends AbstractRepository
{
    /**
     * IngredientRepository constructor.
     * @param Ingredient $model
     */
    public function __construct(Ingredient $model)
    {
        $this->model = $model;
    }

    public function search(array $filters = [], $distinct = true)
    {
        $query = $this->model->select('ingredients.*');

        if ($distinct) {
            $query->distinct();
        }

        return $query->orderBy('ingredients.id', 'desc');
    }

}