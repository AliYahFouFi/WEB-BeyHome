<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>



    <div class="container">
        <!-- Property Image -->
        <div class="image-container property-image mb-4">
            <img src="https://picsum.photos/200/300" alt="Property Image" class="img-fluid">
        </div>

        <!-- Property Details -->
        <div class="property-details">
            <h1 class="property-title">{{ $property->name }}</h1>
            <p class="property-price">$ {{ $property->price }}</p>
            <p class="property-description">{{ $property->description }}</p>

            <!-- Location and Area -->
            <p><strong>Location:</strong> {{ $property->location }}</p>
            <p><strong>Area:</strong> {{ $property->area }} sq. ft.</p>

            <!-- Bedrooms and Bathrooms -->
            <p><strong>Bedrooms:</strong> {{ $property->bedrooms }}</p>
            <p><strong>Bathrooms:</strong> {{ $property->bathrooms }}</p>

            <!-- Parking Spaces -->
            <p><strong>Parking Spaces:</strong> {{ $property->parking_spaces }}</p>

            <!-- Furnished -->
            <p><strong>Furnished:</strong> {{ $property->furnished ? 'Yes' : 'No' }}</p>
            <p><strong>Booked:</strong> {{ $property->booked ? 'Yes' : 'No' }}</p>



            <hr>
            {{-- 
HIS COULD BE ON IT IS OWN NOT A PART OF THE PAGE --}}
            <h4>BOOKING</h4>
            <hr>
            {{-- WE NEED TO ADD  THE DISPLAY MESSAGE HERE (IF THE BOOKING WORKED OR NOT) --}}
            <hr>









            <form action="{{ route('bookings.store') }}" method="POST">
                @csrf


                <input type="hidden" name="total_price" id="total_price" value="{{ $property->price }}">
                <input type="hidden" name="property_id" value="{{ $property->id }}">
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" required>
                </div>




                <button type="submit" class="btn btn-primary">Book Now</button>
            </form>

</body>

</html>
