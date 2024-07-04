<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venue Details</title>
    <base href="/public">
    <!-- Include CSS -->
    @include('admin.css')
    <style>
        .checked {
            color: orange;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <!-- Header Section -->
    @include('admin.header')
    <!-- Header Section End -->

    <!-- Sidebar Navigation -->
    @include('admin.sidebar')
    <!-- Sidebar Navigation End -->

    <!-- Body Section -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div id="serv_hover" class="venue_detail">
                        <div style="padding: 20px;">
                            <figure>
                                <img src="venue/{{ $venue->image }}" alt="Venue Image"
                                    style="height: 200px; width: 100%; object-fit: cover; border-radius: 15px 15px 0 0;">
                            </figure>
                        </div>
                        <div>
                            <h3>{{ $venue->venue_title }}</h3>
                            <p>{{ $venue->description }}</p>
                            <h4>Size:</h4>
                            <p>{{ $venue->venue_size }} sqft</p>
                            <h4>Availability:</h4>
                            <p>{{ $venue->venue_availability }}</p>
                            <h4>Address:</h4>
                            <p>{{ $venue->venue_address }}, {{ $venue->venue_town }},
                                {{ $venue->venue_postcode }}, {{ $venue->venue_city }}</p>
                            <h4>Price:</h4>
                            <p>{{ $venue->price }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reviews Section -->
            <div class="row mt-5">
                <div class="col-md-8"">
                    <h3>Reviews</h3>
                    @if ($reviews->isEmpty())
                        <p>No reviews yet.</p>
                    @else
                        <ul class="list-group" ">
                               @foreach ($reviews as $review)
                            <li class="list-group-item" style="background-color: #313439">
                                <div>
                                    <p class="mb-1"><strong>{{ $review->username }}</strong></p>
                                    <p class="mb-1">Rating:
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $review->review_rating)
                                                <span class="fa fa-star checked"></span>
                                            @else
                                                <span class="fa fa-star"></span>
                                            @endif
                                        @endfor
                                    </p>
                                    <p>{{ $review->review_feedback }}</p>
                                </div>
                            </li>
                    @endforeach
                    </ul>
                    @endif
                    <br /><br />
                </div>
            </div>
            <!-- End Reviews Section -->
        </div>
    </div>
    <!-- End Body Section -->

    <!-- Footer Section -->
    @include('admin.footer')
    <!-- Footer Section End -->

    <!-- Include JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- Your custom scripts if any -->
</body>

</html>
