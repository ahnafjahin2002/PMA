<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Travel Packages</title>
    <style>
        /* Add this CSS to style your travel packages */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
         /* Styling for the Navbar */
         .navbar {
            background-color: #007bff;
            padding: 10px 20px;
        }
        .navbar-brand {
            color: #fff;
            font-weight: bold;
            font-size: 1.5rem;
        }
        .navbar-nav .nav-link {
            color: #fff;
            margin-right: 15px;
            font-size: 1.1rem;
        }
        .navbar-nav .nav-link:hover {
            color: #ffd700;
        }
        .navbar-nav .nav-link.active {
            font-weight: bold;
            color: #ffd700;
        }
        .navbar .form-inline input {
            padding: 10px;
            border-radius: 20px;
            border: none;
            margin-top: 5px;
        }
        .navbar .form-inline button {
            padding: 10px 15px;
            background-color: #ffd700;
            border: none;
            border-radius: 20px;
            font-weight: bold;
            color: #007bff;
        }
        .navbar .form-inline button:hover {
            background-color: #ffcc00;
        }

        /* Dropdown Menu Styling */
        .dropdown-menu {
            background-color: #007bff;
            border-radius: 10px;
            padding: 10px;
        }
        .dropdown-menu .dropdown-item {
            color: white;
            font-size: 1rem;
            padding: 8px 20px;
        }
        .dropdown-menu .dropdown-item:hover {
            background-color: #ffd700;
            color: #007bff;
        }
        .dropdown-item.active {
            background-color: #0056b3;
            color: white;
            font-weight: bold;
        }
        .btn-logout {
            color: white;
            background-color: #dc3545;
            border-radius: 20px;
            font-weight: bold;
            border: none;
        }
        .btn-logout:hover {
            background-color: #c82333;
        }

        /* Travel Packages Container Styling */
        .travel-packages-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .travel-package {
            border: 1px solid #ddd;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .travel-package:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
        }

        .package-name {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .package-description {
            font-size: 1rem;
            color: #555;
            margin-bottom: 15px;
        }

        .package-price {
            font-size: 1.1rem;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .package-image {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .view-details {
            display: inline-block;
            text-decoration: none;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            text-align: center;
        }

        .view-details:hover {
            background-color: #0056b3;
        }

        
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PMA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('welcome') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('packages.index') }}">Packages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.bookings') }}">Bookings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.reviews') }}">Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('group.index') }}">Need a group?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('local_experience.index') }}">Local Experience</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blog.index') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <form method="GET" action="{{ route('packages.index') }}" class="form-inline">
                            <input type="text" name="search" placeholder="Search packages..." value="{{ request('search') }}">
                            <button type="submit">Search</button>
                        </form>
                    </li>
                </ul>

                <!-- Logout Button -->
                <form method="POST" action="{{ route('user.logout') }}" class="d-inline-block">
                    @csrf
                    <button type="submit" class="btn btn-logout">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="d-flex justify-content-end my-4 me-4">
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="ecoFilterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Filter Packages
            </button>
            <ul class="dropdown-menu" aria-labelledby="ecoFilterDropdown">
                <li><a class="dropdown-item {{ request('filter') == 'eco' ? 'active' : '' }}" href="{{ route('packages.index', ['filter' => 'eco']) }}">Eco-Friendly</a></li>
                <li><a class="dropdown-item {{ request('filter') == 'non-eco' ? 'active' : '' }}" href="{{ route('packages.index', ['filter' => 'non-eco']) }}">Non-Eco-Friendly</a></li>
                <li><a class="dropdown-item {{ request('filter') == null ? 'active' : '' }}" href="{{ route('packages.index') }}">All Packages</a></li>
            </ul>
        </div>
    </div>

    <div class="travel-packages-container">
        @foreach($packages as $package)
            <div class="travel-package">
                <h2 class="package-name">{{ $package->name }}</h2>
                <p class="package-description">{{ Str::limit($package->description, 100) }}</p> <!-- Shortened description -->
                <p class="package-price">Price: ৳{{ $package->price }}</p>
                <img class="package-image" src="data:image/jpeg;base64,{{ base64_encode($package->image) }}" alt="{{ $package->name }}">

                <a class="view-details" href="{{ route('packages.show', $package->id) }}">View Details</a>
            </div>
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
