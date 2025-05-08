<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Hotel Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
 /* Sidenav Styling */
 .sidenav {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333;
            padding-top: 20px;
            color: white;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            padding-left: 15px; /* Added padding to prevent text from going out of bounds */
        }

        .sidenav h3 {
            font-size: 1.5rem;
            color: white;
            margin-left: 15px; /* Ensures the text is aligned properly */
            margin-bottom: 20px;
        }

        .sidenav a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 1.2rem;
            color: white;
            display: block;
            margin-left: 15px;
        }

        .sidenav a:hover {
            background-color: #575757;
        }

        .sidenav .active {
            background-color: #007bff;
        }

        /* Main Content Styling */
        .main-content {
            margin-left: 260px;
            padding: 30px;
        }

        h2 {
            color: #333;
            text-align: center;
            padding-top: 20px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        td {
            font-size: 1rem;
            color: #555;
        }

        td select {
            background-color: #f9f9f9;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 1rem;
        }

        td select:focus {
            border-color: #007bff;
            outline: none;
        }

        form {
            text-align: center;
            margin-top: 20px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        .alert {
            text-align: center;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .delete-btn {
            background-color: red;
            padding: 5px 10px;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            font-size: 1rem;
        }

        .delete-btn:hover {
            background-color: darkred;
        }

        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .sidenav {
                width: 200px;
            }

            .main-content {
                margin-left: 210px;
            }

            table {
                width: 100%;
            }

            th, td {
                font-size: 0.9rem;
            }

            td select {
                font-size: 0.9rem;
                padding: 6px;
            }
        }
    </style>
</head>
<body>

    <!-- Sidenav (Sidebar) -->
    <div class="sidenav">
        <h3 class="text-center">Admin Panel</h3>
        <a href="{{ route('admin.dashboard') }}" >Dashboard</a>
        <a href="{{ route('admin.hotel_bookings') }}"class="active">Hotel Bookings</a>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger w-100">Logout</button>
        </form>
       
    </div>

    <!-- Main Content Section -->
    <div class="main-content">
        <h2>All Hotel Bookings</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        
            <script>
                setTimeout(function() {
                    window.open("{{ route('test.email', ['bookingId' => session('booking_id')]) }}", "_blank");
                }, 2000);
            </script>
        @endif

        @if($bookings->isEmpty())
            <div class="alert alert-info">No bookings found.</div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Hotel ID</th>
                        <th>Guests</th>
                        <th>Rooms</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Status</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->user_id }}</td>
                            <td>{{ $booking->hotel_id }}</td>
                            <td>{{ $booking->number_of_guests }}</td>
                            <td>{{ $booking->number_of_rooms }}</td>
                            <td>{{ $booking->checkin_date }}</td>
                            <td>{{ $booking->checkout_date }}</td>
                            <td>
                                <form action="{{ route('admin.update_booking_status', $booking->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                                        <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="in-progress" {{ $booking->status === 'in-progress' ? 'selected' : '' }}>In Progress</option>
                                        <option value="completed" {{ $booking->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                    </select>
                                </form>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($booking->created_at)->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

</body>
</html>
