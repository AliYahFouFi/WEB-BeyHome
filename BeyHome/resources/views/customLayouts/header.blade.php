<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="hero_area">
        <header class="header_section">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <span>
                        BeyHome
                    </span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class=""></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto"> <!-- Added ms-auto to align items to the right -->
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home') }}">Home <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('favorites.show') }}">Show Favorites</a>
                        </li>

                        <!-- Dropdown menu -->
                        <li class="nav-item dropdown user_option">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton1" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-user" style="color: white;"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1"
                                style="background-color: #000;">
                                @guest
                                    <li class="nav-item">
                                        <a class="dropdown-item text-light" href="/login">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item text-light" href="/register">Register</a>
                                    </li>
                                @endguest
                                @auth
                                    <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <li>
                                            <button type="submit" class="dropdown-item text-light">Logout</button>
                                        </li>

                                        <li>
                                            <a href="/profile" class="dropdown-item text-light">Profile</a>
                                        </li>
                                    </form>
                                    @if (Auth::user()->role == 'host')
                                        <li>
                                            <a href="/properties/create" class="dropdown-item text-light">Add Property</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('properties.showHost') }}" class="dropdown-item text-light">My
                                                Properties</a>
                                        </li>
                                    @endif

                                    @if (Auth::user()->is_admin)
                                        <li>
                                            <a href="{{ route('admin.dashboard') }}" class="dropdown-item text-light">Admin
                                                Panel</a>
                                        </li>
                                    @endif
                                @endauth
                            </ul>
                        </li>
                    </ul>
                </div>

            </nav>
        </header>
    </div>

</body>

</html>
