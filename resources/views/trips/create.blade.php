<!DOCTYPE html>
<html>
<head>
    <title>Create a New Trip</title>
</head>
<body>
    <h1>Create a New Trip</h1>

    <form action="{{route('trips.store')}}" method="post">
        @csrf
        <label for="trip_date">Trip Date:</label>
        <input type="date" name="trip_date" required>
        
        <label for="location_id">Destination:</label>
        <select name="location_id" required>
            <option value="dhaka">Dhaka</option>
            <option value="comilla">Comilla</option>
            <option value="chittagong">Chittagong</option>
            <option value="cox's_bazaar">Cox's Bazaar</option>
        </select>

        <button type="submit">Create Trip</button>
    </form>
</body>
</html>
