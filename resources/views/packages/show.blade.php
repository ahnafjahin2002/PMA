<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Package Details</title>
    <style>
        /* Basic Reset */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f9fc;
        }

        /* Navbar Styling */
        nav {
            background-color: #007bff;
            padding: 15px 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        nav ul li {
            margin-right: 30px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 1.1rem;
            font-weight: 600;
        }

        nav ul li a:hover {
            color: #0056b3;
            transition: color 0.3s ease;
        }

        /* Page Content */
        .package-details {
            padding: 30px;
            background-color: white;
            margin: 30px auto;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            font-size: 1.1rem;
        }

        .package-details h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: 700;
            color: #333;
        }

        .package-details p {
            color: #555;
            margin: 15px 0;
        }

        .package-details img {
            width: 100%;
            max-width: 700px;
            height: auto;
            border-radius: 10px;
            margin-top: 25px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .package-details .price {
            font-size: 1.5rem;
            font-weight: bold;
            color: #007bff;
            margin-top: 10px;
        }

        /* Dashboard Button */
        .dashboard-btn {
            display: inline-block;
            text-decoration: none;
            padding: 12px 25px;
            background-color: #28a745;
            color: white;
            font-weight: bold;
            border-radius: 50px;
            margin-top: 20px;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .dashboard-btn:hover {
            background-color: #218838;
            transition: background-color 0.3s ease;
        }

        .dashboard-btn:active {
            background-color: #1e7e34;
        }

    </style>
</head>
<body>

    <!-- Navbar -->
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>
    </nav>

    <!-- Package Details Section -->
    <div class="package-details">
        <h1>{{ $package->name }}</h1>
        <p>{{ $package->description }}</p>
        <p class="price">Price: ৳{{ $package->price }}</p>
        
        @if ($package->image)
            <!-- Display Image using Base64 encoding -->
            <img class="package-image" src="data:image/jpeg;base64,{{ base64_encode($package->image) }}" alt="{{ $package->name }}">
        @else
            <p class="text-center text-muted">No Image Available</p>
        @endif

        <!-- Dashboard Button -->
        <a href="{{ route('packages.index') }}" class="dashboard-btn">Go to Packages</a>
    </div>

</body>
</html>
