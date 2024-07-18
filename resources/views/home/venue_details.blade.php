<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('home.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style type="text/css">
        /* Custom styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            /* Light grey background */
            color: #333;
            /* Dark grey text */

            /* Adjusted to accommodate fixed header */
        }

        .venue_detail {
            background-color: #fff;
            /* White background */
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            /* Soft shadow effect */
        }

        .venue_detail h3 {
            color: #555;
            /* Dark grey heading */
            font-size: 28px;
            margin-top: 0;
        }

        .venue_detail p {
            color: #666;
            /* Grey text */
            font-size: 16px;
            line-height: 1.6;
        }

        .venue_detail img {
            width: 100%;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .booking-form {
            background-color: #fff;
            /* White background */
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            /* Soft shadow effect */
        }

        .booking-form h1 {
            color: #555;
            /* Dark grey heading */
            font-size: 30px;
            margin-top: 0;
        }

        .booking-form label {
            color: #666;
            /* Grey text */
            font-size: 16px;
        }

        .booking-form input[type="text"],
        .booking-form input[type="date"],
        .booking-form textarea,
        .booking-form input[type="number"],
        .booking-form select {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px 0;
            border: 1px solid #ddd;
            /* Light grey border */
            border-radius: 5px;
            font-size: 16px;
            color: #333;
            /* Dark grey text */
        }

        .booking-form textarea {
            resize: vertical;
        }

        .booking-form input[type="submit"] {
            background-color: #007bff;
            /* Bootstrap primary blue */
            color: #fff;
            /* White text */
            border: none;
            padding: 12px 20px;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .booking-form input[type="submit"]:hover {
            background-color: #0056b3;
            /* Darker blue on hover */
        }

        .booking-form .alert {
            margin-top: 15px;
        }

        .booking-form .dropdown-menu {
            width: 100%;
            max-height: 300px;
            overflow-y: auto;
            padding: 10px;
        }

        .review-section {
            background-color: #f9f9f9;
            /* Light grey background */
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            /* Soft shadow effect */
            margin-top: 30px;
        }

        .review-section h5 {
            color: #555;
            /* Dark grey heading */
            font-size: 24px;
            margin-bottom: 20px;
        }

        .review-form {
            margin-bottom: 30px;
        }

        .review-form .form-group {
            margin-bottom: 20px;
        }

        .review-form label {
            font-weight: bold;
            color: #666;
            /* Grey text */
        }

        .review-form .stars {
            color: #ffd700;
            /* Gold */
        }

        .review-form .fa-star {
            cursor: pointer;
            transition: color 0.2s ease-in-out;
            font-size: 24px;
        }

        .review-form .fa-star:hover,
        .review-form .fa-star.checked {
            color: #f39c12;
            /* Orange on hover and checked */
        }

        .review-form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            /* Light grey border */
            border-radius: 5px;
            font-size: 16px;
            color: #333;
            /* Dark grey text */
            resize: vertical;
        }

        .review-form .btn-primary {
            background-color: #007bff;
            /* Bootstrap primary blue */
            color: #fff;
            /* White text */
            border: none;
            padding: 12px 20px;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .review-form .btn-primary:hover {
            background-color: #0056b3;
            /* Darker blue on hover */
        }

        .review-list {
            margin-top: 20px;
        }

        .review-list .list-group-item {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Soft shadow effect */
            margin-bottom: 10px;
        }

        .review-list .list-group-item p {
            margin-bottom: 5px;
        }

        .review-list .list-group-item .fa-star {
            color: #ffd700;
            /* Gold */
        }

        .review-list .list-group-item .fa-star.checked {
            color: #f39c12;
            /* Orange */
        }
    </style>
</head>

<body class="main-layout">
    <!-- loader -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="Loading..." /></div>
    </div>
    <!-- end loader -->

    <!-- header -->
    <header>
        @include('home.header')
    </header>
    <!-- end header -->
    <br />
    <br />
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="venue_detail">
                    <div style="padding: 20px;">
                        <figure>
                            <img src="venue/{{ $venue->image }}" alt="{{ $venue->venue_title }}"
                                class="img-fluid rounded" />
                        </figure>
                    </div>
                    <div>
                        <h3>{{ $venue->venue_title }}</h3>
                        <p>{{ $venue->description }}</p>
                        <h4>Host name:</h4>
                        <p>{{ $host->name }}</p>
                        <h4>Size:</h4>
                        <p>{{ $venue->venue_size }} sqft</p>
                        <h4>Availability:</h4>
                        <p>{{ $venue->venue_availability }}</p>
                        <h4>Address:</h4>
                        <p>{{ $venue->venue_address }}, {{ $venue->venue_town }}, {{ $venue->venue_postcode }},
                            {{ $venue->venue_city }}</p>
                        <h4>Price:</h4>
                        <p>{{ $venue->price }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="booking-form">
                    <h1>Book Venue</h1>
                    @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    @if (Auth::check())
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ url('add_booking', $venue->id) }}" method="POST" id="bookingForm">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{ Auth::user()->name }}"
                                    class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" value="{{ Auth::user()->email }}"
                                    class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" value="{{ Auth::user()->phone }}"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="startDate">Start Date</label>
                                <input type="date" name="startDate" id="startDate" class="form-control"
                                    onchange="updateEndDateMin();" required>
                            </div>
                            <div class="form-group">
                                <label for="endDate">End Date</label>
                                <input type="date" name="endDate" id="endDate" class="form-control"
                                    onchange="calculateDaysAndTotal()" required>
                            </div>
                            <div class="form-group">
                                <label for="purpose_booking">Purpose of Booking</label>
                                <textarea name="purpose_booking" class="form-control" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="no_participants">No of Participants</label>
                                <input type="number" name="no_participants" class="form-control">
                            </div>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="booking_days" id="booking_days">
                            <input type="hidden" name="booking_total" id="booking_total">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Book Venue">
                            </div>
                        </form>
                    @else
                        <div class="alert alert-warning">
                            <strong>To book a venue, you need to <a href="{{ route('login') }}">login</a> or <a
                                    href="{{ route('register') }}">register</a>.</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-">
            <div class="col-md-8">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="bookedDatesDropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Booked Dates
                    </button>
                    <div class="dropdown-menu" aria-labelledby="bookedDatesDropdown">
                        <div class="row">
                            @php
                                $hasBookings = false;
                            @endphp
                            @foreach ($bookings as $booking)
                                @php
                                    $payment = App\Models\Payment::where('booking_id', $booking->id)->first();
                                    $paymentStatus = $payment ? $payment->payment_status : null;
                                @endphp

                                @if ($booking->booking_status == 'approved' && $paymentStatus == 'paid')
                                    @php
                                        $hasBookings = true;
                                    @endphp
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <p class="card-text">
                                                    <strong>Start Date:</strong>
                                                    {{ date('F j, Y', strtotime($booking->booking_start_date)) }} <br>
                                                    <strong>End Date:</strong>
                                                    {{ date('F j, Y', strtotime($booking->booking_end_date)) }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                            @if (!$hasBookings)
                                <div class="col-12 text-center">
                                    <p class="card-text">No Confirmed Bookings Made</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content">
            <div class="col-md-8">
                <div class="review-section">
                    <h5 class="mb-4">Leave a Review</h5>
                    <form action="{{ url('add_review') }}" method="POST" class="review-form">
                        @csrf
                        <input type="hidden" name="username" value="{{ Auth::check() ? Auth::user()->name : '' }}">
                        <input type="hidden" name="venue_id" value="{{ $venue->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::check() ? Auth::user()->id : '' }}">

                        <div class="form-group">
                            <label for="rating">Rating:</label>
                            <div class="stars" id="rating">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="fa fa-star" data-index="{{ $i }}"></span>
                                @endfor
                                <input type="hidden" name="review_rating" id="rating_value" value="0">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="review_feedback">Feedback/Review:</label>
                            <textarea class="form-control" id="review_feedback" name="review_feedback" rows="3"
                                placeholder="Enter your feedback"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit Review</button>
                    </form>
                </div>

                <div class="review-list mt-5">
                    <h3>Reviews</h3>
                    @if ($reviews->isEmpty())
                        <p>No reviews yet.</p>
                    @else
                        <ul class="list-group">
                            @foreach ($reviews as $review)
                                <li class="list-group-item">
                                    <div>
                                        <p><strong>{{ $review->username }}</strong></p>
                                        <p>Rating:
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
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz4fnFO9gybBio8S9F6Yk4/2kgGaAl0XDzQ4K5fi8RXBnfZUR/+PpLfRa6" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-2xAldmXoPLQAMo9WvW10JJdFjEA81qGIO8I4Hhd0fKtPFneJ9c8DkF4L/WcUGbfh" crossorigin="anonymous">
    </script>

    <script>
        // Function to update min date for end date input
        document.addEventListener('DOMContentLoaded', function() {
            var today = new Date();
            var formattedDate = today.toISOString().split('T')[0];
            document.getElementById('startDate').min = formattedDate;
        });

        function updateEndDateMin() {
            var startDate = document.getElementById('startDate').value;
            document.getElementById('endDate').min = startDate;
        }

        // Function to calculate booking days and total price
        function calculateDaysAndTotal() {
            var startDate = document.getElementById('startDate').value;
            var endDate = document.getElementById('endDate').value;
            var venuePrice = {{ $venue->price }};

            if (startDate && endDate) {
                var start = new Date(startDate);
                var end = new Date(endDate);
                var timeDifference = end.getTime() - start.getTime();
                var daysDifference = timeDifference / (1000 * 3600 * 24) + 1; // Add 1 to include the start date
                var totalPrice = daysDifference * venuePrice;

                document.getElementById('booking_days').value = daysDifference;
                document.getElementById('booking_total').value = totalPrice.toFixed(2); // Adjust to two decimal places
            }
        }

        // Function to handle star rating
        $(document).ready(function() {
            $('.fa-star').on('mouseenter', function() {
                const index = $(this).data('index');
                $('.fa-star').removeClass('checked');
                for (let i = 1; i <= index; i++) {
                    $('.fa-star[data-index="' + i + '"]').addClass('checked');
                }
            }).on('mouseleave', function() {
                $('.fa-star').removeClass('checked');
                const rating = $('#rating_value').val();
                for (let i = 1; i <= rating; i++) {
                    $('.fa-star[data-index="' + i + '"]').addClass('checked');
                }
            }).on('click', function() {
                const index = $(this).data('index');
                $('#rating_value').val(index);
                $('.fa-star').removeClass('checked');
                for (let i = 1; i <= index; i++) {
                    $('.fa-star[data-index="' + i + '"]').addClass('checked');
                }
            });
        });
    </script>

    @include('home.footer')
</body>

</html>
