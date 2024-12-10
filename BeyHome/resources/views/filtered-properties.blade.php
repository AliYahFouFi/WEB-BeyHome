<form action="{{ route('filter') }}" method="GET" class="row g-2 align-items-center bg-white shadow-sm p-3 rounded">
    <!-- Location -->
    <div class="col-md-3">
        <label for="location" class="form-label visually-hidden">Location</label>
        <select name="location[]" id="location" class="form-select" multiple>
            <option value="Beirut">Beirut</option>
            <option value="Baalbek">Baalbek</option>
            <option value="Nabatieh">Nabatieh</option>
            <option value="South">South</option>
            <option value="North">North</option>
        </select>
    </div>

    <!-- Guests -->
    <div class="col-md-2">
        <label for="numberOfGuests" class="form-label visually-hidden">Guests</label>
        <input type="number" name="numberOfGusts" id="numberOfGuests" class="form-control" placeholder="Guests"
            min="1">
    </div>

    <!-- Min Price -->
    <div class="col-md-2">
        <label for="minPrice" class="form-label visually-hidden">Min Price</label>
        <input type="number" class="form-control" id="minPrice" name="min_price" placeholder="Min $" min="0">
    </div>

    <!-- Max Price -->
    <div class="col-md-2">
        <label for="maxPrice" class="form-label visually-hidden">Max Price</label>
        <input type="number" class="form-control" id="maxPrice" name="max_price" placeholder="Max $" min="0">
    </div>

    <!-- Submit Button -->
    <div class="col-md-2 d-grid">
        <button type="submit" class="btn btn-primary">Search</button>
    </div>
</form>
