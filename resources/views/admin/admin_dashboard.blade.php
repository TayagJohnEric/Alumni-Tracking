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
    min-height: 100vh;
    background-color: #f3f4f6;
  }
  
  /* Sidebar */
  .sidebar {
    width: 250px;
    background-color: rgb(35, 35, 35);
    color: #fff;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px 0;
    position: fixed;
    height: 100vh;
  }
  
  .sidebar .logo img {
    width: 120px;
    margin-bottom: 30px;
  }
  
  .sidebar a {
    color: #fff;
    font-size: 18px;
    text-decoration: none;
    padding: 10px 20px;
    width: 100%;
    text-align: left;
    display: flex;
    align-items: center;
    margin: 5px 0;
    border-radius: 20px;
  }
  
  .sidebar a:hover {
    background-color: rgb(134, 20, 20);
  }
  
  .sidebar i {
    margin-right: 10px;
  }
  
  .logout-btn{

 
    
  }

  .profile-card {
             display: flex;
             align-items: center;
             background-color: #fff;
             padding: 15px;
             border-radius: 8px;
             box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
             max-width: 300px;
             position: absolute;
             top: 20px; /* Distance from the top */
             right: 20px; /* Distance from the right */
             z-index: 10;
        }
  
        .profile-card img {
             width: 50px;
             height: 50px;
             border-radius: 50%;
             margin-right: 15px;
        }
  
        .profile-card .profile-user h3 {
             font-size: 18px;
             margin-bottom: 5px;
             color: #333;
        }
  
  /* Dashboard */
  .dashboard {
    margin-left: 250px;
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
  
  .card .card-icon h2 {
    font-size: 18px;
    color: #555;
    margin-left: 10px;
  }
  
  .card-content {
    display: flex;
    flex-direction: column;
    gap: 8px;
  }
  
  .card-content p {
    font-size: 16px;
    color: #333;
    display: flex;
    justify-content: space-between;
  }
  
  .card-content p span {
    font-weight: bold;
  }
  
 
  /* Responsive Design */
  @media (max-width: 768px) {
    .sidebar {
      width: 100%;
      height: auto;
      position: relative;
      padding: 10px 0;
    }
  
    .dashboard {
      margin-left: 0;
      padding: 10px;
    }
  
    .card-container {
      flex-direction: column;
      align-items: center;
    }
  }
  
  </style>
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar bg-gray-800 text-white w-64 h-full flex flex-col p-4 space-y-4">
    <div class="logo flex items-center justify-center mb-6">
        <img src="{{ asset('images/logo.png') }}" alt="Alumni Logo" style="width: 100px; height: auto; max-height: 85px;">
    </div>
    <a href="{{ route('admin.dashboard') }}" method="get" class="flex items-center space-x-3 py-2 px-4 rounded-lg hover:bg-gray-700">
        <i class="fas fa-home text-lg"></i>
        <span>Dashboard</span>
    </a>
    <a href="{{ route('admin.bsit.index') }}" method="get" class="flex items-center space-x-3 py-2 px-4 rounded-lg hover:bg-gray-700">
        <i class="fas fa-laptop-code text-lg"></i>
        <span>BSIT Alumni</span>
    </a>
    <a href="{{ route('admin.bshm.index') }}" method="get" class="flex items-center space-x-3 py-2 px-4 rounded-lg hover:bg-gray-700">
        <i class="fas fa-utensils text-lg"></i>
        <span>BSHM Alumni</span>
    </a>
    <a href="{{ route('admin.beed.index') }}" method="get" class="flex items-center space-x-3 py-2 px-4 rounded-lg hover:bg-gray-700">
        <i class="fas fa-chalkboard-teacher text-lg"></i>
        <span>BEED Alumni</span>
    </a>
    <a href="{{ route('admin.bsba.index') }}" method="get" class="flex items-center space-x-3 py-2 px-4 rounded-lg hover:bg-gray-700">
        <i class="fas fa-business-time text-lg"></i>
        <span>BSBA Alumni</span>
    </a>
    <a href="{{ route('admin.manage.account') }}" method="get" class="flex items-center space-x-3 py-2 px-4 rounded-lg hover:bg-gray-700">
        <i class="fas fa-user text-lg"></i>
        <span>Manage Account</span>
    </a>
    <!-- Logout Button at the Bottom -->
    <a href="{{ route('admin.settings') }}" method="get" class="flex items-center space-x-3 py-2 px-4 rounded-lg hover:bg-gray-700">
      <i class="fas fa-cog text-lg"></i>
      <span>Settings</span>
  </a>
</div>
  
    
  <div class="profile-card flex items-center p-4 bg-white rounded-lg shadow-lg space-x-4">
    <img src="https://via.placeholder.com/50" alt="User Profile" class="w-16 h-16 rounded-full">
    <div class="profile-user">
      <h3 class="text-lg font-semibold text-gray-800">{{Auth::user()->name}}</h3>
      <p class="text-sm text-gray-500">Admin</p>
    </div>
  </div>
  
  
  <!-- Dashboard -->
  <div class="dashboard">
    <h1 class="dashboard-title">Dashboard</h1>
    
    
    <!-- Cards with Icons -->
    <!-- Data Analystics -->
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