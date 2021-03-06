<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    protected $fillable = ['id', 'order_id', 'ingredient_id', 'quantity', 'description'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }

    public function getIngredientName()
    {
        return $this->ingredient ? $this->ingredient->name : null;
    }

    public function getRecipeName()
    {
        return $this->order ? $this->order->getPlateName() : null;
    }
}
