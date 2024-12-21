<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel Sidebar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<style>
    .pagination {}

    .pagination a,
    .pagination .active {
        background-color: #000;
        border-color: #000;
        color: #fff;
    }

    .pagination .active {
        background-color: #fff !;
        border-color: #fff;
        color: #000;
    }

    .pagination a:hover {
        background-color: #333;
        color: white;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark text-white">
        <div class="container-fluid">

            <h4> <a class="navbar-brand text-white" href="{{ route('home') }}">BeyHome</a></h4>

            <div class="d-flex ms-auto">
                @auth
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="bg-dark text-white vh-100 p-3" style="width: 250px;">
            <h4 class="text-center mb-4">Admin Panel</h4>
            <ul class="nav flex-column">
                <li class="nav-item mb-3">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">
                        <i class="fa-solid fa-file me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a href="{{ route('admin.showProperties') }}" class="nav-link text-white">
                        <i class="fa-solid fa-building me-2"></i> Properties
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a href="{{ route('admin.showUsers') }}" class="nav-link text-white">
                        <i class="fa-solid fa-users me-2"></i> Users
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a href="{{ route('admin.showBookings') }}" class="nav-link text-white">
                        <i class="fa-solid fa-calendar-check me-2"></i> Bookings
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a href="{{ route('home') }}" class="nav-link text-white">
                        <i class="fa-solid fa-house me-2"></i> Home
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>
