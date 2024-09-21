<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rental extends Model
{
    use HasFactory;
    protected $fillable = [
        'start_date',
        'end_date',
        'total_cost',
        'user_id',
        'car_id'
    ];

    public function car():belongsTo
    {
        return $this->belongsTo(Car::class);
    }

    public function user():belongsTo
    {
        return $this->belongsTo(User::class);
    }


}
