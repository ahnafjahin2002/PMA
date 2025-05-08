<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Reviews - PMA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f0f2f5;
        }
        .review-card {
            margin-bottom: 25px;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .review-card-header {
            background-color: #007bff;
            color: white;
            font-size: 1.1em;
            font-weight: 600;
            padding: 12px 20px;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }
        .review-card-body {
            padding: 20px;
        }
        .review-title {
            font-size: 1.25em;
            font-weight: 600;
        }
        .star {
            color: #ccc;
            font-size: 1.2rem;
        }
        .star.filled {
            color: #ffc107;
        }
        .form-label {
            font-weight: 600;
        }
        h2, h3 {
            font-weight: bold;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">PMA</a>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('welcome') }}">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('packages.index') }}">Packages</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('user.bookings') }}">Bookings</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ route('user.reviews') }}">Reviews</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('group.index') }}">Need a group?</a></li>
            </ul>
            <form method="POST" action="{{ route('user.logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-danger">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="container">
    <h2 class="mb-4">Write a Review</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('user.reviews.store') }}" class="mb-5">
        @csrf
        <div class="mb-3">
            <label class="form-label">Select Hotel</label>
            <select name="hotel_id" class="form-control" required>
                <option value="" disabled selected>Select a hotel</option>
                @foreach($hotels as $hotel)
                    <option value="{{ $hotel->hotel_id }}">
                        {{ $hotel->hotel_name }} (ID: {{ $hotel->hotel_id }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Rating</label>
            <div id="star-rating" class="mb-2">
                @for($i = 1; $i <= 5; $i++)
                    <span class="star" data-value="{{ $i }}">&#9733;</span>
                @endfor
            </div>
            <input type="hidden" name="rating" id="rating-value" required>
        </div>


        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit Review</button>
    </form>

    <h3 class="mb-4">Other Users' Reviews</h3>

    @forelse($reviews as $review)
        <div class="card review-card">
            <div class="review-card-header">
                {{ $review->hotel ? $review->hotel->hotel_name : 'Hotel not found' }} - Rated: {{ $review->rating }}/5
            </div>
            <div class="card-body review-card-body">
                <h5 class="review-title">{{ $review->title }}</h5>
                <p>
                    @for ($i = 1; $i <= 5; $i++)
                        <span class="star {{ $i <= $review->rating ? 'filled' : '' }}">&#9733;</span>
                    @endfor
                </p>
                <p class="text-muted">By <strong>{{ $review->user->name ?? 'Anonymous' }}</strong> on {{ $review->created_at->format('d M Y h:i A') }}</p>
                <p class="review-description">{{ $review->description }}</p>
            </div>
        </div>
    @empty
        <p class="text-muted">No reviews yet.</p>
    @endforelse
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stars = document.querySelectorAll('#star-rating .star');
        const ratingInput = document.getElementById('rating-value');

        stars.forEach(star => {
            star.addEventListener('click', function () {
                const rating = this.getAttribute('data-value');
                ratingInput.value = rating;

                stars.forEach(s => {
                    s.classList.remove('filled');
                    if (s.getAttribute('data-value') <= rating) {
                        s.classList.add('filled');
                    }
                });
            });
        });
    });
</script>

</body>


</html>
