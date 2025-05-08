<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9;
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            background-color:rgb(223, 227, 231);
        }
        .navbar-brand {
            font-weight: bold;
            color: Black;
        }
        .navbar-nav .nav-link {
            color: Black;
        }
        .navbar-nav .nav-link:hover {
            color: #ffd700;
        }
        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            padding: 15px;
            font-size: 1.25rem;
        }
        .card-body {
            padding: 20px;
        }
        .card-body p {
            font-size: 1.1rem;
        }
        .btn-logout {
            background-color: #dc3545;
            color: white;
            border-radius: 10px;
        }
        .btn-logout:hover {
            background-color: #c82333;
        }
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PMA</a>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="{{ route('welcome') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('packages.index') }}">Packages</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('user.bookings') }}">Bookings</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('user.reviews') }}">Reviews</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('group.index') }}">Need a group?</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('local_experience.index') }}">Local Experience</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('blog.index') }}">Blog</a></li>
                </ul>
                <form method="POST" action="{{ route('user.logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-logout">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-header text-center">
                        Welcome, {{ Auth::user()->name }}!
                    </div>
                    <div class="card-body">
                        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                        @if (Auth::user()->phone)
                            <p><strong>Phone:</strong> {{ Auth::user()->phone }}</p>
                        @endif
                        @if (Auth::user()->address)
                            <p><strong>Address:</strong> {{ Auth::user()->address }}</p>
                        @endif
                        <p class="text-muted mt-4">You are logged in. Use the navigation above to explore more.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
