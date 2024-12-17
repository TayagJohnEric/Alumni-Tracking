<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Aesthetic Student Information Table with Sidebar</title>
    <style>
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
            color: #333;
            margin: 0;
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

        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
        }
         
        /* Profile Card */
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

           /* Search bar styling */
           .search-container {
    display: flex;
    justify-content: flex-start;
    position: relative;
    margin-bottom: 20px;
}

/* Input field */
.search-input {
    padding: 10px 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 100%;
    max-width: 350px; /* Adjust the width as needed */
    font-size: 16px;
}

/* Button styling */
.search-btn {
    padding: 10px 20px;
    margin-left: 10px; /* Space between input and button */
    background-color: #34d399; /* Green background */
    border: none;
    border-radius: 5px;
    color: white;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.search-btn:hover {
    background-color: #10b981; /* Darker green when hovered */
}

/* Optional: Icon inside search bar */
.search-container i {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    color: #aaa;
}


        /*   Table   */


        .table-container {
            margin-top: 50px;
            width: 100%;
            overflow-x: auto;
            border-radius: 10px;
        }

        .table-container h2{

            font-size: 40px;
            font-weight: bold;
            color: rgb(189, 189, 189);

        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            border-radius: 10px;
            overflow: hidden;
        }

        thead {
            background-color: rgb(121, 31, 31);
            color: #ffffff;
        }

        th, td {
            padding: 12px 16px;
            text-align: left;
        }

        th {
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
        }

        tbody tr {
            background-color: #f9fafb;
            border-bottom: 1px solid #e5e7eb;
        }

        tbody tr:nth-child(even) {
            background-color: #eef2f7;
        }

        tbody tr:hover {
            background-color: #e0e7ff;
        }
        .btns{

            display: flex;
        }

        .action-btn {
            padding: 6px 12px;
            margin: 0 2px;
            border: none;
            border-radius: 6px;
            color: #ffffff;
            cursor: pointer;
            font-size: 12px;
            transition: background-color 0.3s ease;
        }

        .view-btn { background-color: #34d399; }
        .view-btn:hover { background-color: #10b981; }
        
        .update-btn { background-color: #3b82f6; }
        .update-btn:hover { background-color: #2563eb; }
        
        .delete-btn { background-color: #f87171; }
        .delete-btn:hover { background-color: #ef4444; }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar bg-gray-800 text-white w-64 h-full flex flex-col p-4 space-y-4">
        <div class="logo flex items-center justify-center mb-6">
            <img src="{{ asset('images/logo.png') }}" alt="Alumni Logo" style="width: 100px; height: auto; max-height: 85px;">
    
        </div>
        <a href="{{route('admin.dashboard')}}" method="get" class="flex items-center space-x-3 py-2 px-4 rounded-lg hover:bg-gray-700">
          <i class="fas fa-home text-lg"></i>
          <span>Dashboard</span>
        </a>
        <a href="{{route('admin.bsit.index')}}" method="get" class="flex items-center space-x-3 py-2 px-4 rounded-lg hover:bg-gray-700">
          <i class="fas fa-laptop-code text-lg"></i>
          <span>BSIT Alumni</span>
        </a>
        <a href="{{route('admin.bshm.index')}}" method="get" class="flex items-center space-x-3 py-2 px-4 rounded-lg hover:bg-gray-700">
          <i class="fas fa-utensils text-lg"></i>
          <span>BSHM Alumni</span>
        </a>
        <a href="{{route('admin.beed.index')}}" method="get" class="flex items-center space-x-3 py-2 px-4 rounded-lg hover:bg-gray-700">
          <i class="fas fa-chalkboard-teacher text-lg"></i>
          <span>BEED Alumni</span>
        </a>
        <a href="{{route('admin.bsba.index')}}" method="get" class="flex items-center space-x-3 py-2 px-4 rounded-lg hover:bg-gray-700">
          <i class="fas fa-business-time text-lg"></i>
          <span>BSBA Alumni</span>
        </a>
        <a href="{{route('admin.manage.account')}}" method="get" class="flex items-center space-x-3 py-2 px-4 rounded-lg hover:bg-gray-700">
          <i class="fas fa-user text-lg"></i>
          <span>Manage Account</span>
        </a>
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
      

   

    <!-- Main Content -->
   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Aesthetic Student Information Table with Sidebar</title>
    <style>
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
            color: #333;
            margin: 0;
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

        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
        }
         
        /* Profile Card */
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

           /* Search bar styling */
           .search-container {
    display: flex;
    justify-content: flex-start;
    position: relative;
    margin-bottom: 20px;
}

/* Input field */
.search-input {
    padding: 10px 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 100%;
    max-width: 350px; /* Adjust the width as needed */
    font-size: 16px;
}

/* Button styling */
.search-btn {
    padding: 10px 20px;
    margin-left: 10px; /* Space between input and button */
    background-color: #34d399; /* Green background */
    border: none;
    border-radius: 5px;
    color: white;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.search-btn:hover {
    background-color: #10b981; /* Darker green when hovered */
}

/* Optional: Icon inside search bar */
.search-container i {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    color: #aaa;
}


        /*   Table   */


        .table-container {
            margin-top: 50px;
            width: 100%;
            overflow-x: auto;
            border-radius: 10px;
        }

        .table-container h2{

            font-size: 40px;
            font-weight: bold;
            color: rgb(189, 189, 189);

        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            border-radius: 10px;
            overflow: hidden;
        }

        thead {
            background-color: rgb(121, 31, 31);
            color: #ffffff;
        }

        th, td {
            padding: 12px 16px;
            text-align: left;
        }

        th {
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
        }

        tbody tr {
            background-color: #f9fafb;
            border-bottom: 1px solid #e5e7eb;
        }

        tbody tr:nth-child(even) {
            background-color: #eef2f7;
        }

        tbody tr:hover {
            background-color: #e0e7ff;
        }
        .btns{

            display: flex;
        }

        .action-btn {
            padding: 6px 12px;
            margin: 0 2px;
            border: none;
            border-radius: 6px;
            color: #ffffff;
            cursor: pointer;
            font-size: 12px;
            transition: background-color 0.3s ease;
        }

        .view-btn { background-color: #34d399; }
        .view-btn:hover { background-color: #10b981; }
        
        .update-btn { background-color: #3b82f6; }
        .update-btn:hover { background-color: #2563eb; }
        
        .delete-btn { background-color: #f87171; }
        .delete-btn:hover { background-color: #ef4444; }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar bg-gray-800 text-white w-64 h-full flex flex-col p-4 space-y-4">
        <div class="logo flex items-center justify-center mb-6">
            <img src="{{ asset('images/logo.png') }}" alt="Alumni Logo" style="width: 100px; height: auto; max-height: 85px;">
    
        </div>
        <a href="{{route('admin.dashboard')}}" method="get" class="flex items-center space-x-3 py-2 px-4 rounded-lg hover:bg-gray-700">
          <i class="fas fa-home text-lg"></i>
          <span>Dashboard</span>
        </a>
        <a href="{{route('admin.bsit.index')}}" method="get" class="flex items-center space-x-3 py-2 px-4 rounded-lg hover:bg-gray-700">
          <i class="fas fa-laptop-code text-lg"></i>
          <span>BSIT Alumni</span>
        </a>
        <a href="{{route('admin.bshm.index')}}" method="get" class="flex items-center space-x-3 py-2 px-4 rounded-lg hover:bg-gray-700">
          <i class="fas fa-utensils text-lg"></i>
          <span>BSHM Alumni</span>
        </a>
        <a href="{{route('admin.beed.index')}}" method="get" class="flex items-center space-x-3 py-2 px-4 rounded-lg hover:bg-gray-700">
          <i class="fas fa-chalkboard-teacher text-lg"></i>
          <span>BEED Alumni</span>
        </a>
        <a href="{{route('admin.bsba.index')}}" method="get" class="flex items-center space-x-3 py-2 px-4 rounded-lg hover:bg-gray-700">
          <i class="fas fa-business-time text-lg"></i>
          <span>BSBA Alumni</span>
        </a>
        <a href="{{route('admin.manage.account')}}" method="get" class="flex items-center space-x-3 py-2 px-4 rounded-lg hover:bg-gray-700">
          <i class="fas fa-user text-lg"></i>
          <span>Manage Account</span>
        </a>
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
      

   

    <!-- Main Content -->
    <div class="main-content">

       
    
        <div class="table-container">
            <h2>BSIT Information Table</h2>
            <div class="search-container">
                <form action="{{ route('admin.bsit.index') }}" method="get" class="flex items-center">
                    <input name="search" type="text" id="searchBar" placeholder="Search Alumni..." class="search-input">
                    <button type="submit" class="search-btn">Search</button>
                </form>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Batch</th>
                        <th>Employment Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($course->alumni as $alumnus)
                    <tr>
                        <td>{{ $alumnus->fullname }}</td>
                        <td>{{ $alumnus->age }}</td>
                        <td>{{ $alumnus->sex }}</td>
                        <td>{{ $alumnus->dob }}</td>
                        <td>{{ $alumnus->batch }}</td>
                        <td>{{ $alumnus->employmentStatus->status }}</td>
                        
                           <td>
                            <!-- View Profile -->
                            <div class="btns">
                                <!-- View Profile -->
                                <form action="{{ route('profile', ['id' => $alumnus->id]) }}" method="get">
                                    <button class="action-btn view-btn">View</button>
                                </form>      
                                <!-- Delete Alumni -->
                                <form action="{{ route('alumni.destroy', ['id' => $alumnus->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn delete-btn" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                                </form>
                                </div>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
</body>
</html>