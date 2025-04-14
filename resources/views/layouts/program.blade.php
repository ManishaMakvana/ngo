<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    @stack('styles')
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        
        /* Sidebar */
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #2c3e50;
            padding: 20px;
            color: white;
            transition: transform 0.3s ease-in-out;
        }
        .sidebar.closed {
            transform: translateX(-100%);
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .sidebar nav a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 12px;
            margin-bottom: 10px;
            border-radius: 5px;
            background-color: #34495e;
            transition: 0.3s;
        }
        .sidebar nav a:hover {
            background-color: #3498db;
        }
        .sidebar form {
            margin-top: 20px;
        }
        .sidebar form button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #e74c3c;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }
        .sidebar form button:hover {
            background-color: #c0392b;
        }
        
        /* Main Content */
        .content {
            margin-left: 270px;
            padding: 20px;
            transition: margin-left 0.3s;
        }
        .toggle-btn {
            background-color: #333;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .toggle-btn:hover {
            background-color: #555;
        }
        h2{
            color: white; 
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div id="sidebar" class="sidebar">
    <h2>Program Dashboard</h2>
    <nav>
    <a href="{{ route('user.programs') }}">📚 View Modules</a>
        <a href="{{ route('reports.create') }}">📊 Create Report</a>
        <a href="{{ route('program.activities') }}">📜 View  Activities</a>
        <a href="{{ route('user.changePasswordForm') }}">🔑 Change Password</a>

    </nav>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">🚪 Logout</button>
    </form>
</div>

<!-- Content -->
<div class="content">
   
    @yield('content')
</div>

<!-- Sidebar Toggle Script -->
<script>
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('toggleSidebar');
    
    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('closed');
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
