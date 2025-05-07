<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Bookings | PMA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }
        .navbar {
            background-color: #ffffff;
        }
        .navbar-brand {
            font-weight: bold;
            color: #0d6efd !important;
        }
        .nav-link {
            color: #333;
            font-weight: 500;
        }
        .nav-link.active, .nav-link:hover {
            color: #0d6efd !important;
        }
        .table th {
            background-color: #0d6efd;
            color: white;
        }
        .section-title {
            font-weight: 600;
            color: #0d6efd;
            border-left: 4px solid #0d6efd;
            padding-left: 10px;
            margin-bottom: 20px;
        }
        .card-container {
            background-color: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.07);
        }
        .alert {
            font-weight: 500;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg shadow-sm mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">PMA</a>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('welcome') }}">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('packages.index') }}">Packages</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ route('user.bookings') }}">Bookings</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('user.reviews') }}">Reviews</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('group.index') }}">Need a group?</a></li>
            </ul>
            <form method="POST" action="{{ route('user.logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-danger ms-3">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="container mb-5">
    <!-- Hotel Bookings -->
    <div class="card-container mb-5">
        <h2 class="section-title">My Hotel Bookings</h2>
        @if($bookings->isEmpty())
            <div class="alert alert-info">You don’t have any hotel bookings yet.</div>
        @else
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Hotel Name</th>
                        <th>No. of Guests</th>
                        <th>Rooms</th>
                        <th>Check-In</th>
                        <th>Check-Out</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Booked On</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                        <tr>
                            <td>{{ $booking->hotel_id }}</td>
                            <td>{{ $booking->number_of_guests }}</td>
                            <td>{{ $booking->number_of_rooms }}</td>
                            <td>{{ $booking->checkin_date }}</td>
                            <td>{{ $booking->checkout_date }}</td>
                            <td>{{ $booking->total_amount }}</td>
                            <td>{{ ucfirst($booking->status) }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->created_at)->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- Local Experience Bookings -->
    <div class="card-container">
        <h2 class="section-title">My Local Experience Bookings</h2>
        @if($localExperienceBookings->isEmpty())
            <div class="alert alert-info">You don’t have any local experience bookings yet.</div>
        @else
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Experience</th>
                        <th>Destination</th>
                        <th>Booking Date</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Booked On</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($localExperienceBookings as $experience)
                        <tr>
                            <td>{{ $experience->localExperience->attraction ?? 'N/A' }}</td>
                            <td>{{ $experience->localExperience->destination ?? 'N/A' }}</td>
                            <td>{{ $experience->booking_date }}</td>
                            <td>{{ $experience->email }}</td>
                            <td>{{ $experience->mobile_number }}</td>
                            <td>{{ \Carbon\Carbon::parse($experience->created_at)->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
