<?php

namespace App\Repositories;


use App\Models\Store;

class StoreRepository extends AbstractRepository
{
    /**
     * IngredientRepository constructor.
     * @param Store $model
     */
    public function __construct(Store $model)
    {
        $this->model = $model;
    }

    public function search(array $filters = [], $distinct = true)
    {
        $query = $this->model->select('stores.*');

        if ($distinct) {
            $query->distinct();
        }

        if (isset($filters['ingredient_id']) && $filters['ingredient_id']){
            $query->ofIngredientID($filters['ingredient_id']);
        }

        return $query->orderBy('stores.id', 'desc');
    }

}