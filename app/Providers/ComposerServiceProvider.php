<?php

namespace App\Providers;

use App\Http\Viewcomposers\IngredientComposer;
use App\Http\Viewcomposers\OrderComposer;
use App\Http\Viewcomposers\PurchaseComposer;
use App\Http\Viewcomposers\RecipeComposer;
use App\Http\Viewcomposers\RequisitionComposer;
use App\Http\Viewcomposers\StoreComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        View::composer('ingredients.list', IngredientComposer::class);
        View::composer('recipes.list', RecipeComposer::class);
        View::composer('purchases.list', PurchaseComposer::class);
        View::composer('requisitions.list', RequisitionComposer::class);
        View::composer('stores.list', StoreComposer::class);
        View::composer('orders.list', OrderComposer::class);
    }

    /**
     * Register
     *
     * @return void
     */
    public function register()
    {
        //
    }
}