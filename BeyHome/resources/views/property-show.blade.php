<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Property Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('customCss/review.css') }}" rel="stylesheet">
</head>


<body>
    @include('filtered-properties')
    <!-- Property Details Section -->
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
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://picsum.photos/500/300" class="d-block w-100" alt="image1">
                    </div>
                    <div class="carousel-item">
                        <img src="https://picsum.photos/500/300" class="d-block w-100" alt="image2">
                    </div>
                    <div class="carousel-item">
                        <img src="https://picsum.photos/500/300" class="d-block w-100" alt="image3">
                    </div>
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
            <!-- Left Column -->
            <div class="col-12 col-md-6 mb-3">
                <div class="extra-content">

                    <h5>Additional Information</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, sint ipsam autem non
                        voluptates excepturi error quaerat magni ad magnam in hic similique dicta quisquam
                        dignissimos assumenda voluptatum accusamus tenetur.</p>
                </div>
            </div>
            <div class="col-md-6">

                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <!-- Property Title and Price -->

                        <h1 class="property-title text-primary mb-3">{{ $property->name }}</h1>
                        <p class="property-price text-success fw-bold h4">$ {{ number_format($property->price, 2) }}</p>

                        <!-- Property Description -->
                        <p class="property-description text-muted">{{ $property->description }}</p>

                        <!-- Location -->
                        <p class="text-secondary"><strong>Location:</strong> {{ $property->location }}</p>

                        <!-- Details Section -->
                        <div class="details mt-4">
                            <h5 class="text-dark">Details:</h5>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-map-marker-alt mr-2"></i>
                                        <span><strong>Area:</strong> {{ $property->area }} sq. ft.</span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-bed mr-2"></i>
                                        <span><strong>Bedrooms:</strong> {{ $property->bedrooms }}</span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-bath mr-2"></i>
                                        <span><strong>Bathrooms:</strong> {{ $property->bathrooms }}</span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-car mr-2"></i>
                                        <span><strong>Parking Spaces:</strong> {{ $property->parking_spaces }}</span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="d-flex align-items-center">
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
                            <h5>Rating</h5>
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
                                        <span>No rating</span>
                                @endswitch
                                <button class="btn btn-primary w-100">
                                    <a href="#" id="add-review-link"
                                        class="add-review-link text-white text-decoration-none ">add
                                        rating</a>
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

                        <!-- Display any success or error message here -->
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @elseif(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

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

        <hr>


        {{-- Review Section --}}





        <script>
            // Toggle the rating form
            document.getElementById('add-review-link').addEventListener('click', function(event) {
                event.preventDefault();
                const reviewForm = document.getElementById('review-form');
                reviewForm.style.display = reviewForm.style.display === 'block' ? 'none' : 'block';
            });
        </script>

        <hr>

        {{-- WRITEN REVIEW --}}
        <div class="reviews-dropdown">
            <button class="dropdown-toggle" id="dropdown-toggle">
                Reviews
                <span class="arrow">&#9662;</span>
            </button>
            <div class="dropdown-content" id="dropdown-content" style="display: none;">
                <!-- Loop through reviews and display them here -->
                @foreach ($reviews as $review)
                    <div class="review">
                        <div class="nametime">
                            <strong>{{ $review->user->name }}</strong>
                            <span class="time">{{ $review->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="review-text" style="font-size: 17px;">{{ $review->review }}</p>
                    </div>
                @endforeach
                <!-- Write a review form -->
                <div>
                    <hr>
                    <strong style="margin-bottom: 10px;">Write a review</strong>
                    <form id="writtenreview-form"
                        action="{{ route('WrittenReviews.store', ['property' => $property->id]) }}" method="POST">
                        @csrf
                        <input type="text" name="review" id="review" placeholder="Write a review"
                            class="input-review">
                        <button type="submit" class="add-to-cart" style="margin-bottom:0;">Submit</button>
                    </form>
                </div>
                <div id="responseMessageWritten" style="display: none;"></div>
            </div>
        </div>

        <script>
            // Toggle the dropdown
            document.getElementById('dropdown-toggle').addEventListener('click', function() {
                var content = document.getElementById('dropdown-content');
                content.style.display = content.style.display === 'none' ? 'block' : 'none';
            });

            // Handle the form submission via AJAX
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
                            // Display the new review in the dropdown
                            let reviewDiv = document.createElement('div');
                            reviewDiv.classList.add('review');
                            reviewDiv.innerHTML = `<strong>${data.user_name}</strong>:<p>${data.review}</p>`;
                            document.getElementById('dropdown-content').prepend(reviewDiv);

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
        </script>

    </div>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

<style>
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



    .property-title.text-primary.mb-3 {
        color: black !important;
    }

    .card-body {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
        width: 100%;
    }

    .btn-primary:hover {
        background-color: #333;
        color: #fff;
    }

    .form-container {
        padding: 2rem;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
        width: 100%;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .form-container input {
        border: black 1px solid !important;
    }

    /* for img slider */
    /* Set a specific height for the carousel */
    .imgSlider .carousel-inner {
        height: 600px;
        /* You can adjust this height to your desired value */
        margin: 20px;
        border-radius: 10px;
    }

    /* Ensure images inside the carousel take the full width and maintain the aspect ratio */
    .imgSlider .carousel-item img {
        object-fit: cover;
        /* Ensures the image covers the space without distorting */
        height: 100%;
        /* Make sure the image fills the height of the carousel */
    }


    .col-12.col-md-6.mb-3 {
        padding-right: 0px !important;
    }


    /* FOR RATING */
    .rating-container {
        padding: 15px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
        width: 100%;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
</style>

</html>
