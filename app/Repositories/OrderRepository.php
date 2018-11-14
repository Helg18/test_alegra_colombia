<?php

namespace App\Repositories;


use App\Models\Order;

class OrderRepository extends AbstractRepository
{
    /**
     * IngredientRepository constructor.
     * @param Order $model
     */
    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    public function search(array $filters = [], $distinct = true)
    {
        $query = $this->model->select('orders.*');

        if ($distinct) {
            $query->distinct();
        }

        return $query->orderBy('orders.id', 'desc');
    }

}