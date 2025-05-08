<!-- resources/views/local_experience/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local Experiences in Bangladesh</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('welcome') }}">PMA</a>
           
            
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('user.dashboard') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('packages.index') }}">Packages</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('user.bookings') }}">Bookings</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('user.reviews') }}">Reviews</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('group.index') }}">Need a group?</a></li> 
                    <li class="nav-item"><a class="nav-link active" href="{{ route('local_experience.index') }}">Local experience</a></li> 
                    <li class="nav-item"><a class="nav-link" href="{{ route('blog.index') }}">Blog</a></li>
                </ul>
                <form method="POST" action="{{ route('user.logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Search Form -->
    <div class="container mt-5">
        <h1 class="text-center">Travel Destinations and Attractions in Bangladesh</h1>

        <!-- Search Form -->
        <form action="{{ route('local_experience.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Search by destination or attraction..." value="{{ request()->get('query') }}">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>

        <!-- Check if there are any destinations and attractions -->
        @if($localExperiences->isEmpty())
            <p>No destinations or attractions found.</p>
        @else
            <div class="row">
                @foreach($localExperiences as $experience)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm border-0">
                        <img src="data:image/jpeg;base64,{{ base64_encode($experience->image) }}" alt="Image" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $experience->destination }} - {{ $experience->attraction }}</h5>
                                <p class="card-text">{{ $experience->description }}</p>
                                
                                <!-- Book Local Experience Button -->
                                <a href="{{ route('local_experience.book', $experience->id) }}" class="btn btn-success">Book This Experience</a>
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
