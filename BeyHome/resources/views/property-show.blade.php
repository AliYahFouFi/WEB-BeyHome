<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="images/icon.png" type="image/x-icon">
    <title>Property Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('customCss/property-show.css') }}" rel="stylesheet">
    <link href="{{ asset('customCss/card.css') }}" rel="stylesheet">
    {{-- for map --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

</head>

<body>
    @include('customLayouts.header')
    @include('customLayouts.filter')
    <!-- Display any success or error message here -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="container py-5">
        <div class="row">
            <!-- Property Image -->
            <div id="carouselExampleIndicators" class="carousel slide imgSlider" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div id="propertyCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach (json_decode($property->images) as $index => $image)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $image) }}" class="d-block w-100" alt="Property Image">
                            </div>
                        @endforeach
                    </div>
                    <!-- Carousel controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#propertyCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#propertyCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <hr>
        <!-- Property Details -->
        <div class="row">
            <!-- Left Column:some information -->
            <div class="col-12 col-md-6 mb-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title mb-4"> Information</h5>
                        <p class="d-flex align-items-center mb-3" style="gap: 5px">
                            <i class="fas fa-user mr-2"></i> <strong>Property Owner: </strong>
                            {{ $property->user->name }}
                        </p>
                        <p class="d-flex align-items-center mb-3" style="gap: 5px">
                            <i class="fas fa-calendar-alt mr-2"></i> <strong>Date Posted: </strong>
                            {{ $property->created_at->format('d M Y') }}
                        </p>
                        <p class="d-flex align-items-center mb-3" style="gap: 5px">
                            <i class="fas fa-phone-alt mr-2"></i> <strong>Phone Number: </strong>
                            {{ $property->user->phone_number }}
                        </p>
                        <p class="d-flex align-items-center mb-0" style="gap: 5px">
                            <i class="fas fa-star mr-2"></i> <strong>Rated By: </strong>
                            {{ $nbofreviews }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- right Column :property details -->
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h1 class="property-title text-primary mb-3">{{ $property->name }}</h1>
                        <p class="property-price text-success fw-bold h4">$ {{ number_format($property->price, 2) }}
                        </p>
                        <p class="property-description text-muted">{{ $property->description }}</p>
                        <p class="text-secondary"><strong>Location:</strong> {{ $property->location }}</p>
                        <div class="details mt-4">
                            <h5 class="text-dark">Details:</h5>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="d-flex align-items-center" style="gap: 5px">
                                        <i class="fas fa-map-marker-alt mr-2"></i>
                                        <span><strong>Area:</strong> {{ $property->area }} sq. ft.</span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="d-flex align-items-center" style="gap: 5px">
                                        <i class="fas fa-bed mr-2"></i>
                                        <span><strong>Bedrooms:</strong> {{ $property->bedrooms }}</span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="d-flex align-items-center" style="gap: 5px">
                                        <i class="fas fa-bath mr-2"></i>
                                        <span><strong>Bathrooms:</strong> {{ $property->bathrooms }}</span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="d-flex align-items-center" style="gap: 5px">
                                        <i class="fas fa-car mr-2"></i>
                                        <span><strong>Parking Spaces:</strong> {{ $property->parking_spaces }}</span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="d-flex align-items-center" style="gap: 5px">
                                        <i class="fas fa-couch mr-2"></i>
                                        <span><strong>Furnished:</strong>
                                            {{ $property->furnished ? 'Yes' : 'No' }}</span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Booking Status -->
                        <p class="mt-3">
                            <span class="badge {{ $property->booked ? 'bg-danger' : 'bg-success' }}">
                                {{ $property->booked ? 'not available' : 'Available' }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <!-- Booking and Rating Form Section -->

        <div class="container">
            <div class="row booking-form">
                <!-- Left Column :Rating -->
                <div class="col-12 col-md-6 mb-3">
                    <div class="extra-content">

                        <div class="rating-container">
                            <span class="rating-label">Rating:</span>
                            <div class="star-con">
                                @switch($property->rating)
                                    @case(0)
                                        <div class="star-con">
                                            <span class="star gray">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                                        </div>
                                    @break

                                    @case(1)
                                        <div class="star-con">
                                            <span class="star">&#9733;</span>
                                            <span class="star gray">&#9733;&#9733;&#9733;&#9733;</span>
                                        </div>
                                    @break

                                    @case(2)
                                        <div class="star-con">
                                            <span class="star">&#9733;&#9733;</span>
                                            <span class="star gray">&#9733;&#9733;&#9733;</span>
                                        </div>
                                    @break

                                    @case(3)
                                        <div class="star-con">
                                            <span class="star">&#9733;&#9733;&#9733;</span>
                                            <span class="star gray">&#9733;&#9733;</span>
                                        </div>
                                    @break

                                    @case(4)
                                        <div class="star-con">
                                            <span class="star">&#9733;&#9733;&#9733;&#9733;</span>
                                            <span class="star gray">&#9733;</span>
                                        </div>
                                    @break

                                    @case(5)
                                        <div class="star-con">
                                            <span class="star">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                                        </div>
                                    @break

                                    @default
                                        <div class="no-rating">
                                            <span>No</span> <span>Rating</span>
                                        </div>
                                @endswitch
                                <button class="btn btn-primary w-100  add-review-btn" id="add-review-link">
                                    add rating
                                </button>
                            </div>
                        </div>

                        <div id="review-form" style="display: none;">
                            <form id="rating-form"
                                action="{{ route('reviews.store', ['property' => $property->id]) }}" method="POST">
                                @csrf
                                <div class="star-rating">
                                    <input type="radio" name="rating" id="star-5" value="5">
                                    <label for="star-5" class="star">&#9733;</label>
                                    <input type="radio" name="rating" id="star-4" value="4">
                                    <label for="star-4" class="star">&#9733;</label>
                                    <input type="radio" name="rating" id="star-3" value="3">
                                    <label for="star-3" class="star">&#9733;</label>
                                    <input type="radio" name="rating" id="star-2" value="2">
                                    <label for="star-2" class="star">&#9733;</label>
                                    <input type="radio" name="rating" id="star-1" value="1">
                                    <label for="star-1" class="star">&#9733;</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit Rating</button>
                            </form>
                            <div id="rating-response-message"></div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Booking Form -->
                <div class="col-12 col-md-6 mb-3">
                    <div class="form-container">
                        <h4 class="mb-4">Booking</h4>
                        <form action="{{ route('bookings.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="total_price" id="total_price"
                                value="{{ $property->price }}">
                            <input type="hidden" name="property_id" value="{{ $property->id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">


                            <div class="row">
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="start_date">Check in</label>
                                        <input type="date" name="start_date" id="start_date" class="form-control"
                                            required>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="end_date">Check out</label>
                                        <input type="date" name="end_date" id="end_date" class="form-control"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Book Now</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // Toggle the rating form
            document.getElementById('add-review-link').addEventListener('click', function(event) {
                event.preventDefault();
                const reviewForm = document.getElementById('review-form');
                reviewForm.style.display = reviewForm.style.display === 'block' ? 'none' : 'block';
            });
        </script>
        <hr>

        {{-- WRITTEN REVIEW --}}
        <div class="reviews-dropdown">
            <div id="responseMessage"></div>

            <h2 class="text-center"> People's Reviews</h2>
            <div class="dropdown-content" id="dropdown-content">
                <!-- Loop through reviews and display them here -->
                <div class="container">
                    <div class="row" id="reviews-container">
                        @foreach ($reviews as $review)
                            <div class="col-md-6 mb-3 review">
                                <div class="dropdown-item border p-3 rounded">
                                    <div class="d-flex justify-content-between">
                                        <strong>{{ $review->user->name }}</strong>
                                        <span class="text-muted">{{ $review->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="mb-0">{{ $review->review }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Write a review form -->
                <div>

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-8">
                                <form id="writtenreview-form"
                                    action="{{ route('WrittenReviews.store', ['property' => $property->id]) }}"
                                    method="POST">
                                    @csrf
                                    <input type="text" name="review" id="review"
                                        placeholder="Write a review?"
                                        class="input-review form-control mb-3 written-review-input">
                                    <button type="submit" class="btn btn-primary w-100">Submit Review</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <script>
                        // Handle the form submission via AJAX [need some more fixing]
                        document.addEventListener('DOMContentLoaded', function() {
                            document.getElementById('writtenreview-form').addEventListener('submit', function(event) {
                                event.preventDefault(); // Prevent the default form submission

                                let form = event.target;
                                let formData = new FormData(form);

                                fetch(form.action, {
                                        method: 'POST',
                                        body: formData,
                                        headers: {
                                            'X-CSRF-TOKEN': formData.get('_token')
                                        }
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        let responseMessage = document.getElementById('responseMessage');
                                        if (data.success) {
                                            // Create the new review element
                                            let reviewDiv = document.createElement('div');
                                            reviewDiv.classList.add('col-md-6', 'mb-3', 'review');

                                            reviewDiv.innerHTML = `
                                <div class="dropdown-item border p-3 rounded">
                                     <div class="d-flex justify-content-between">
                                        <strong>${data.user_name}</strong>
                                           <span class="text-muted">${data.created_at}</span>
                                   </div><p class="mb-0">${data.review}</p> 
                                </div>`;

                                            // Add the new review to the reviews container
                                            const reviewsContainer = document.querySelector('#reviews-container');
                                            reviewsContainer.prepend(reviewDiv);

                                            // Clear the input field
                                            document.getElementById('review').value = '';

                                            // Display success message
                                            responseMessage.innerText = 'Review submitted successfully!';
                                            responseMessage.style.color = 'green';
                                        } else {
                                            // Display error message 
                                            responseMessage.innerText = 'Error: ' + data.message;
                                            responseMessage.style.color = 'red';
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                        let responseMessage = document.getElementById('responseMessageWritten');
                                        responseMessage.innerText = 'Error adding review.';
                                        responseMessage.style.color = 'red';
                                    });
                            });
                        });
                    </script>

                </div>


                <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

            </div>
        </div>

        <hr>
        {{-- MAP --}}
        <div>
            <h2 class="text-center">Location</h2>
            <div id="map" style="height: 500px; width: 100%;"></div>

            <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

            <script>
                var lat = {{ $property->latitude }};
                var lon = {{ $property->longitude }};

                // Initialize the map and set the view based on the coordinates
                var map = L.map('map').setView([lat, lon], 13);

                // Add OpenStreetMap tile layer
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                // Add a marker at the property location
                var marker = L.marker([lat, lon]).addTo(map);
                // Optionally, you can add a popup to the marker
                marker.bindPopup("{{ $property->name }}").openPopup();
            </script>

            <hr>
        </div>
        <div>
            <h2 class="text-center">Similar Properties</h2>
            <div class="container py-5">
                <div class="row row-cols-1 row-cols-md-3 g-4">

                    @foreach ($similarProperties as $property)
                        <div class="col">
                            <div class="card h-100 shadow-lg border-0 position-relative">

                                <div class="card-img-container position-relative">
                                    <img src="{{ $property->image ?? 'https://picsum.photos/200/100' }}"
                                        class="card-img-top rounded-top" alt="{{ $property->name }}" loading="lazy">
                                    <div class="badge bg-success position-absolute top-0 start-0 m-2 px-3 py-1">
                                        {{ $property->booked ? 'Booked' : 'Available' }}
                                    </div>
                                    <!-- Heart Icon -->
                                    <form action="{{ route('favorites.store', $property->id) }}" method="POST"
                                        class="position-absolute top-0 end-0 m-2">
                                        @csrf
                                        {{-- ADD if the user added it change the icon to solid --}}
                                        <button type="submit" class="btn btn-light btn-sm rounded-circle shadow">

                                            <i class="fa-regular fa-heart"></i>
                                        </button>
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
                                    <small class="text-muted">Posted {{ $property->created_at->diffForHumans() }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                {{-- <div class="pagination mt-4">
                    {{ $similarProperties->links('pagination::bootstrap-4') }}
                </div> --}}
            </div>

        </div>
    </div>
</body>


<footer> @include('customLayouts.footer')</footer>

</html>
