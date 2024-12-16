<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Property</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
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
            border: 1px solid #000;
            background-color: #fff;
            color: #000;
        }

        input:focus,
        textarea:focus {
            border-color: #333;
            box-shadow: none;
        }

        .btn {
            background-color: #000;
            color: #fff;
            border: 1px solid #000;
        }

        .btn:hover {
            background-color: #fff;
            color: #000;
            border: 1px solid #000;
        }

        .btn:active {
            background-color: #464646 !important;
            color: #fff;
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
</head>

<body>
    <header>
        @include('customLayouts.header')
    </header>

    <body>
        <div class="container add-property">
            <h1>Add New Property</h1>
            <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">


                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Property Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" step="1" class="form-control" id="price" name="price"
                            required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="category" class="form-label">Category</label>
                        <input type="text" class="form-control" id="category" name="category" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="location" class="form-label">Location</label>
                        <select class="form-control" id="location" name="location" required>
                            <option value="">Select a location</option>
                            <option value="Beirut">Beirut</option>
                            <option value="Baalbek">Baalbek</option>
                            <option value="Nabatieh">Nabatieh</option>
                            <option value="South">South</option>
                            <option value="North">North</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="area" class="form-label">Area (sq. meters)</label>
                        <input type="number" step="0.5" class="form-control" id="area" name="area">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="bedrooms" class="form-label">Bedrooms</label>
                        <input type="number" class="form-control" id="bedrooms" name="bedrooms">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="bathrooms" class="form-label">Bathrooms</label>
                        <input type="number" class="form-control" id="bathrooms" name="bathrooms">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="parking_spaces" class="form-label">Parking Spaces</label>
                        <input type="number" class="form-control" id="parking_spaces" name="parking_spaces">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="furnished" class="form-label">Furnished</label>
                        <select class="form-control" id="furnished" name="furnished">
                            <option value="1">Yes</option>
                            <option value="0" selected>No</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="number_of_guests" class="form-label">Number of Guests</label>
                        <input type="number" class="form-control" id="number_of_guests" name="number_of_guests">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="image" class="form-label">Property Image</label>
                        <input type="file" class="form-control" id="images" name="images[]" multiple>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </body>
    <footer>
        @include('customLayouts.footer')
    </footer>
    <script src="js/bootstrap.js"></script>

</body>

</html>
