<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'id',
        'name'
    ];

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class)->withPivot('quantity')->withTimestamps();
    }
}
