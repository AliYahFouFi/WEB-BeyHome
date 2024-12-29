<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $fillable = [
        'product_id',
        'rating',

    ];

    public function use()
    {
        return $this->belongsTo(User::class);
    }
}
