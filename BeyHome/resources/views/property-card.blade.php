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
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <link href="{{ asset('customCss/card.css') }}" rel="stylesheet">

        <style>

        </style>
    </head>

    <body>

        <div class="container py-5">
            <div class="row row-cols-1 row-cols-md-3 g-4">

                @foreach ($properties as $property)
                    <div class="col">
                        <div class="card h-100 shadow-lg border-0 position-relative">

                            <div class="card-img-container position-relative">
                                @if ($property->images)
                                    @foreach (json_decode($property->images) as $image)
                                        <img src="{{ asset('storage/' . $image) }}" class="card-img-top rounded-top"
                                            alt="{{ $property->name }}" loading="lazy">
                                    @endforeach
                                @else
                                    <img src="https://picsum.photos/200/100" class="card-img-top rounded-top"
                                        alt="Default image" loading="lazy">
                                @endif
                                <div class="badge bg-success position-absolute top-0 start-0 m-2 px-3 py-1">
                                    {{ $property->booked ? 'Booked' : 'Available' }}
                                </div>
                                <!-- Heart Icon -->
                                <form action="{{ route('favorites.store', $property->id) }}" method="POST"
                                    class="position-absolute top-0 end-0 m-2">
                                    @csrf
                                    @if (auth()->user())
                                        @if ($favorites->contains($property->id))
                                            <button type="submit" class="btn btn-light btn-sm rounded-circle shadow">
                                                <i class="fa-solid fa-heart "></i>
                                            </button>
                                        @else
                                            <button type="submit" class="btn btn-light btn-sm rounded-circle shadow">
                                                <i class="fa-regular fa-heart"></i>
                                            </button>
                                        @endif
                                    @endif
                                </form>
                            </div>

                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-primary">{{ $property->name }}</h5>
                                <p class="card-text text-muted mb-3">
                                    {{ $property->description ?? 'No description available.' }}
                                </p>
                                <div> <strong>Only For:</strong> ${{ number_format($property->price, 2) }}</div>

                                <p><strong>Located at: </strong>{{ $property->location }}</p>
                                <div class="mt-auto">
                                    <a href="{{ route('property.show', ['id' => $property->id]) }}"
                                        class="btn btn-outline-primary w-100 hover-black">
                                        View Property
                                    </a>
                                </div>

                            </div>

                            <div class="card-footer bg-light">
                                <small class="text-muted">Posted {{ $property->created_at->diffForHumans() }} </small>
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
