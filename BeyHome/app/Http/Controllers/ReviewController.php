<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\WrittenReviews;


class ReviewController extends Controller
{
    //RATING STARes 1 to 5
    public function storeRating(Request $request, Property $property)
    {
        $request->validate([
            'rating' => 'required|min:1|max:5',
        ]);

        $hasReview = Review::where('user_id', auth()->user()->id)->where('property_id', $property->id)->exists();

        if ($property->user_id == auth()->user()->id) {
            return redirect()->back()->with('error', 'cannot rate your own property.');
        }

        if ($hasReview) {
            return redirect()->back()->with('error', 'You have already rated this property.');
        }
        $review = new Review();
        $review->property_id = $property->id;
        $review->rating = $request->input('rating');
        $review->user_id = auth()->user()->id;
        $review->save();
        //we calculates the average rating of reviews for a specific property.
        $temp = Review::where('property_id', $property->id)->avg('rating');
        $temp = ceil($temp);
        property::where('id', $property->id)->update(['rating' => $temp]);

        return redirect()->back()->with('success', 'property rated successfully.');
    }


    public function storeReview(Request $request, Property $property)
    {
        $request->validate([
            'review' => 'required|max:200',
        ]);
        $reviews = new WrittenReviews();
        $reviews->user_id = auth()->user()->id;
        $reviews->property_id = $property->id;
        $reviews->review = $request->input('review');


        $reviews->save();

        return response()->json([
            'success' => true,
            'user_name' => auth()->user()->name,
            'review' => $reviews->review,

        ]);
    }
}
