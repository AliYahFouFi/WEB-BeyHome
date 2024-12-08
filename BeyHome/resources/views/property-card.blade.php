@extends('index')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Properties</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom Black and White adjustments */
        .card {
            background-color: #fff;
            border: 1px solid #ddd;
        }

        .card-body {
            color: #000;
        }

        .card-title {
            color: #000;
        }

        .card-text {
            color: #555;
        }

        .card-footer {
            background-color: #f8f9fa;
            color: #888;
        }

        /* Black button with white text */
        .btn-primary {
            background-color: #000; /* Black background */
            color: #fff; /* White text */
            border: 1px solid #000; /* Black border */
        }

        .btn-primary:hover {
            background-color: #333; /* Darker shade of black on hover */
            color: #fff; /* White text remains */
        }

        .pagination {
            justify-content: center;
        }

        .pagination a,
        .pagination .active {
            background-color: #000;
            border-color: #000;
            color: #fff;
        }

        .pagination .active {
            background-color: #fff;
            border-color: #fff;
            color: #000;
        }

        .pagination a:hover {
            background-color: #333;
        }

        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

    </style>
</head>

<body>
    <div class="container py-5">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($properties as $property)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ $property->image ?? 'https://picsum.photos/200/100' }}" class="card-img-top"
                            alt="{{ $property->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $property->name }}</h5>
                            <p class="card-text">{{ $property->description ?? 'No description available.' }}</p>
                            <p><strong>Price: </strong>${{ number_format($property->price, 2) }}</p>
                            <p><strong>Location: </strong>{{ $property->location }}</p>
                            <p><strong>Booked: </strong>{{ $property->booked ? 'Yes' : 'No' }}</p>
                            <a href="{{ route('property.show', ['id' => $property->id]) }}" class="btn btn-primary">View Property</a>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated {{ $property->updated_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="pagination mt-4">
            {{ $properties->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
@endsection