<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup Form</title>
  <link rel="stylesheet" href="signup.css">
  <style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
  
body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
}

.navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #232323;
            padding: 15px 20px;
            color: #fff;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 10;
        }

        .navbar-logo img {
          height: 80px;
            width: auto;
            margin-left: 70px;
        }

        .navbar a {
            color: #ddd;
            margin-left: 20px;
            text-decoration: none;
            font-size: 16px;
        }

        .navbar a:hover {
            color: #fff;
        }
  
.signup-container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    max-width: 500px;
}
  
.signup-form {
    width: 100%;
    padding: 60px 30px;
    border-radius: 15px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    background-color: #ffffff;
    text-align: center;
}
  
.signup-form .logo {
    width: 150px;
    margin-bottom: 10px;
}
  
.signup-form .title {
    margin-bottom: 50px;
    color: #333;
}

.signup-form .title h2 {
   color: maroon;
   margin-bottom: 5px;
}

.signup-form .title h3 {
    color: rgb(172, 157, 157);
    margin-bottom: 5px;
 }
  
.signup-form input {
    width: 100%;
    padding: 18px;
    margin-bottom: 25px;
    border: 1px solid #ddd;
    border-radius: 20px;
    font-size: 16px;
    background-color: #f7f7f7;
}
  
.signup-form button {
    width: 100%;
    padding: 18px;
    border: none;
    border-radius: 25px;
    font-size: 18px;
    background-color: maroon;
    color: #ffffff;
    cursor: pointer;
    transition: background-color 0.3s;
}
  
.signup-form button:hover {
    background-color: #800000;
}
  
.login-link {
    margin-top: 30px;
    display: flex;
    justify-content: center;
    gap: 5px;
}

.login-link p {
    font-size: 16px;
    color: #333;
}

.login-link a {
    color: #005780;
    text-decoration: none;
    font-size: 16px;
}

.login-link a:hover {
    text-decoration: underline;
}

  </style>
</head>
<body>

  <div class="navbar">
    <div class="navbar-logo">
      <a href="{{ route('landingPage') }}" method="get"><!-- Add the link here -->
        <img src="{{ asset('images/logo.png') }}" alt="Alumni Logo" style="width: 100px; height: auto; max-height: 85px;">
    </a>
    </div>
    <div class="navbar-links">
        <a href="{{route('public.dashboard')}}" method="get">Dashboard</a>
        <a href="{{route('public.bsit.index')}}" method="get">BSIT Alumni</a>
        <a href="{{route('public.bshm.index')}}" method="get">BSHM Alumni</a>
        <a href="{{route('public.bsba.index')}}" method="get">BSBA Alumni</a>
        <a  href="{{route('public.beed.index')}}" method="get">BEED Alumni</a>
    </div>
</div>


  <div class="signup-container">
    <form action="{{ route('register') }}" method="POST" class="signup-form">
        @csrf
        <a href="{{ route('landingPage') }}" method="get"><!-- Add the link here -->
          <img src="{{ asset('images/logo.png') }}" alt="Alumni Logo" style="width: 100px; height: auto; max-height: 85px;">
      </a>
      <div class="title">
        <h2>Register</h2>
       
      </div>
      <input type="text" placeholder="Full Name" name="name" required>
      @error('name')
      <div style="color: red;">{{ $message }}</div>
      @enderror

      <input type="email" placeholder="Email" name="email" required>
      @error('email')
      <div style="color: red;">{{ $message }}</div>
      @enderror

      <input type="password" placeholder="Password" name="password" required>
      @error('password')
      <div style="color: red;">{{ $message }}</div>
       @enderror
            

      <input type="password" placeholder="Confirm Password" name="password_confirmation" required>
      @error('password_confirmation')
      <div style="color: red;">{{ $message }}</div>
       @enderror

      <button type="submit">Sign Up</button>
      <div class="login-link">
        <p>Already have an account?</p>
        <a href="{{route('admin.login')}}">Log in here</a>
      </div>
    </form>
  </div>
</body>
</html>