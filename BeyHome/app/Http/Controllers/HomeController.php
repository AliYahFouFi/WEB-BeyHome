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
        return view('home', compact('properties'));
    }
}
