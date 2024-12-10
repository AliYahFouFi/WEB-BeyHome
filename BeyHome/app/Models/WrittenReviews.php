<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WrittenReviews extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'user_id',
        'review',
    ];

    //a written review belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //a written review belongs to a property
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
