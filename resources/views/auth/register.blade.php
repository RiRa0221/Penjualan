<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('auth/style.css') }}">
</head>
<body>
  <div class="wrapper">
    <form method="POST" action="{{ route('register') }}">
      @csrf
      <h2>Register</h2>
      <div class="input-field">
        <input type="text" id="username" name="username" required>
        <label for="username">Username</label>
      </div>
      <div class="input-field">
        <input type="text" id="name" name="name" required>
        <label for="name">Name</label>
      </div>
      <div class="input-field">
        <input type="email" id="email" name="email" required>
        <label for="email">Email</label>
      </div>
      <div class="input-field">
        <input type="text" id="alamat" name="alamat" required>
        <label for="alamat">Alamat</label>
      </div>
      <div class="input-field">
        <input type="password" id="password" name="password" required>
        <label for="password">Password</label>
      </div>
      <div class="input-field">
        <input type="password" id="password_confirmation" name="password_confirmation" required>
        <label for="password_confirmation">Konfirmasi Password</label>
      </div>
      <button type="submit">Register</button>
      <div class="register">
        <p>Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
      </div>
    </form>
  </div>
</body>
</html>