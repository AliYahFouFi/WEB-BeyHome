<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Review;
use App\Models\WrittenReviews;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Show the property details and associated reviews.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */


    public function show($id)
    {
        // Find the property by its ID
        $property = Property::findOrFail($id);
        $reviews = WrittenReviews::where('property_id', $property->id)->get();
        $nbofreviews = Review::where('property_id', $property->id)->count();
        $similarProperties = Property::where('location', $property->location)->paginate(3);

        // $name_of_property_owner = $property->user->name;
        return view('property-show', compact('property', 'reviews', 'nbofreviews', "similarProperties"));
    }

    /**Filter properties by location ,category and price and number of gusts*/

    public function filter(Request $request)
    {
        $locations = $request->input('location', []);
        // $category = $request->input('category');
        $numberOfGusts = $request->input('numberOfGusts');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');

        // Apply filters based on user input
        $query = Property::query();


        if (!empty($locations)) {
            if ($locations[0] == 'all') {
            } else {
                $query->whereIn('location', $locations);
            }
        }

        if ($minPrice) {
            $query->where('price', '>=', $minPrice);
        }

        if ($maxPrice) {
            $query->where('price', '<=', $maxPrice);
        }

        if ($numberOfGusts) {
            $query->where('number_of_guests', '>=', $numberOfGusts);
        }
        // Get the filtered properties
        $properties = $query->paginate(6);

        return view('filtered-properties-page', compact('properties'));
    }
}
