<?php

namespace App\Repositories;


use App\Models\Purchase;

class PurchaseRepository extends AbstractRepository
{
    /**
     * IngredientRepository constructor.
     * @param Purchase $model
     */
    public function __construct(Purchase $model)
    {
        $this->model = $model;
    }

    public function search(array $filters = [], $distinct = true)
    {
        $query = $this->model->select('purchases.*');

        if ($distinct) {
            $query->distinct();
        }

        return $query->orderBy('purchases.id', 'desc');
    }

}