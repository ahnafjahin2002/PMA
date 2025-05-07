<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color:rgb(252, 254, 255);
        }
        .login-title {
            font-size: 2rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 30px;
            color: #000;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        }
        .login-card {
            background: #fff;
            border-radius: 15px;
            border: 1px solidrgb(80, 111, 141);
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            padding: 2rem;
        }
        .custom-navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color:rgba(255, 255, 255, 0.97);
            padding: 15px 30px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
        }

        .custom-navbar .nav-left {
            font-weight: bold;
            font-size: 1.5rem;
            color: #000;
        }
        
        .custom-navbar .nav-right a {
            text-decoration: none;
            color:rgba(5, 5, 5, 0.81);
            font-weight: 600;
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        .custom-navbar .nav-right a:hover {
            color: #0056b3;
        }

    </style>
</head>



<body>

    <nav class="custom-navbar">
        <div class="nav-left">HotelBooking</div>
        <div class="nav-right">
            <a href="{{ route('welcome') }}">Dashboard</a>
        </div>
    </nav>


    <div class="container mt-5 d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-6 col-lg-5">
            <div class="login-card">
                <div class="login-title"> User Login</div>

                @if (session('error'))
                    <div class="alert alert-danger text-center">{{ session('error') }}</div>
                @endif

                <form method="POST" action="{{ route('user.login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label"> Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label"> Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>

                <div class="mt-3 text-center">
                    <small>Don't have an account? <a href="{{ route('user.register') }}">Register here</a></small>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    
</body>
</html>
