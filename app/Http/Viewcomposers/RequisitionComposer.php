<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 14/11/18
 * Time: 09:38 PM
 */

namespace App\Http\Viewcomposers;


use App\Repositories\RequisitionRepository;

class RequisitionComposer
{
    protected $requisitionRepository;

    public function __construct(RequisitionRepository $requisitionRepository)
    {
        $this->requisitionRepository = $requisitionRepository;
    }

    public function compose($view)
    {
        $requisitions = $this->requisitionRepository->search()->get();

        $view->with('requisitions', $requisitions);
    }
}