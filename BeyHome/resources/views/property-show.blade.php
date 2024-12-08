<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Property Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .property-image {
            height: 300px;
            object-fit: cover;
        }
        .property-title {
            font-size: 2rem;
            font-weight: bold;
        }
        .property-price {
            font-size: 1.5rem;
            color: #28a745;
            margin-bottom: 1rem;
        }
        .property-description {
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
        }
        .form-container {
            background-color: #f8f9fa;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .btn-book {
            width: 100%;
            font-size: 1.2rem;
            padding: 0.75rem;
            background-color: black;
            color: white;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-book:hover {
            background-color:black;
        }
    </style>
</head>

<body>
    <!-- Property Details Section -->
    <div class="container py-5">
        <div class="row">
            <!-- Property Image -->
            <div class="col-md-6 mb-4">
                <div class="image-container">
                    <img src="https://picsum.photos/500/300" alt="Property Image" class="img-fluid property-image">
                </div>
            </div>

            <!-- Property Details -->
            <div class="col-md-6">
                <h1 class="property-title">{{ $property->name }}</h1>
                <p class="property-price">$ {{ $property->price }}</p>
                <p class="property-description">{{ $property->description }}</p>
                <p><strong>Location:</strong> {{ $property->location }}</p>
                <p><strong>Area:</strong> {{ $property->area }} sq. ft.</p>
                <p><strong>Bedrooms:</strong> {{ $property->bedrooms }}</p>
                <p><strong>Bathrooms:</strong> {{ $property->bathrooms }}</p>
                <p><strong>Parking Spaces:</strong> {{ $property->parking_spaces }}</p>
                <p><strong>Furnished:</strong> {{ $property->furnished ? 'Yes' : 'No' }}</p>
                <p><strong>Booked:</strong> {{ $property->booked ? 'Yes' : 'No' }}</p>
            </div>
        </div>

        <!-- Booking Form Section -->
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="form-container">
                    <h4 class="mb-4">Booking</h4>
                    <!-- Display any success or error message here -->
                    {{-- <div class="alert alert-success" role="alert">
                        Your booking was successful!
                    </div> --}}
                    <form action="{{ route('bookings.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="total_price" id="total_price" value="{{ $property->price }}">
                        <input type="hidden" name="property_id" value="{{ $property->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                        <div class="form-group mb-3">
                            <label for="start_date">Start Date</label>
                            <input type="date" name="start_date" id="start_date" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="end_date">End Date</label>
                            <input type="date" name="end_date" id="end_date" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-book">Book Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
