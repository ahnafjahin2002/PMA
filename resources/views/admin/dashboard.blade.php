<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        /* Body and Layout Styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
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
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            text-align: center;
            margin-top: 20px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        .delete-btn {
            background-color: red;
            padding: 5px 10px;
            color: white;
            cursor: pointer;
        }

        .delete-btn:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>

    <!-- Sidenav (Sidebar) -->
    <div class="sidenav">
        <h3 class="text-center">Admin Panel</h3>
        <a href="{{ route('welcome') }}" class="active">Dashboard</a>
        <a href="{{ route('admin.hotel_bookings') }}">Hotel Bookings</a>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger w-100">Logout</button>
        </form>
    </div>

    <!-- Main Content Section -->
    <div class="main-content">
        <h2>Welcome to Admin Dashboard</h2>

        <p><strong>Name:</strong> {{ Auth::guard('admin')->user()->name }}</p>
        <p><strong>Email:</strong> {{ Auth::guard('admin')->user()->email }}</p>
        

        <h3>Users List</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <td>
                            <form method="POST" action="{{ route('deleteUser', $user->id) }}" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</body>
</html>
