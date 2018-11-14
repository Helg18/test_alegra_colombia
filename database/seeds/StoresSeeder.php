<?php

use App\Repositories\IngredientRepository;
use App\Repositories\StoreRepository;
use Illuminate\Database\Seeder;

class StoresSeeder extends Seeder
{
    /**
     * @var IngredientRepository
     */
    private $ingredientRepository;

    /**
     * @var StoreRepository
     */
    private $storeRepository;

    /**
     * StoresSeeder constructor.
     * @param IngredientRepository $ingredientRepository
     * @param StoreRepository $storeRepository
     */
    public function __construct(IngredientRepository $ingredientRepository, StoreRepository $storeRepository)
    {
        $this->ingredientRepository = $ingredientRepository;
        $this->storeRepository = $storeRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingredients = $this->ingredientRepository->search()->get();

        $ingredients->each(function ($ingredient){
            $this->storeRepository->create([
                'ingredient_id' => $ingredient->id,
                'quantity'      => 5
            ]);
        });
    }
}
