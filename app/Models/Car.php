<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    use HasFactory;
    protected $fillable = ([
        'name',
        'brand',
        'model',
        'year',
        'car_type',
        'daily_rent_price',
        'availability',
        'image'
    ]);

    public function rental():hasMany
    {
        return $this->hasMany(Rental::class);
    }
}
