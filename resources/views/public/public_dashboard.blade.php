<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Dashboard Template</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="dashboard.css">
  <style>
    /* General Styles */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      background-color: #f3f4f6;
    }

    /* Navbar */
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

    /* Dashboard */
    .dashboard {
      margin-top: 80px; /* Account for the fixed navbar */
      padding: 20px;
      width: 100%;
      font-size: 30;
      font-weight: bold;
    }

    .dashboard h1 {
      font-size: 40px;
      color: #bfbfbf;
      margin-bottom: 20px;
    }
    .dashboard-title{

     text-align: center;
     margin-top: 50px;
    }
    /* Cards Container */
    .card-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 50px;
      margin-top: 100px;
    }

    .card {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      padding: 20px;
      width: 100%;
      max-width: 300px;
      color: #333;
    }

    .card .card-icon {
      display: flex;
      align-items: center;
      font-size: 2em;
      color: rgb(124, 48, 48);
      margin-bottom: 15px;
    }

    .card-content {
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .navbar {
        flex-direction: column;
        align-items: center;
      }
      .card-container {
        flex-direction: column;
        align-items: center;
      }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
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
  <!-- Dashboard -->
  <div class="dashboard">
    <h1 class="dashboard-title">Dashboard</h1>
    
    <!-- Cards with Icons -->
    <div class="card-container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 p-4">
      @foreach($data as $item)
      <div class="card bg-white shadow-lg rounded-lg p-6">
          <div class="card-icon flex items-center space-x-3 text-blue-500">
              <i class="fas fa-graduation-cap text-3xl"></i> <!-- Graduation cap icon -->
              <h2 class="text-xl font-semibold">{{ $item['course_name'] }} Alumni</h2>
          </div>
          <div class="card-content mt-4 text-gray-600">
              <p class="mb-1">Total: <span class="font-semibold text-gray-800">{{ $item['total'] }}</span></p>
              <p class="mb-1">Employed: <span class="font-semibold text-gray-800">{{ $item['employed'] }}</span></p>
              <p class="mb-1">Unemployed: <span class="font-semibold text-gray-800">{{ $item['unemployed'] }}</span></p>
              <p>Self-Employed: <span class="font-semibold text-gray-800">{{ $item['self_employed'] }}</span></p>
          </div>
      </div>
      @endforeach
  </div>
  

</body>
</html>