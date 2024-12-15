<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\WrittenReview;

class Property extends Model
{
    //
    protected $fillable = [
        'name', 'description', 'price', 'category', 'location',
        'area', 'bedrooms', 'bathrooms', 'parking_spaces',
        'furnished', 'number_of_guests', 'user_id', 'images',
    ];
    

    public function writtenReviews()
    {
        return $this->belongsTo(WrittenReviews::class);
    }

    //a property can have many favorites
    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
