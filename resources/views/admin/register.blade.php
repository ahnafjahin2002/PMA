<h2>Admin Register</h2>
<form method="POST" action="{{ route('admin.register') }}">
    @csrf
    <input type="text" name="name" placeholder="Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="password" name="password_confirmation" placeholder="Confirm Password" required><br>
    <button type="submit">Register</button>
</form>
<p>Already have an account? <a href="{{ route('admin.login') }}">Login</a></p>