<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bangladesh Travel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
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
        .navbar-nav .nav-link.active {
            color: rgb(69, 36, 146);
        }
</style>

<body>

<nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('welcome')}}">HotelBooking</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if(Auth::check())
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('user.dashboard') }}">User Dashboard</a>
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
                        <a class="nav-link active" href="{{ route('destinations.index') }}">Destinations</a>
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


    <!-- Main content area -->
    <div class="container">
        <h1>Travel Destinations and Attractions in Bangladesh</h1>

        <!-- Check if there are any destinations and attractions -->
        @if($destinationsAttractions->isEmpty())
            <p>No destinations or attractions found.</p>
        @else
            <div class="row">
                @foreach($destinationsAttractions as $item)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <!-- Updated image URL to use the 'asset' function -->
                            <img src="data:image/jpeg;base64,{{ base64_encode($item->image) }}" alt="Image" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->destination }} - {{ $item->attraction }}</h5>

                                <!-- Details button to toggle description -->

                                <a href="{{ route('destination.show', $item->id) }}" class="btn btn-primary">Show Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
