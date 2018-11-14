<?php

use App\Repositories\IngredientRepository;
use Illuminate\Database\Seeder;

class IngredientsSeeder extends Seeder
{
    /**
     * @var IngredientRepository
     */
    private $ingredientRepository;

    /**
     * IngredientsSeeder constructor.
     * @param IngredientRepository $ingredientRepository
     */
    public function __construct(IngredientRepository $ingredientRepository)
    {
        $this->ingredientRepository = $ingredientRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingredients = collect([
            'tomato',
            'lemon',
            'potato',
            'rice',
            'ketchup',
            'lettuce',
            'onion',
            'cheese',
            'meat',
            'chicken'
        ]);

        $ingredients->each(function ($ingredient){
            $this->ingredientRepository->create(['name' => $ingredient]);
        });
    }
}
