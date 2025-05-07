<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Laravel App</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('welcome') }}">Dashboard</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="mb-4">Book Hotel: {{ $hotel->hotel_name }}</h2>

        <form method="POST" action="{{ route('booking.store') }}">
            @csrf
            <input type="hidden" name="hotel_id" value="{{ $hotel->hotel_id }}">
            <input type="hidden" name="hotel_dname" value="{{ $hotel->hotel_name }}">

            <div class="mb-3">
                <label for="checkin_date" class="form-label">Check-in Date</label>
                <input type="date" id="checkin_date" name="checkin_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="checkout_date" class="form-label">Check-out Date</label>
                <input type="date" id="checkout_date" name="checkout_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="number_of_rooms" class="form-label">Number of Rooms</label>
                <input type="number" id="number_of_rooms" name="number_of_rooms" class="form-control" min="1" required>
            </div>

            <div class="mb-3">
                <label for="number_of_guests" class="form-label">Number of Guests (optional)</label>
                <input type="number" id="number_of_guests" name="number_of_guests" class="form-control" min="1" value="1">
            </div>

            <div class="mb-3">
                <label for="total_amount" class="form-label">Total Amount</label>
                <input type="text" id="total_amount" name="total_amount" class="form-control" readonly>
            </div>

            <button type="submit" class="btn btn-primary">Book Now</button>
        </form>
        <!-- SSLCommerz Payment Form -->
        <!-- <form method="POST" action="{{ url('/pay-sslcommerz') }}" id="sslcommerz-form">
            @csrf
            <input type="hidden" name="amount" id="ssl_amount">
            <button type="submit" class="btn btn-warning">Pay via SSLCommerz</button>
        </form> -->
    </div>
    
    <script>
        // Update the total amount calculation
        function updateTotalAmount() {
            const checkin = new Date(document.getElementById('checkin_date').value);
            const checkout = new Date(document.getElementById('checkout_date').value);
            const rooms = parseInt(document.getElementById('number_of_rooms').value);

            if (!isNaN(checkin) && !isNaN(checkout) && rooms > 0) {
                const days = (checkout - checkin) / (1000 * 60 * 60 * 24);
                if (days > 0) {
                    const rate = {{ $hotel->price }};
                    const total = rate * rooms * days;
                    document.getElementById('total_amount').value = total.toFixed(2);
                } else {
                    document.getElementById('total_amount').value = 'Invalid date range';
                }
            }
        }
        // document.getElementById('sslcommerz-form').addEventListener('submit', function () {
        //     const totalAmount = document.getElementById('total_amount').value;
        //     document.getElementById('ssl_amount').value = totalAmount;
        //     console.log("Amount being sent:", totalAmount);
        // });

        // Attach events
        document.getElementById('checkin_date').addEventListener('change', updateTotalAmount);
        document.getElementById('checkout_date').addEventListener('change', updateTotalAmount);
        document.getElementById('number_of_rooms').addEventListener('input', updateTotalAmount);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
