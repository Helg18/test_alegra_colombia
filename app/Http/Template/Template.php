<?php
namespace App\Http\Template;

use App\Models\Order;
use App\Repositories\OrderRepository;
use App\Repositories\PurchaseRepository;
use App\Repositories\RecipeRepository;
use App\Repositories\RequisitionRepository;
use App\Repositories\StoreRepository;
use App\Services\AlegraMarketplaceService;

abstract class Template
{
    /** @var RecipeRepository */
    private $recipeRepository;

    /** @var $recipe */
    protected $recipe;

    /** @var $ingredients */
    protected $ingredients;

    /** @var $ingredientsObtained */
    protected $ingredientsObtained;

    /** @var $ingredientsMissing */
    protected $ingredientsMissing;

    /** @var StoreRepository */
    private $storeRepository;

    /** @var RequisitionRepository */
    private $requisitionRepository;

    /** @var OrderRepository */
    private $orderRepository;

    /** @var $order */
    private $order;
    /**
     * @var AlegraMarketplaceService
     */
    private $alegraMarketplaceService;
    /**
     * @var PurchaseRepository
     */
    private $purchaseRepository;

    /**
     * Template constructor.
     * @param RecipeRepository $recipeRepository
     * @param StoreRepository $storeRepository
     * @param RequisitionRepository $requisitionRepository
     * @param OrderRepository $orderRepository
     * @param AlegraMarketplaceService $alegraMarketplaceService
     * @param PurchaseRepository $purchaseRepository
     */
    public function __construct(
                        RecipeRepository $recipeRepository,
                        StoreRepository $storeRepository,
                        RequisitionRepository $requisitionRepository,
                        OrderRepository $orderRepository,
                        AlegraMarketplaceService $alegraMarketplaceService,
                        PurchaseRepository $purchaseRepository)
    {
        $this->recipeRepository = $recipeRepository;
        $this->storeRepository = $storeRepository;
        $this->ingredientsMissing = null;
        $this->requisitionRepository = $requisitionRepository;
        $this->orderRepository = $orderRepository;
        $this->alegraMarketplaceService = $alegraMarketplaceService;
        $this->purchaseRepository = $purchaseRepository;
    }

    final public function prepare(Order $order)
    {
        $this->setRecipeToOrder($order);
        $this->getIngredientsFromStore();
        if (isset($this->ingredientsMissing)){
            $this->purchaseIngredients();
            $this->getIngredientsFromStore(true);
        }
        $this->changeOrderStatus();
        return $this->order;

    }

    private function setRecipeToOrder(Order $order)
    {
        $this->recipe = $this->recipeRepository->getRamdonRecipe();
        $this->orderRepository->update($order, ['recipe_id' => $this->recipe->id]);
        $this->order = $order;
        return true;
    }

    private function getIngredientsFromStore($missing = false)
    {
        // Get Ingredient's Recipe
        $ingredients = $this->recipe->ingredients;

        if ($missing){
            $ingredients = $this->ingredientsMissing;
            $this->ingredientsMissing = null;
        }

        // Itering ingredients to check if is availables in store
        foreach ($ingredients as $ingredient) {
            $stored = $this->storeRepository->search(['ingredient_id' => $ingredient->id])->first();
            $needed = $ingredient->pivot->quantity;

            if($needed == 0){
                continue;
            }

            // Removing from store if available
            if ($stored->quantity >= $needed){
                $this->ingredientsObtained[$ingredient->id] = $needed;

                $this->storeRepository->update($stored, ['quantity' => $stored->quantity - $needed]);
                $requisition = [
                    'order_id'       => $this->order->id,
                    'ingredient_id'  => $ingredient->id,
                    'quantity'       => $needed,
                    'description'    => "Requested to prepare order ".$this->order->id
                ];

                // Store Record in requisition table
                $this->requisitionRepository->create($requisition);
            } else {
                $this->ingredientsMissing[] = $ingredient;
            }

        }

        if ($missing && isset($this->ingredientsMissing)){
            // Returning Ingredients to store
            foreach ($this->ingredientsObtained as $key => $value) {
                $ingredient = $this->storeRepository->search(['ingredient_id' => $key])->first();
                if ($value > 0){
                    $this->storeRepository->update($ingredient, ['quantity' => $ingredient->quantity + $value]);

                    $requisition = [
                        'order_id'       => $this->order->id,
                        'ingredient_id'  => $ingredient->ingredient_id,
                        'quantity'       => $ingredient->quantity + $value,
                        'description'    => "Returned ingredients to prepare order ".$this->order->id
                    ];

                    // Store Record in requisition table
                    $this->requisitionRepository->create($requisition);
                }

            }

            // Setting new status to this order
            $this->orderRepository->update($this->order, ['status' => 'Ingredients are missing']);
            throw new \Exception("Ingredients are missing");
        }
    }

    private function purchaseIngredients()
    {
        foreach ($this->ingredientsMissing as $ingredient) {
            // call Service to do request api to pursache ingredients
            $buyed = $this->alegraMarketplaceService->request($ingredient->name);


            // Validating if purchase is success
            if ($buyed > 0){

                // Write record in Pursaches ingredients
                $this->purchaseRepository->create([
                    'ingredient_id' => $ingredient->id,
                    'quantity'      => $buyed
                ]);

                // Update store quantity
                $stored = $this->storeRepository->search(['ingredient_id' => $ingredient->id])->first();
                $this->storeRepository->update($stored, [
                    'quantity' => $buyed
                ]);
            }

        }

    }

    private function changeOrderStatus()
    {
        $this->orderRepository->update($this->order, ['status' => 'Dispatched']);
    }

}