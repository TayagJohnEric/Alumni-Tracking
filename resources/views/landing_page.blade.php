<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Directory</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Navbar styling */
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
            margin-bottom: 10px;
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

        .form-button {
            padding: 8px 16px;
            background-color: #e53e3e;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
        }

        .form-button:hover {
            background-color: #c53030;
        }

        /* Fullscreen Hero section styling */
        .hero {
            background-image: url('/images/Dhvtsu.jpg'); /* Replace with your image URL */
            background-size: cover;
            background-position: center;
            height: 100vh; /* Full screen height */
            color: #fff;
            text-align: center;
            position: relative;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 700px;
            margin: 0 auto;
            top: 50%;
            transform: translateY(-50%); /* Center content vertically */
        }

        .hero h1 {
            font-size: 3em;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .hero p {
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        .hero .cta-button {
            padding: 12px 24px;
            background-color: #e53e3e;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
        }

        .hero .cta-button:hover {
            background-color: #c53030;
        }

        /* Offset main content from fixed navbar */
        .main-content {
            padding: 20px;
            margin-top: 80px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-logo">
            <a href="{{ route('admin.login') }}" method="get"><!-- Add the link here -->
                <img src="{{ asset('images/logo.png') }}" alt="Alumni Logo" style="width: 100px; height: auto; max-height: 85px;">
            </a>
        </div>    
        <div>
            <a  href="{{ route('alumniForm') }}" method="get" class="form-button">Fill-in the form as a Dhvsu Sto Tomas graduate</a>
            
        </div>
    </div>

    <!-- Fullscreen Hero Section -->
    <div class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>Welcome to the DHVSU Sto Tomas Alumni Network</h1>
            <p>Reconnect, network, and engage with fellow alumni</p>
            <a href="{{ route('public.dashboard') }}" method="get" class="cta-button">Browse Alumni Profiles</a>
        </div>
    </div>

    <!-- Main Content -->
   
</body>
</html>