<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PMA</a>
           
            
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('welcome') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('packages.index') }}">Packages</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('user.bookings') }}">Bookings</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('user.reviews') }}">Reviews</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('group.index') }}">Need a group?</a></li> 
                    <li class="nav-item"><a class="nav-link" href="{{ route('local_experience.index') }}">Local experience</a></li> 
                    <li class="nav-item"><a class="nav-link active" href="{{ route('blog.index') }}">Blog</a></li>
                </ul>
                <form method="POST" action="{{ route('user.logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Logout</button>
                </form>
            </div>
        </div>
    </nav>





    <div class="container mt-4">
        <h1>Blog Posts</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @auth
            <a href="{{ route('blog.create') }}" class="btn btn-primary mb-3">Write a New Post</a>
        @endauth

        @forelse ($posts as $post)
            <div class="card mb-3">
                <div class="card-header">
                    <strong>{{ $post->user->name }}</strong> - <small>{{ $post->created_at->format('d M Y h:i A') }}</small>
                </div>
                <div class="card-body">
                    <h5>{{ $post->title }}</h5>
                    <p>{{ $post->content }}</p>
                </div>
            </div>
        @empty
            <p>No blog posts yet.</p>
        @endforelse
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
