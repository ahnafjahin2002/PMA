<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $hotel->hotel_name }} - Hotel Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .container {
            max-width: 960px;
        }
        .hotel-image {
            width: 100%;
            height: auto; /* Keep the aspect ratio intact */
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h2 class="text-center mb-4">{{ $hotel->hotel_name }}</h2>
        
        @if ($hotel->image)
            <!-- Display the image with normal aspect ratio -->
            <img src="data:image/jpeg;base64,{{ base64_encode($hotel->image) }}" alt="{{ $hotel->hotel_name }}" class="hotel-image mb-4">
        @else
            <p class="text-center text-muted">No Image Available</p>
        @endif
        
        <!-- Hotel details in a styled card -->
        <div class="card">
            <p><strong>Address:</strong> {{ $hotel->address }}</p>
            <p><strong>Price:</strong> BDT {{ number_format($hotel->price, 2) }}</p>
            <p><strong>Description:</strong> {{ $hotel->description }}</p>
            
            <!-- Buttons for booking and going back -->
            <div class="text-center">
                <a href="{{ route('booking.check', $hotel->hotel_id) }}" class="btn btn-primary me-2">Book</a>
                <a href="{{ route('welcome') }}" class="btn btn-secondary">Back to Hotels</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
