<?php

Route::get('/', function () {
    return view('welcome');
})->name('home');


// Orders
Route::resource('order', 'OrderController')->only('store', 'show', 'index');

// Ingredients
Route::resource('ingredient', 'IngredientController')->only('index');

// Recipes
Route::resource('recipe', 'RecipeController')->only('index');

// Purchases
Route::resource('purchase', 'PurchaseController')->only('index');

// Store
Route::resource('store', 'StoreController')->only('index');

// Requisitions
Route::resource('requisition', 'RequisitionController')->only('index');
