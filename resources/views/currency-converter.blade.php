<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Currency Converter</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f4f4f9;
            padding: 0;
            margin: 0;
        }

        /* Navbar Styling */
        .navbar {
            background-color: rgb(243, 243, 243);
        }

        .navbar-brand {
            font-weight: bold;
            color: rgb(37, 37, 32);
        }

        .navbar-nav .nav-link {
            color: rgb(17, 16, 12);
        }

        .navbar-nav .nav-link:hover {
            color: rgb(69, 36, 146);
        }

        .navbar-nav .nav-link.active {
            color: rgb(69, 36, 146);
        }

        /* Currency Converter Section */
        .currency-converter-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 40px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .currency-converter-container h2 {
            font-size: 2rem;
            margin-bottom: 30px;
            text-align: center;
            color: #333;
        }

        .currency-converter-container input,
        .currency-converter-container select,
        .currency-converter-container button {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 1rem;
            background-color: #f9f9f9;
        }

        .currency-converter-container input,
        .currency-converter-container select {
            margin-bottom: 20px;
        }

        .currency-converter-container button {
            background-color: #007bff;
            color: white;
            border: none;
            font-weight: bold;
        }

        .currency-converter-container button:hover {
            background-color: #0056b3;
        }

        /* Converted Amount Styling */
        .converted-amount {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            margin-top: 20px;
            text-align: center;
        }

    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">HotelBooking</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.dashboard') }}">User Dashboard</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">User</a>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="{{ route('user.login') }}">Login</a></li>
                            <li><a class="dropdown-item" href="{{ route('user.register') }}">Register</a></li>
                        </ul>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.login') }}">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('destinations.index') }}">Destinations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('currency.converter') }}">Currency Converter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('weather.show') }}">Weather</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Currency Converter Section -->
<div class="currency-converter-container">
    <h2>Live Currency Converter</h2>
    <form id="currencyConverterForm">
        <input type="number" id="amount" name="amount" placeholder="Enter Amount" required>
        
        <select id="from_currency" name="from_currency">
            <option value="INR">INR</option>
            <option value="JPY">JPY</option>
            <option value="AUD">AUD</option>
            <option value="USD">USD</option>
            <option value="EUR">EUR</option>
            <option value="GBP">GBP</option>
            <option value="BDT">BDT</option>
        </select>
        
        <select id="to_currency" name="to_currency">
            <option value="INR">INR</option>
            <option value="JPY">JPY</option>
            <option value="AUD">AUD</option>
            <option value="USD">USD</option>
            <option value="EUR">EUR</option>
            <option value="GBP">GBP</option>
            <option value="BDT">BDT</option>
        </select>

        <button type="submit">Convert</button>
    </form>

    <div id="convertedAmount" class="converted-amount"></div>
</div>

<script>
    document.getElementById('currencyConverterForm').addEventListener('submit', function(event) {
        event.preventDefault();

        let amount = document.getElementById('amount').value;
        let from_currency = document.getElementById('from_currency').value;
        let to_currency = document.getElementById('to_currency').value;

        fetch('/currency-converter/convert', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                amount: amount,
                from_currency: from_currency,
                to_currency: to_currency
            })
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('convertedAmount').innerText = 'Converted Amount: ' + data.converted_amount;
        })
        .catch(error => console.error('Error:', error));
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
