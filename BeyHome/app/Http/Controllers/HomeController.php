<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class HomeController extends Controller
{
    //


    public function showProperties() {}
    public function index()
    {
        $properties = Property::paginate(6);  // or you can add pagination here
        if (auth()->user()) {
            $favorites = auth()->user()->favorites->pluck('id');
            return view('home', compact('properties', 'favorites'));
        }
        $favorites = 0;
        return view('home', compact('properties', 'favorites'));
    }
}
