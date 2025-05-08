<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($destinationAttraction) ? $destinationAttraction->destination . ' - ' . $destinationAttraction->attraction : 'Destination Not Found' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:rgb(243, 243, 243);">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('welcome') }}">HotelBooking</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('destinations.index') }}">Back to Destinations</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main content area -->
<div class="container mt-5">

    @if(isset($destinationAttraction))
        <h1>{{ $destinationAttraction->destination }} - {{ $destinationAttraction->attraction }}</h1>

        <!-- Display Image -->
        <img src="data:image/jpeg;base64,{{ base64_encode($destinationAttraction->image) }}" alt="{{ $destinationAttraction->destination }} image" class="img-fluid mb-4">
        
        <!-- Display Description -->
        <h5>Description:</h5>
        <p>{!! nl2br(e($destinationAttraction->description)) !!}</p>
    @else
        <!-- If the destination is not found -->
        <div class="alert alert-warning" role="alert">
            Sorry, the destination details could not be found.
        </div>
    @endif
    
    <!-- Back Button -->
    <a href="{{ route('destinations.index') }}" class="btn btn-secondary">Back to Destinations</a>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
