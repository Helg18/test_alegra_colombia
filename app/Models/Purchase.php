<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
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
}
