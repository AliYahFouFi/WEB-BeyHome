<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Property;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    //for adding to favorites
    public function store(Property $property)
    {
        try {
            $favorite = new Favorite();
            $favorite->user_id = auth()->user()->id;
            $favorite->property_id = $property->id;
            $favorite->save();
            return redirect()->back()->with('success', 'Property added to favorites successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Property already in to favorites');
        }
        return redirect()->back();
    }
    //for showing favorites 
    public function show()
    {
        $user_id = auth()->user()->id;
        $favoriteItems = Favorite::where('user_id', $user_id)->get();
        $properties = Property::whereIn('id', $favoriteItems->pluck('property_id'))->get();
        return view('favorites', compact('favoriteItems', 'properties'));
    }
    //for removing from favorites
    public function destroy(Property $property)
    {
        $temp = Favorite::where('user_id', auth()->user()->id)->where('property_id', $property->id)->delete();
        return redirect()->back()->with('success', 'Item removed from favorites list.');
    }
}
