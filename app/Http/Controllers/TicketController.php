<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SeatAllocation;

class TicketController extends Controller
{
    public function index()
    {
        $trips = Trip::all();

        return view('tickets.index', compact('trips'));
    }

    public function show(Request $request)
    {
        $trip = Trip::findOrFail($request->input('trip_id'));
        $seats = range(1, 36);
        $seatAllocations = SeatAllocation::where('trip_id', $trip->id)->pluck('seat_number')->toArray();
        $users = User::get();

        return view('tickets.show', compact('trip', 'seats', 'seatAllocations','users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'user_id' => 'required|exists:users,id',
            'seat_number' => 'required|integer|min:1|max:36',
        ]);

        $trip = Trip::findOrFail($request->input('trip_id'));
        $seatNumber = $request->input('seat_number');

        if (in_array($seatNumber, $this->getOccupiedSeats($trip->id))) {
            return redirect()->back()->with('error', 'Seat already occupied!');
        }

        SeatAllocation::create([
            'trip_id' => $trip->id,
            'user_id' => $request->input('user_id'),
            'seat_number' => $seatNumber,
        ]);

        return redirect()->route('tickets.show', ['trip_id' => $trip->id])->with('success', 'Ticket purchased successfully!');
    }

    private function getOccupiedSeats($tripId)
    {
        return SeatAllocation::where('trip_id', $tripId)->pluck('seat_number')->toArray();
    }
}
