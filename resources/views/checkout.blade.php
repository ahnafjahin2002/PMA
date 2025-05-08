<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout | PMA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', sans-serif;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
        .checkout-card {
            background-color: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.07);
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg shadow-sm mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">PMA</a>
    </div>
</nav>

<div class="container">
    <div class="checkout-card">
        <h2 class="text-center">Checkout</h2>
        <p class="text-center"><strong>Total Amount: </strong>BDT {{ number_format($totalAmount, 2) }}</p>

        <!-- Pay Now Button (you can integrate Stripe payment button here) -->
        <form action="{{ route('checkout.createSession') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary btn-lg w-100">Pay Now</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
