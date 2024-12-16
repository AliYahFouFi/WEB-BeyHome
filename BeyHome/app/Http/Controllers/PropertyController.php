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
        if (auth()->user()) {
            $favorites = auth()->user()->favorites->pluck('id');
            return view('filtered-properties-page', compact('properties', 'favorites'));
        }
        $favorites = 0;
        return view('filtered-properties-page', compact('properties'));
    }

    public function create()
    {
        return view('customLayouts.create-property');
    }

    public function store(Request $request)
    {
        // Validate the request (including images and the name field)
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'location' => 'required|string',
            'area' => 'nullable|numeric',
            'bedrooms' => 'nullable|integer',
            'bathrooms' => 'nullable|integer',
            'parking_spaces' => 'nullable|integer',
            'furnished' => 'boolean',
            'number_of_guests' => 'nullable|integer',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,gif|max:10240',
        ]);

        // Handle multiple image uploads
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Store each image and push the path into the $imagePaths array
                $imagePaths[] = $image->store('properties', 'public');
            }
        }

        // Prepare the data to be stored
        $validated['user_id'] = auth()->id();
        $validated['images'] = json_encode($imagePaths);  // Store the image paths as a JSON array
        $validated['rating'] = 0;
        // Create the property with the validated data
        Property::create($validated);

        return redirect()->route('home')->with('success', 'Property added successfully!');
    }

    public function showHostProperties()
    {
        $properties = Property::where('user_id', auth()->user()->id)->paginate(6);
        return view('customLayouts.host-properties', compact('properties'));
    }
}
