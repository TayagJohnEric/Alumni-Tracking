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
  .card {
    display: block;
    padding: 20px;
    border: 1px solid rgb(206, 206, 206);
    border-radius: 10px;
    color: rgb(74, 74, 74);
    text-decoration: none;
    cursor: pointer;
    transition: background-color 0.2s, border-color 0.2s;
    width: 100%; /* Make sure it fills the parent */
}

.card:hover {
    background-color: rgb(134, 20, 20); /* Light green background */
    border-color: rgb(134, 20, 20); /* Green border */
    color: white;
}
  button {
    border: none;
    background: none;
    padding: 0;
}

/* Make the card (button) wider */
#cancel-appointment {
    display: flex;
    align-items: center;
    width: 100%; /* Make the button fill the available width */
    max-width: 400px; /* Optional: Set a maximum width if desired */
    margin-top: 15px;
}

#cancel-appointment i {
    margin-right: 10px; /* Space between the icon and text */
}
  
  
  /* Cards Container */
  
  
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
      <h3 class="text-lg font-semibold text-gray-800">Jonathan S.</h3>
      <p class="text-sm text-gray-500">Admin</p>
    </div>
  </div>
  
  
  <!-- Dashboard -->
  <div class="dashboard">
    <h1>Settings</h1>

    

    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button id="cancel-appointment" class="card">
            <i class="fas fa-sign-out-alt"></i>
            <p>Log Out</p>
        </button>
    </form>
  </div>
    
</body>
</html>