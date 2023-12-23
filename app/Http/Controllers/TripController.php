<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Location;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function create(){
        $locations = Location::get();
        return view('trips.create',compact('locations'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'trip_date' => 'required|date',
            'location_id' => 'required|exists:locations,id',
        ]);
    
        Trip::create($validatedData);
    
        return redirect()->route('trips.create')->with('success', 'Trip created successfully!');
    }
    
}
