<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Ticket</title>
</head>
<body>
    <h1>Book Ticket for {{ $trip->location->name }} - {{ $trip->date }}</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div style="color: red;">{{ session('error') }}</div>
    @endif

    <form action="{{ route('tickets.store') }}" method="POST">
        @csrf
        <input type="hidden" name="trip_id" value="{{ $trip->id }}">

        <label for="user_id">Select User:</label>
        <select id="user_id" name="user_id" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>

        <label for="seat_number">Select Seat:</label>
        <select id="seat_number" name="seat_number" required>
            @foreach($seats as $seat)
                <option value="{{ $seat }}" {{ in_array($seat, $seatAllocations) ? 'disabled' : '' }}>{{ $seat }}</option>
            @endforeach
        </select>

        <button type="submit">Book Ticket</button>
    </form>
</body>
</html>
