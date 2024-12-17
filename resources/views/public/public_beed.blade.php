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

        /* Main Content */
        .main-content {
            margin-left: 120px;
            padding: 20px;
            width: calc(100% - 250px);
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

        /* Table */
        .table-container {
            margin: 50px auto;
            width: 80%;
            overflow-x: auto;
            border-radius: 10px;
            text-align: center;
        }

        .table-container h2 {
            font-size: 40px;
            font-weight: bold;
            color: rgb(189, 189, 189);
            margin-bottom: 20px;
            margin-top: 100px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
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

    <!-- Main Content -->
    <div class="main-content">
        <div class="table-container">
            <h2>BEED Information Table</h2>
            <div class="search-container">
            <form action="{{ route('public.beed.index') }}" method="get" class="flex items-center">
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
                        <th>Course</th>
                        <th>Batch</th>
                        <th>Employment Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alumni as $alumnus)
                    <tr>
                        <td>{{ $alumnus->fullname }}</td>
                        <td>{{ $alumnus->age }}</td>
                        <td>{{ $alumnus->sex }}</td>
                        <td>{{ $alumnus->dob }}</td>
                        <td>{{ $alumnus->batch }}</td>
                        <td>{{ $alumnus->employmentStatus->status }}</td>
                        <td>
                            <div class="btns">
                                <form action="{{ route('profile', ['id' => $alumnus->id]) }}" method="get">
                                    <button class="action-btn view-btn">View</button>
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