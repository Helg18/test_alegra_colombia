<?php

namespace App\Http\Controllers;

use App\Http\Template\Chef;
use App\Http\Template\Preparator;
use App\Repositories\OrderRepository;
use App\Repositories\RecipeRepository;

class OrderController extends Controller
{
    /**
     * @var RecipeRepository
     */
    private $recipeRepository;

    /**
     * @var OrderRepository
     */
    private $orderRepository;

    /**
     * OrderController constructor.
     * @param RecipeRepository $recipeRepository
     * @param OrderRepository $orderRepository
     */
    public function __construct(RecipeRepository $recipeRepository, OrderRepository $orderRepository)
    {
        $this->recipeRepository = $recipeRepository;
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $orders = $this->orderRepository->search()->get();
        return view('orders.list', compact('orders'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        try {
            $order = $this->orderRepository->create([
                'recipe_id' => null,
                'status'    => 'open'
            ]);

            $preparator = app(Preparator::class);
            $chef = new Chef($preparator, $order);
            $chef->build();

        } catch (\Exception $exception){
            logger("An error has been occurred while tried save a new order. ". $exception->getMessage());
            return redirect()->back()->withErrors($exception->getMessage());
        }

        // Return response
        return redirect()->route('home')->with('status', 'A new order has been created.');

    }
}
