<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'id',
        'ingredient_id',
        'quantity'
    ];

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }

    public function getIngredientName()
    {
        return $this->ingredient ? $this->ingredient->name : null;
    }
}
