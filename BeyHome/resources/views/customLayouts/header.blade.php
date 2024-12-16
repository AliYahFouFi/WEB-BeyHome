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
                    <ul class="navbar-nav  ">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home') }}">Home <span
                                    class="sr-only">(current)</span></a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact Us</a>
                        </li>

                        <a class="nav-link" href='{{ route('favorites.show') }}'>SHow favorites</a>
                        @guest
                            <li class="nav-item"> <a class="nav-link" href="/login">Login</a></li>
                            <li class="nav-item"> <a class="nav-link" href="/register">Register</a> </li>


                        @endguest
                        @auth
                            <form id="myForm" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <li class="nav-item"><button type="submit" class="btn btn-light">Logout</button> </li>
                            </form>
                            @if (Auth::user()->role == 'host')
                                <li class="nav-item"> <a href="/properties/create" class="nav-link">Add Property</a>
                                </li>
                            @endif
                        @endauth
                    </ul>
                    <div class="user_option">


                    </div>
                </div>
            </nav>
        </header>
        <!-- end header section -->

    </div>
    {{-- @include('filtered-properties') --}}
</body>

</html>
