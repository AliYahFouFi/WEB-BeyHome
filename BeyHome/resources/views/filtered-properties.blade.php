<!DOCTYPE html>
<html lang="en">
{{-- THIS PAGE IS FOR THE FILTERER --}}

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('customCss/header.css') }}" rel="stylesheet">
    <title>Document</title>

</head>

<body>
    <div class="filter-container">
        <form action="{{ route('filter') }}" method="GET" class="row g-2 align-items-center filter-form">
            <!-- Location -->
            <div class="col-md-2">
                <label for="location" class="form-label visually-hidden ">Where?</label>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="location[]"
                    id="location">
                    <option value="all" selected>Where?</option>
                    <option value="Beirut">Beirut</option>
                    <option value="Baalbek">Baalbek</option>
                    <option value="Nabatieh">Nabatieh</option>
                    <option value="South">South</option>
                    <option value="North">North</option>
                </select>
            </div>

            <!-- Guests -->
            <div class="col-md-2">
                <label for="numberOfGuests" class="form-label visually-hidden">Who?</label>
                <input type="number" name="numberOfGuests" id="numberOfGuests" class="form-control"
                    placeholder="number Of Guests" min="1">
            </div>

            <!-- Min Price -->
            <div class="col-md-2">
                <label for="minPrice" class="form-label visually-hidden">Min Price</label>
                <input type="number" class="form-control" id="minPrice" name="min_price" placeholder="Min $"
                    min="0">
            </div>

            <!-- Max Price -->
            <div class="col-md-2">
                <label for="maxPrice" class="form-label visually-hidden">Max Price</label>
                <input type="number" class="form-control" id="maxPrice" name="max_price" placeholder="Max $"
                    min="0">
            </div>

            <!-- Submit Button -->
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
    </div>
</body>

</html>
