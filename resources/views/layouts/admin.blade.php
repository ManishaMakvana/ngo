<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
   <!-- Replace with your desired Bootstrap version -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">



    @stack('styles')
</head>
<body>

<header>
    <h1>Admin Panel</h1>
   
        <!-- Admin Dropdown -->
        <div class="dropdown">
            <img src="{{ asset('images/panda.jpg') }}" alt="Admin Image" class="admin-img dropdown-toggle">
            <div class="dropdown-menu">
                <a href="{{ route('admin.dashboard') }}">Profile</a>
                <a href="{{ route('teacher.form') }}">user creation</a>
                <a href="#" onclick="document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" method="POST" action="{{ route('admin.logout') }}" style="display: none;">
                    @csrf
                </form>

                <script>
    document.addEventListener('DOMContentLoaded', () => {
        const adminImg = document.querySelector('.dropdown-toggle');
        const dropdownMenu = document.querySelector('.dropdown-menu');

        adminImg.addEventListener('click', (e) => {
            e.stopPropagation();
            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
        });

        document.addEventListener('click', () => {
            dropdownMenu.style.display = 'none';
        });
    });
</script>

            </div>
        </div>
    </div>
</header>

<aside>
    <!-- Admin Image in Sidebar -->
    <div style="text-align: center; margin-bottom: 20px; margin-top: 10px;">
        <img src="{{ asset('images/panda.jpg') }}" alt="Admin Image" class="admin-img" style="width: 60px; height: 60px; border: 2px solid white;">
    </div>
    <ul>
        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('admin.modules') }}">Modules</a></li>
        <li><a href="{{ route('admin.users') }}">Users</a></li>

      
    </ul>
</aside>


<main>
    @yield('content')
</main>



   


</body>
</html>
