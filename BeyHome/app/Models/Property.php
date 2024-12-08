<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'user_id',
        'rating',
        'location',
        'area',
        'bedrooms',
        'bathrooms',
        'parking_spaces',
        'furnished',
    ];
}
