<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $table = 'reviews';
    protected $fillable = [
        'product_id',
        'rating',

    ];
}