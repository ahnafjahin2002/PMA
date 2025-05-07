<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
</head>
<body>
    <h1>Dear {{ $userName }},</h1>
    <p>Your booking has been completed successfully. Here are the details:</p>
    <ul>
        <li>Hotel: {{ $bookingDetails->hotel_name }}</li>
        <li>Check-in Date: {{ $bookingDetails->checkin_date }}</li>
        <li>Check-out Date: {{ $bookingDetails->checkout_date }}</li>
    </ul>
    <p>Thank you for choosing us!</p>
    <p>If you have any questions, feel free to contact us.</p>
    <p>Best regards,</p>
    <p>The PMA Team</p>
    <p><a href="{{ route('welcome') }}">Go to Dashboard</a></p>
</body>
</html>
