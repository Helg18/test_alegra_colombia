<?php
namespace App\Repositories;

use App\Models\Requisition;

class RequisitionRepository extends AbstractRepository
{

    /**
     * IngredientRepository constructor.
     * @param Requisition $model
     */
    public function __construct(Requisition $model)
    {
        $this->model = $model;
    }

    public function search(array $filters = [], $distinct = true)
    {
        $query = $this->model->select('requisitions.*');

        if ($distinct) {
            $query->distinct();
        }

        return $query->orderBy('requisitions.id', 'desc');
    }
}