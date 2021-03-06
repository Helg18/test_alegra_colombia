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

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function requisitions()
    {
        return $this->hasMany(Requisition::class);
    }

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class)->withTimestamps()->withPivot(['quantity']);
    }
}
