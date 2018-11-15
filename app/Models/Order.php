<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'id',
        'recipe_id',
        'status'
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    public function getPlateName()
    {
        return $this->recipe ? $this->recipe->name : null;
    }

    public function scopeOfIngredientID($query, $id)
    {
        return !$id ? $query : $query->where('ingredient_id', $id);
    }
}
