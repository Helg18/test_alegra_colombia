<?php

Route::get('/', function () {
    return view('welcome');
})->name('home');


// Orders
Route::resource('order', 'OrderController')->only('store', 'show', 'index');

// Ingredients
Route::resource('ingredient', 'IngredientController')->only('index');
