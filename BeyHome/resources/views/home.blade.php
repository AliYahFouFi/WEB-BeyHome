<h1>Home
</h1>

@guest
    <button><a href="/login">Login</a></button>
    <button><a href="/register">Register</a></button>
@endguest
@auth
    <form id="myForm" action="{{ route('logout') }}" method="POST">
        @csrf

        <button type="submit">Logout</button>
    </form>
@endauth
@include('property-card')

<hr>
<hr>
