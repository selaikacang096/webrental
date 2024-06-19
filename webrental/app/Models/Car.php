<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price_per_day',
        'rental_count',
        'availabilityStatus',
        'seat',
        'luggage',
        'img',
    ];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
