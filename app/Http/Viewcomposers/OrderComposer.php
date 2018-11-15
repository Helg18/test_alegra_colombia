<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 14/11/18
 * Time: 09:44 PM
 */

namespace App\Http\Viewcomposers;


use App\Repositories\OrderRepository;

class OrderComposer
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function compose($view)
    {
        $orders = $this->orderRepository->search()->get();

        $view->with('orders', $orders);
    }
}