<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ExpectedLife extends Model
{
    protected $fillable = [
        'name'
    ];
    
    public function ageFactor():HasMany
    {
        return $this->hasMany(AgeFactor::class);
    }
}
