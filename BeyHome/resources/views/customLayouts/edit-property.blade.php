<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>
<header>@include('customLayouts.header')</header>
<style>
    .user_option {
        margin-left: 620px !important;
    }

    body {
        background-color: #f9f9f9;
        color: #333;
        font-family: Arial, sans-serif;
    }

    .add-property {
        margin-top: 50px;
        margin-bottom: 50px;
        padding: 30px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-weight: bold;
        text-transform: uppercase;
        text-align: center;
        margin-bottom: 30px;
    }

    label {
        font-weight: bold;
        margin-bottom: 5px;
    }

    input,
    textarea {
        border: 1px solid #000 !important;
        background-color: #fff !important;
        color: #000 !important;
    }

    input:focus,
    textarea:focus {
        border-color: #333 !important;
        box-shadow: none !important;
    }

    .btn {
        background-color: #000;
        color: #fff;
        border: 1px solid #000;

    }

    .btn:hover {
        background-color: #fff;
        color: #000;
        border: 1px solid #000 !important;
    }

    .btn:active {
        background-color: #464646 !important;
        color: #fff;
        border: 1px solid #000 !important;
    }

    input {
        border: black 1px solid !important;
    }

    input:focus,
    select:focus,
    textarea:focus {
        border: 1px solid #000000 !important;
        box-shadow: 0 0 0 0.25rem rgba(0, 0, 0, 0.5) !important;
    }

    textarea {
        border: black 1px solid !important;
    }

    select {
        border: black 1px solid !important;
    }
</style>

<body>
    <div class="container mt-5">
        <h2>Edit Property</h2>
        <form action="{{ route('properties.update', $property->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Property Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Property Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $property->name }}"
                    required>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description" class="form-control" rows="4" required>{{ $property->description }}</textarea>
            </div>

            <!-- Price -->
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ $property->price }}"
                    required>
            </div>

            <!-- Location -->
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <select class="form-control" id="location" name="location" required>
                    <option value="{{ $property->location }}">{{ $property->location }}</option>
                    <option value="Beirut">Beirut</option>
                    <option value="Baalbek">Baalbek</option>
                    <option value="Nabatieh">Nabatieh</option>
                    <option value="South">South</option>
                    <option value="North">North</option>
                </select>
            </div>



            <!-- Number of Guests -->
            <div class="mb-3">
                <label for="guests" class="form-label">Number of Guests</label>
                <input type="number" id="guests" name="guests" class="form-control"
                    value="{{ $property->number_of_guests }}" required>
            </div>

            <!-- Images -->
            <div class="mb-3">
                <label for="images" class="form-label">Images</label>
                <input type="file" id="images" name="images[]" class="form-control" multiple>
                <div class="mt-2">
                    <p>Existing Images:</p>
                    @foreach (json_decode($property->images, true) as $image)
                        <img src="{{ asset('storage/' . $image) }}" alt="Property Image" class="img-thumbnail"
                            width="100">
                    @endforeach
                </div>
            </div>

            <!-- Save Button -->
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mb-3">Save Changes</button>
            </div>
        </form>
    </div>

</body>
<footer> @include('customLayouts.footer')</footer>

</html>
