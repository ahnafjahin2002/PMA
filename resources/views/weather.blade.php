<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Forecast</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f2f5;
        }

        /* Navbar Styling */
        nav {
            background-color: rgb(243, 243, 243);
        }

        .navbar-brand {
            font-weight: bold;
            color: rgb(37, 37, 32);
        }

        .navbar-nav .nav-link {
            color: rgb(17, 16, 12);
        }

        .navbar-nav .nav-link:hover {
            color: rgb(69, 36, 146);
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link.active {
            color: rgb(69, 36, 146);
        }

        /* Search Bar Styling */
        .search-bar {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .search-bar input {
            padding: 12px;
            width: 300px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
        }

        .search-bar button {
            padding: 12px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
        }

        .search-bar button:hover {
            background-color: #0056b3;
        }

        /* Weather Data Styling */
        .weather-container {
            padding: 30px;
            background-color: white;
            margin: 30px auto;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 900px;
        }

        .weather-container h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: 700;
            color: #333;
        }

        .weather-container p {
            font-size: 1.2rem;
            color: #555;
        }

        .weather-container .temp {
            font-size: 3rem;
            font-weight: 700;
            color: #ff5722;
        }

        .weather-container .forecast-container {
            margin-top: 30px;
        }

        .forecast-day {
            background-color: #f4f8fb;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .forecast-day h5 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .forecast-day .forecast-temp {
            font-size: 1.8rem;
            font-weight: 600;
            color: #007bff;
        }

        .forecast-day .forecast-condition {
            color: #555;
        }
    </style>
</head>
<body>

<!-- Navbar with Dashboard button -->
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
                        <a class="nav-link" href="{{ route('user.dashboard') }}">User Dashboard</a>
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
                    <a class="nav-link " href="{{ route('currency.converter') }}">Currency Converter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('weather.show') }}">Weather</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Search Bar Form -->
<div class="search-bar">
    <form method="GET" action="{{ url('/weather') }}">
        <input type="text" name="city" placeholder="Enter city name" value="{{ request()->input('city', 'Dhaka') }}">
        <button type="submit">Search</button>
    </form>
</div>

<!-- Weather Data -->
<div class="weather-container">
    <h1>Weather Forecast for {{ $weatherData['location']['name'] }}</h1>

    <!-- Current Weather -->
    <p><strong>Condition:</strong> {{ $weatherData['current']['condition']['text'] }}</p>
    <p class="temp">{{ $weatherData['current']['temp_c'] }}°C</p>
    <p><strong>Humidity:</strong> {{ $weatherData['current']['humidity'] }}%</p>
    <p><strong>Wind Speed:</strong> {{ $weatherData['current']['wind_kph'] }} kph</p>

    <!-- 3-Day Forecast -->
    <div class="forecast-container">
        <h3>3-Day Forecast</h3>
        @foreach ($forecastData['forecast']['forecastday'] as $day)
            <div class="forecast-day">
                <h5>{{ $day['date'] }}</h5>
                <p class="forecast-temp">{{ $day['day']['avgtemp_c'] }}°C</p>
                <p class="forecast-condition">{{ $day['day']['condition']['text'] }}</p>
            </div>
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
