<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HolidayDestination extends Model
{
    protected $casts = [
        'name' => 'string',
        'slug' => 'string',
        'location' => 'string',
        'description' => 'string',
        'price' => 'integer'
    ];

    protected $fillable = [
        'name',
        'slug',
        'location',
        'description',
        'price'
    ];

    public function getFormattedPriceAttribute()
    {
        return '$' . $this->price / 100;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
