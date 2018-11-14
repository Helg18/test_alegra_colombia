<?php

namespace App\Http\Controllers;

use App\Repositories\PurchaseRepository;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * @var PurchaseRepository
     */
    private $purchaseRepository;

    /**
     * PurchaseController constructor.
     * @param PurchaseRepository $purchaseRepository
     */
    public function __construct(PurchaseRepository $purchaseRepository)
    {
        $this->purchaseRepository = $purchaseRepository;
    }

    public function index()
    {
        $purchases = $this->purchaseRepository->search()->get();
        return view('purchases.list', compact('purchases'));
    }
}
