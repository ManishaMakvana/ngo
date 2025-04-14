<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Manager Dashboard</title>

    @stack('style')
    <!-- Bootstrap & Font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { display: flex; height: 100vh; background: #f8f9fa; }
        .sidebar { width: 260px; background: #212529; color: white; padding: 20px; }
        .sidebar h2 { text-align: center; font-size: 22px; margin-bottom: 20px; }
        .sidebar a { display: flex; align-items: center; padding: 12px 15px; color: white; text-decoration: none; border-radius: 5px; margin-bottom: 10px; transition: 0.3s; }
        .sidebar a i { margin-right: 10px; }
        .sidebar a:hover, .sidebar a.active { background: #495057; }
        .content { flex: 1; padding: 20px; }
        .dashboard-header { background: #fff; padding: 15px; border-radius: 8px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); display: flex; justify-content: space-between; margin-bottom: 20px; }
        .dashboard-header h1 { font-size: 24px; margin: 0; }
        .dashboard-header .user-info { font-size: 16px; font-weight: bold; color: #343a40; }
        
        .dropdown {
        position: relative;
        display: block;
    }
    .dropdown .dropdown-menu {
        display: none;
        flex-direction: column;
        padding-left: 15px;
    }
    .dropdown .dropdown-menu a {
        display: block;
        padding: 5px 10px;
    }
    .dropdown.show .dropdown-menu {
        display: flex;
    }

    /* Hide icon when dropdown is open */
    .dropdown.show .menu-title i {
        display: none;
    }

    /* Show only text in dropdown */
    .dropdown-menu a {
        font-weight: bold;
        padding: 8px;
        display: block;
    }
</style>

    </style>
</head>
<body>

    <!-- Sidebar -->
    <aside class="sidebar">
    <h2>Project Manager</h2>
    <nav>
        <a href="{{ route('manager.dashboard') }}" class="active">
            <i class="fas fa-home"></i> Dashboard
        </a>

        <!-- Activities Dropdown -->
        <div class="dropdown">
            <a href="#" class="dropdown-toggle" onclick="toggleDropdown(event)">
                <span class="menu-title"><i class="fas fa-tasks"></i> Activities</span>
            </a>
            <div class="dropdown-menu">
                <a href="{{ route('manager.activities.create') }}">Create Activity</a>
                <a href="{{ route('manager.activities.index') }}">View Activities</a>
            </div>
        </div>

        <a href="{{ route('manager.reports') }}"><i class="fas fa-chart-line"></i> Reports</a>

        <a href="{{ route('manager.users') }}"><i class="fas fa-users"></i> User Management</a>

        <form action="{{ route('manager.logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger w-100 mt-3">
            <i class="fas fa-sign-out-alt"></i> Logout
        </button>
    </form>
    </nav>
</aside>


<!-- JavaScript for Toggle -->
<script>
    function toggleDropdown(event) {
        event.preventDefault();
        event.currentTarget.parentElement.classList.toggle('show');
    }
</script>


    <!-- Main Content -->
    <div class="content">
       
    
        <!-- Dynamic Content Section -->
        @yield('content')

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
