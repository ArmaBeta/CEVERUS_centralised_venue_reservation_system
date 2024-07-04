<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('home.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style type="text/css">
        label {
            display: inline-block;
            width: 200px;
        }

        input,
        textarea {
            width: 100%;
        }

        .stars {
            color: #D3D3D3;
            /* yellow */
        }

        .fa-star {
            cursor: pointer;
            transition: color 0.2s ease-in-out;
        }

        .fa-star:hover,
        .fa-star.checked {
            color: #f39c12;
            /* change color on hover and when checked */
        }
    </style>
</head>

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        @include('home.header')
    </header>
    <!-- end header inner -->
    <!-- end header -->
    <div class="our_room">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                </div>
            </div>
            <div class="row">

                <div class="col-md-8 ">
                    <div id="serv_hover" class="venue_detail">
                        <div style="padding: 20px;">
                            <figure>
                                <img style="height: 300px; width: 800px; border: solid black;border-radius:25px"
                                    src="venue/{{ $venue->image }}" alt="#" />
                            </figure>
                        </div>
                        <div>
                            <h3>{{ $venue->venue_title }}</h3>
                            <p>{{ $venue->description }}</p>
                            <h4>Size : </h4>
                            <p>{{ $venue->venue_size }} sqft</p>
                            <h4>Availability : </h4>
                            <p>{{ $venue->venue_availability }}</p>
                            <h4>Address : </h4>
                            <p>{{ $venue->venue_address }},{{ $venue->venue_town }},{{ $venue->venue_postcode }},
                                {{ $venue->venue_city }}
                            </p>
                            <h4>Price :</h4>
                            <p>{{ $venue->price }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h1 style="font-size: 40px!important">Book Venue</h1>
                    <div>
                        @if (session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session()->get('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                    </div>
                    @if (Auth::check())
                        {{-- Booking Form --}}
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
                            <div>
                                <label>Name</label>
                                <input type="text" name="name" value="{{ Auth::user()->name }}">
                            </div>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <div>
                                <label>Email</label>
                                <input type="text" name="email" value="{{ Auth::user()->email }}">
                            </div>
                            <div>
                                <label>Phone</label>
                                <input type="text" name="phone" value="{{ Auth::user()->phone }}">
                            </div>
                            <div>
                                <label>Start Date</label>
                                <input type="date" name="startDate" id="startDate"
                                    onchange="updateEndDateMin(); calculateDaysAndTotal()">
                            </div>
                            <div>
                                <label>End Date</label>
                                <input type="date" name="endDate" id="endDate" onchange="calculateDaysAndTotal()">
                            </div>
                            <div>
                                <label>Purpose of Booking</label>
                                <textarea name="purpose_booking"></textarea>
                            </div>
                            <div>
                                <label>No of Participants</label>
                                <input type="number" name="no_participants">
                            </div>
                            <input type="hidden" name="booking_days" id="booking_days">
                            <input type="hidden" name="booking_total" id="booking_total">
                            <div style="padding-top: 20px">
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
    <div class="container mt-5">
        <div class="row justify-content">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Leave a Review</h5>
                        <label>{{ Auth::check() ? Auth::user()->name : 'Guest' }}</label>
                        <!-- Review Form -->
                        <form action="{{ url('add_review') }}" method="POST">
                            @csrf
                            <input type="hidden" name="username"
                                value="{{ Auth::check() ? Auth::user()->name : '' }}">
                            <input type="hidden" name="venue_id" value="{{ $venue->id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::check() ? Auth::user()->id : '' }}">

                            <!-- Rating stars -->
                            <div class="form-group">
                                <label for="rating">Rating:</label>
                                <div class="stars" id="rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="fa fa-star" data-index="{{ $i }}"></span>
                                    @endfor
                                    <input type="hidden" name="review_rating" id="rating_value" value="0">
                                </div>
                            </div>

                            <!-- Feedback/Review -->
                            <div class="form-group">
                                <label for="feedback">Feedback/Review:</label>
                                <textarea class="form-control" id="feedback" name="review_feedback" rows="3"
                                    placeholder="Enter your feedback"></textarea>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary">Submit Review</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="row mt-5">
            <h3>Reviews</h3>
            @if ($reviews->isEmpty())
                <p>No reviews yet.</p>
            @else
                <ul class="list-group">
                    @foreach ($reviews as $review)
                        <div class="row mt-5">
                            <div class="col-md-8">
                                <li class="list-group-item">
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
                            </div>
                        </div>
                    @endforeach
                </ul>
            @endif
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
        function updateEndDateMin() {
            var startDate = document.getElementById('startDate').value;
            document.getElementById('endDate').min = startDate;
        }
        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();

            if (month < 10)
                month = '0' + month.toString();

            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            $('#startDate').attr('min', maxDate);
            $('#endDate').attr('min', maxDate);
        });
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
