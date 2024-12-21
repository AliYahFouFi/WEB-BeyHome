<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Property;
use App\Models\User;

class AdminController extends Controller
{


    public function dashboard()
    {
        $usersCount = User::where('role', 'user')->count();
        $hostCount = User::where('role', 'host')->count();
        $propertiesCount = Property::count();
        $bookingsCount = Booking::count();
        return view('admin.dashboard', compact('usersCount', 'propertiesCount', 'bookingsCount', 'hostCount'));
    }

    //properties
    public function showProperties()
    {
        $properties = Property::paginate(13);
        return view('admin.properties', compact('properties'));
    }

    public function destroyPr($id)
    {
        $property = Property::findOrFail($id);

        // Optionally delete associated images if stored in the file system
        // if ($property->images) {
        //     foreach (json_decode($property->images) as $image) {
        //         $imagePath = public_path('storage/' . $image);
        //         if (file_exists($imagePath)) {
        //             unlink($imagePath); // Delete the image
        //         }
        //     }
        // }
        $property->delete(); // Delete the property from the database

        return redirect()->back()->with('success', 'property removed successfully.');
    }


    //users
    public function showUsers()
    {
        $users = User::paginate(13);
        return view('admin.users', compact('users'));
    }
    public function destroyUser($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->back()->with('success', 'user removed successfully.');
    }

    //bookings
    public function showBookings()
    {
        $bookings = Booking::paginate(13);
        return view('admin.bookings', compact('bookings'));
    }
    public function destroyBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect()->back()->with('success', 'booking removed successfully.');
    }
}
