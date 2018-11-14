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
        return $this->belongsTo(Order::class);
    }
}
