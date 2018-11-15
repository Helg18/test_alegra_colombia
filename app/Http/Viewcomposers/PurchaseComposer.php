<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 14/11/18
 * Time: 09:35 PM
 */

namespace App\Http\Viewcomposers;


use App\Repositories\PurchaseRepository;

class PurchaseComposer
{
    protected $purchaseRepository;

    public function __construct(PurchaseRepository $purchaseRepository)
    {
        $this->purchaseRepository = $purchaseRepository;
    }

    public function compose($view)
    {
        $purchases = $this->purchaseRepository->search()->get();

        $view->with('purchases', $purchases);
    }
}