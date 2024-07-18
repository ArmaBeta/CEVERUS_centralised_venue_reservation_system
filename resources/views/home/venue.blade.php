<style>
    .our_room {
        background-color: #f8f9fa; /* Light background color */
        padding: 80px 0; /* Adjust padding for spacing */
    }

    .titlepage h2 {
        color: #343a40; /* Dark text color */
        font-size: 36px; /* Adjust font size */
        font-weight: bold; /* Ensure heading stands out */
        margin-bottom: 40px; /* Space below heading */
    }

    .form-inline .form-control {
        width: 70%; /* Adjust input width */
        margin-right: 10px; /* Space between input and button */
    }

    .btn-primary {
        background-color: #0056b3; /* Navy blue button color */
        border-color: #0056b3; /* Navy blue button border color */
        color: #ffffff; /* White text color */
        transition: background-color 0.3s ease; /* Smooth background color transition */
    }

    .btn-primary:hover {
        background-color: #004280; /* Darker navy blue on hover */
        border-color: #004280;
    }

    .room {
        background-color: #ffffff; /* White background for each room */
        padding: 20px; /* Padding inside each room card */
        border: 1px solid #dee2e6; /* Light border color */
        border-radius: 8px; /* Rounded corners for cards */
        transition: box-shadow 0.3s ease; /* Smooth shadow transition */
    }

    .room:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow on hover */
    }

    .room_img img {
        width: 100%; /* Ensure images fill their container */
        height: auto; /* Maintain aspect ratio */
        border-radius: 8px 8px 0 0; /* Rounded top corners for images */
    }

    .bed_room {
        padding: 20px 0; /* Padding above and below room details */
    }

    .bed_room h3 {
        font-size: 24px; /* Room title font size */
        margin-top: 15px; /* Space above room title */
        color: #343a40; /* Dark text color */
    }

    .bed_room p {
        margin-bottom: 10px; /* Space between paragraphs */
        color: #6c757d; /* Medium-dark text color */
    }

    .btn-container {
        text-align: center; /* Center align buttons */
        margin-top: 20px; /* Space above buttons */
    }
</style>

<div class="our_room">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12 text-center">
                <div class="titlepage">
                    <h2>Explore Our Venues</h2>
                </div>
            </div>
        </div>
        
        <!-- Search Form -->
        <div class="row mb-4 justify-content-center">
            <div class="col-md-6">
                <form action="{{ url('all_venues') }}" method="GET" class="form-inline">
                    <input type="text" name="search" class="form-control mr-2"
                        placeholder="Search by venue name, town or city..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>

        <div class="row">
            @foreach ($venue as $venue)
                @if ($venue->venue_status == 'approved')
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="room border rounded shadow-sm">
                            <div class="room_img">
                                <figure class="text-center">
                                    <img src="venue/{{ $venue->image }}" alt="{{ $venue->venue_title }}" class="img-fluid" />
                                </figure>
                            </div>
                            <div class="bed_room">
                                <h3 class="text-center">{{ $venue->venue_title }}</h3>
                                <p>RM {{ $venue->price }} / day</p>
                                <p>{{ $venue->venue_town }}</p>
                                <p>{{ $venue->venue_city }}</p>
                                <div class="btn-container">
                                    <a class="btn btn-primary" href="{{ url('venue_details', $venue->id) }}">Venue
                                        Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
