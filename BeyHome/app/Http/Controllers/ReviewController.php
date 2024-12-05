<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\Review;


class ReviewController extends Controller
{
    //
    public function storeRating(Request $request, Property $property)
    {
        $request->validate([
            'rating' => 'required|min:1|max:5',
        ]);

        $review = new Review();
        $review->property_id = $property->id; // Ensure this line is correct
        $review->rating = $request->input('rating');
        // Add other fields as necessary
        $review->save();
        //we calculates the average rating of reviews for a specific property.
        $temp = Review::where('property_id', $property->id)->avg('rating');
        property::where('id', $property->id)->update(['rating' => $temp]);

        return response()->json(['success' => true, 'message' => 'Rating submitted successfully!']);
    }
}
