<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Review;
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

        // Get the reviews for this property
        // $reviews = Review::where('property_id', $id)->get();

        // Return the property view with the property and its reviews
        return view('property-show', compact('property'));
    }
}
