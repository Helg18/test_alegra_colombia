<?php

namespace App\Http\Controllers;

use App\Repositories\StoreRepository;

class StoreController extends Controller
{
    /**
     * @var StoreRepository
     */
    private $storeRepository;

    /**
     * StoreController constructor.
     * @param StoreRepository $storeRepository
     */
    public function __construct(StoreRepository $storeRepository)
    {
        $this->storeRepository = $storeRepository;
    }

    public function index()
    {
        $storage = $this->storeRepository->search()->get();
        return view('stores.list', compact('storage'));
    }
}
