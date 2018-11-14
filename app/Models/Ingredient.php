<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = [
        'id',
        'name'
    ];

    public function store()
    {
        return $this->hasOne(Store::class);
    }
}
