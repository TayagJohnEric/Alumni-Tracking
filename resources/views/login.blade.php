<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
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
    background-color: hsl(0, 0%, 98%);
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
  
.login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    max-width: 500px; /* Increased max-width */
}
  
.login-form {
    width: 100%;
    padding: 60px 30px; /* Increased padding for more height */
    border-radius: 15px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    background-color: #ffffff;
    text-align: center;
}
  
.login-form .logo {
    width: 150px; /* Slightly larger logo */
    margin-bottom: 10px;
}
  
.login-form .title {
    margin-bottom: 50px; /* Adjusted margin for more space below the title */
    color: #333;
}

.login-form .title h2{
   color: maroon;
   margin-bottom: 5px;

}

.login-form .title h3{
    color: rgb(186, 174, 174);
    margin-bottom: 5px;
 
 }
  
.login-form input {
    width: 100%;
    padding: 18px; /* Slightly larger input padding */
    margin-bottom: 25px; /* Space below input fields */
    border: 1px solid #ddd;
    border-radius: 20px;
    font-size: 16px;
    background-color:  #f7f7f7;
}
  
.login-form button {
    width: 100%;
    padding: 18px;
    border: none;
    border-radius: 25px;
    font-size: 18px; /* Larger button text */
    background-color: maroon;
    color: #ffffff;
    cursor: pointer;
    transition: background-color 0.3s;
}
  
.login-form button:hover {
    background-color: #800000;
}
  
.signup-link {
    margin-top: 30px; /* Increased margin for more space above signup link */
    display: flex;
    justify-content: center; /* Center-aligns the signup link section */
    gap: 5px;
}

.signup-link p {
    font-size: 16px;
    color: #333;
}

.signup-link a {
    color: #005780;
    text-decoration: none;
    font-size: 16px;
}

.signup-link a:hover {
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



  <div class="login-container">
    <form action="{{ route('login') }}" method="POST" class="login-form">
      @csrf
      <a href="{{ route('landingPage') }}" method="get"><!-- Add the link here -->
        <img src="{{ asset('images/logo.png') }}" alt="Alumni Logo" style="width: 100px; height: auto; max-height: 85px;">
    </a>
      <div class="title">
        <h2>Welcome Back</h2>
       
      </div>
      <input type="email" placeholder="Email" name="email" value="{{ old('email') }}" required>
      @error('email')
          <div style="color: red;">{{ $message }}</div>
      @enderror
  
      <input type="password" placeholder="Password" name="password" required>
      @error('password')
          <div style="color: red;">{{ $message }}</div>
      @enderror
      <button type="submit">Login</button>
      <div class="signup-link">
        <p>Dont have an account? </p>
        <a href="{{route('admin.register.form')}}">Create an account</a>
      </div>
    </form>
  </div>
</body>
</html>