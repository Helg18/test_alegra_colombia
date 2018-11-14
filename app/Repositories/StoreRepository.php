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
        $query = $this->model->select('store.*');

        if ($distinct) {
            $query->distinct();
        }

        return $query->orderBy('store.id', 'desc');
    }

}