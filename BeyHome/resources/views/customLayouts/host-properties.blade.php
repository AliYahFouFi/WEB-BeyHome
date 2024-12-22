<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('customCss/card.css') }}" rel="stylesheet">
    <title>Host Properties</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    h1 {
        text-align: center;
        color: #333;
        margin-top: 20px;
    }

    .btn.btn-danger {
        width: 100%;
        margin-top: 8px;
    }


    .text-center {
        text-align: center;
        margin-top: 20px;
    }

    .ef {
        text-align: center;
        margin-bottom: 200px;
        margin-top: 200px;
    }
</style>
<header> @include('customLayouts.header')</header>

<body>
    <h1>Your Hosted Properties</h1>

    <div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>
    @if ($properties->isEmpty())
        <div class="ef">
            <h2 class="text-center">Your Hosted Properties will be shown here</h2>
        </div>
    @else
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
                                    <a href="{{ route('properties.edit', ['id' => $property->id]) }}"
                                        class="btn btn-outline-primary w-100 hover-black mt-2">
                                        Edit Property
                                    </a>
                                    <form action="{{ route('host.properties.destroy', $property->id) }}" method="POST"
                                        class="remove-from-wishlist-form  ">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                    </form>
                                </div>

                            </div>

                            <div class="card-footer bg-light">
                                <small class="text-muted">Posted {{ $property->created_at->diffForHumans() }} </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


            <div class="pagination mt-4">
                {{ $properties->links('pagination::bootstrap-4') }}
            </div>
        </div>
    @endif
    </div>
</body>

<footer> @include('customLayouts.footer')</footer>

</html>
