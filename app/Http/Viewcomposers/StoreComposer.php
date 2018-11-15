<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 14/11/18
 * Time: 09:42 PM
 */

namespace App\Http\Viewcomposers;


use App\Repositories\StoreRepository;

class StoreComposer
{
    protected $storeRepository;

    public function __construct(StoreRepository $storeRepository)
    {
        $this->storeRepository = $storeRepository;
    }

    public function compose($view)
    {
        $storage = $this->storeRepository->search()->get();

        $view->with('storage', $storage);
    }
}