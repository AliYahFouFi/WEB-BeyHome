<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Property Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('customCss/review.css') }}" rel="stylesheet">
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
            background-color: black;
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
        <hr>


        {{-- Review Section --}}

        <div class="rating-container">
            <div class="rating-container">
                Rating:<div class="star-con">

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

                    <a href="#" id="add-review-link" class="add-review-link add-to-cart">add rating
                    </a>
                </div>
            </div>

        </div>

        <div id="review-form" style="display: none;">
            <form id="rating-form" action="{{ route('reviews.store', ['property' => $property->id]) }}" method="POST">
                @csrf
                <div class="star-rating ">
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

        <script>
            // Toggle the review form
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
                            'X-CSRF-TOKEN': formData.get('_token') // Laravel's CSRF token
                        }
                    })
                    .then(response => response.json()) // Parse the JSON response
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
