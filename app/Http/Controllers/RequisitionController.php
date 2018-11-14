<?php

namespace App\Http\Controllers;

use App\Repositories\RequisitionRepository;
use Illuminate\Http\Request;

class RequisitionController extends Controller
{
    /**
     * @var RequisitionRepository
     */
    private $requisitionRepository;

    /**
     * RequisitionController constructor.
     * @param RequisitionRepository $requisitionRepository
     */
    public function __construct(RequisitionRepository $requisitionRepository)
    {
        $this->requisitionRepository = $requisitionRepository;
    }

    public function index()
    {
        $requisitions = $this->requisitionRepository->search()->get();
        return view('requisitions.list', compact('requisitions'));
    }
}
