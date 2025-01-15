<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Age extends Model
{
    protected $fillable = [
        'age'
    ];

    public function animal():HasMany
    {
        return $this->hasMany(Animal::class);
    }

    public function ageFactor():HasMany
    {
        return $this->hasMany(AgeFactor::class);
    }
}
