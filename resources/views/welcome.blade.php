<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f7f6;
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            background-color:rgb(243, 243, 243);
        }
        .navbar-brand {
            font-weight: bold;
            color:rgb(37, 37, 32);
        }
        .navbar-nav .nav-link {
            color:rgb(17, 16, 12);
        }
        .navbar-nav .nav-link:hover {
            color:rgb(69, 36, 146);
        }
        .hero-section {
            background: url('https://source.unsplash.com/1600x400/?hotel,travel') no-repeat center center;
            background-size: cover;
            height: 300px;
            color: Black;
            display: flex;
            justify-content: center;
            align-items: center;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
        }
        .hero-text h1 {
            font-size: 3rem;
            font-weight: bold;
        }
        .search-bar {
            margin-top: -80px;
            position: relative;
            z-index: 10;
        }
        .hotel-card {
            transition: transform 0.3s ease-in-out;
        }
        .hotel-card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .card-title {
            color: #007bff;
        }
        .card-footer {
            text-align: center;
        }
        .alert {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">HotelBooking</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if(Auth::check())
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('user.dashboard') }}">User Dashboard</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">User</a>
                            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="{{ route('user.login') }}">Login</a></li>
                                <li><a class="dropdown-item" href="{{ route('user.register') }}">Register</a></li>
                            </ul>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.login') }}">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('destinations.index') }}">Destinations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('currency.converter') }}">Currency Converter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('weather.show') }}">Weather</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-text text-center">
            <h1>Find Your Perfect Hotel</h1>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="container search-bar text-center">
        <form action="{{ route('hotel.search') }}" method="GET">
            <div class="input-group w-75 mx-auto">
                <input type="text" name="query" class="form-control" placeholder="Search for a hotel..." value="{{ request()->get('query') }}">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>

    <!-- Hotels Section -->
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Available Hotels</h2>

        @if($hotels->count())
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach($hotels as $hotel)
                    <div class="col">
                        <div class="card hotel-card h-100 shadow-sm border-0">
                        @if ($hotel->image)
                            <!-- Display the image with normal aspect ratio -->
                            <img src="data:image/jpeg;base64,{{ base64_encode($hotel->image) }}" alt="{{ $hotel->hotel_name }}" class="hotel-image mb-4">
                        @else
                            <p class="text-center text-muted">No Image Available</p>
                        @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $hotel->hotel_name }}</h5>
                                <p class="card-text">
                                    <strong>Address:</strong> {{ $hotel->address }}<br>
                                    <strong>Price:</strong> BDT {{ number_format($hotel->price, 2) }}
                                </p>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <a href="{{ route('hotel.show', $hotel->hotel_id)}}" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning text-center">
                No hotels found at the moment. Please check back later.
            </div>
        @endif
    </div>
    
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/68085744753e2219109a950b/1ipg99p1e';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
