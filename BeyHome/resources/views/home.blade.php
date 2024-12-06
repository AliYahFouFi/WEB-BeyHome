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
<form action="{{ route('bookings.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="property_id">Property</label>
        <select name="property_id" id="property_id" class="form-control" required>
            @foreach ($properties as $property)
                <option value="{{ $property->id }}">{{ $property->name }}</option>
            @endforeach
        </select>
    </div>

    <input type="hidden" name="user_id" value="{{ Auth::id() }}">

    <div class="form-group">
        <label for="start_date">Start Date</label>
        <input type="date" name="start_date" id="start_date" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="end_date">End Date</label>
        <input type="date" name="end_date" id="end_date" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="total_price">Total Price</label>
        <input type="number" name="total_price" id="total_price" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Book Now</button>
</form>
