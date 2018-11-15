<?php

namespace App\Http\Controllers;

use App\Http\Template\Chef;
use App\Http\Template\Preparator;
use App\Repositories\OrderRepository;
use App\Repositories\RecipeRepository;

class OrderController extends Controller
{
    /**
     * @var OrderRepository
     */
    private $orderRepository;

    /**
     * OrderController constructor.
     * @param RecipeRepository $recipeRepository
     * @param OrderRepository $orderRepository
     */
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        return view('orders.list');
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
            session()->flash('error', $exception->getMessage());
            return redirect()->route('home')->withErrors($exception->getMessage());
        }

        // Return response
        return redirect()->route('home')->with('status', 'A new order has been created.');

    }
}
