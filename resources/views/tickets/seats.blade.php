<!DOCTYPE html>
<html>
<head>
    <title>Available Seats</title>
</head>
<body>
    <h1>Available Seats</h1>

    <p>Date: {{ $trip->trip_date }}</p>
    <p>Destination: {{ $trip->location->name }}</p>

    <form action="/trips/{{ $trip->id }}/seats/purchase" method="post">
        @csrf
        <label for="seat_number">Choose a Seat:</label>
        <select name="seat_number" required>
            <!-- Loop through available seats -->
            @for ($i = 1; $i <= 36; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>

        <button type="submit">Purchase Ticket</button>
    </form>
</body>
</html>
