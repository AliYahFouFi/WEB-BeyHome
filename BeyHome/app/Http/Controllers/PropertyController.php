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

        return view('property-show', compact('property'));
    }
}
