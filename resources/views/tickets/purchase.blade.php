<!DOCTYPE html>
<html>
<head>
    <title>Ticket Purchase</title>
</head>
<body>
    <h1>Ticket Purchase Successful</h1>

    <p>Date: {{ $ticket->trip->trip_date }}</p>
    <p>Destination: {{ $ticket->trip->location->name }}</p>
    <p>Seat Number: {{ $ticket->seat_number }}</p>

    <p>Thank you for choosing Tiki Bus!</p>
</body>
</html>
