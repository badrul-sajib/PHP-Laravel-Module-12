<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticketing System</title>
</head>
<body>
    <h1>Ticketing System</h1>

    <ul>
        @foreach($trips as $trip)
            <li>
                <a href="{{ route('tickets.show', ['trip_id' => $trip->id]) }}">{{ $trip->location->name }} - {{ $trip->date }}</a>
            </li>
        @endforeach
    </ul>
</body>
</html>

