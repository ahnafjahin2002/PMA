<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- ✅ Navbar should be inside <body> -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PMA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="{{ route('welcome') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('user.login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Registration Form -->
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow p-4" style="width: 100%; max-width: 450px;">
            <h3 class="text-center mb-4">📝 User Registration</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('user.register') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">👤 Full Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter your full name" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">📧 Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email address" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">🏠 Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter your address" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">📞 Phone Number</label>
                    <input type="text" name="phone" class="form-control" placeholder="Enter your phone number" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">🔒 Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Create a password" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">🔒 Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Re-type your password" required>
                </div>

                <button type="submit" class="btn btn-success w-100">Register</button>
            </form>

            <div class="mt-3 text-center">
                <small>Already have an account? <a href="{{ route('user.login') }}">Login here</a></small>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
