<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 14/11/18
 * Time: 08:14 PM
 */

namespace App\Http\Template;

use App\Repositories\OrderRepository;
use App\Repositories\PurchaseRepository;
use App\Repositories\RecipeRepository;
use App\Repositories\RequisitionRepository;
use App\Repositories\StoreRepository;
use App\Services\AlegraMarketplaceService;

class Preparator extends Template
{
    public function __construct(RecipeRepository $recipeRepository, StoreRepository $storeRepository, RequisitionRepository $requisitionRepository, OrderRepository $orderRepository, AlegraMarketplaceService $alegraMarketplaceService, PurchaseRepository $purchaseRepository)
    {
        parent::__construct($recipeRepository, $storeRepository, $requisitionRepository, $orderRepository, $alegraMarketplaceService, $purchaseRepository);
    }
}