<?php

namespace App\Http\Controllers;

class IngredientController extends Controller
{
    public function index()
    {
        return view('ingredients.list');
    }
}
