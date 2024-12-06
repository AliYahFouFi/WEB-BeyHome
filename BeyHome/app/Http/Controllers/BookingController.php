<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Property;

class BookingController extends Controller
{


    public function store(Request $request)
    {
        // Validate incoming request
        $validatedData = $request->validate([
            'property_id' => 'required|exists:properties,id',
            'user_id' => 'required|exists:users,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'total_price' => 'required',
        ]);

        // Check if the property is already booked for the given dates
        $isBooked = Booking::where('property_id', $validatedData['property_id'])
            ->where(function ($query) use ($validatedData) {
                $query->whereBetween('start_date', [$validatedData['start_date'], $validatedData['end_date']])
                    ->orWhereBetween('end_date', [$validatedData['start_date'], $validatedData['end_date']]);
            })
            ->exists();

        if ($isBooked) {
            return redirect()->back()->with('This property is already booked for the selected dates.');
        }
        // Create the booking
        $booking = Booking::create([
            'property_id' => $request->property_id,
            'user_id' => $request->user_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_price' => $request->total_price,
            'status' => 'pending',  // default status
        ]);

        $property = Property::find($request->property_id);
        $property->booked = true;
        $property->save();

        return redirect()->route('home')->with('success', 'Booking created successfully!');
    }
}
