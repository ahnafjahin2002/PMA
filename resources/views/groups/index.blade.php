<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Groups</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PMA</a>
            
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('welcome') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('packages.index') }}">Packages</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('user.bookings') }}">Bookings</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('user.reviews') }}">Reviews</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('group.index') }}">Need a group?</a></li>
                </ul>
                <form method="POST" action="{{ route('user.logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Travel Groups Cards -->
    <div class="container py-5">
        <h3 class="text-center mb-4">Travel Groups</h3>

        <div class="row">
            @foreach($groups as $group)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-header bg-primary text-white text-center">
                            <h5 class="card-title">{{ $group->name }}</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Location:</strong> {{ $group->location }}</p>
                            <p><strong>Description:</strong> {{ $group->description }}</p>
                            <p><strong>Contact:</strong> {{ $group->contact }}</p>
                            <p><strong>Cost:</strong> ৳{{ number_format($group->cost, 2) }}</p>
                        </div>
                      
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
