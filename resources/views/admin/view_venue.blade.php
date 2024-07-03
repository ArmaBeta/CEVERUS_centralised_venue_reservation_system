<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
</head>

<style type="text/css">
    .room {
        margin-bottom: 20px;
    }

    .room_img img {
        height: 200px;
        width: 100%;
        object-fit: cover;
        border-radius: 15px 15px 0 0;
    }

    .bed_room {
        padding: 20px;
    }

    .btn-container {
        text-align: center;
    }

    .btn-container a {
        margin: 5px;
    }
</style>

<body>
    <!-- Header Section -->
    @include('admin.header')
    <!-- Header Section End -->

    <!-- Sidebar Navigation -->
    @include('admin.sidebar')
    <!-- Sidebar Navigation End -->

    <!-- Body Section -->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <!-- Table -->
                <div class="block margin-bottom-sm">
                    <div class="title"><strong>Your Venues</strong></div>
                    <div class="row">
                        @foreach ($data as $venue)
                            @if (Auth::user()->usertype == 'admin' || $venue->user_id == Auth::user()->id)
                                <div class="col-md-4 col-sm-6 mb-4">
                                    <div id="serv_hover" class="room border rounded shadow-sm">
                                        <div class="room_img">
                                            <figure class="text-center">
                                                <img src="venue/{{ $venue->image }}" alt="#" class="img-fluid" />
                                            </figure>
                                        </div>
                                        <div class="bed_room">
                                            <h3 class="text-center">{{ $venue->venue_title }}</h3>
                                            <p>RM {{ $venue->price }} / day</p>
                                            <p>{{ $venue->venue_town }}</p>
                                            <p>{{ $venue->venue_city }}</p>
                                            <p>Status : {{ $venue->venue_status }}</p>
                                            <div class="btn-container">
                                                <a class="btn btn-primary"
                                                    href="{{ url('venue_admin_details', $venue->id) }}">Venue
                                                    Details</a>
                                                @if (Auth::user()->usertype == 'admin')
                                                    <a onclick="return confirm('Are you sure you want to approve this?')"
                                                        class="btn btn-success"
                                                        href="{{ url('approve_venue', $venue->id) }}">Approve</a>
                                                    <a onclick="return confirm('Are you sure you want to reject this?')"
                                                        class="btn btn-danger"
                                                        href="{{ url('reject_venue', $venue->id) }}">Reject</a>
                                                @else
                                                    <a onclick="return confirm('Are you sure you want to delete this?')"
                                                        class="btn btn-danger"
                                                        href="{{ url('venue_delete', $venue->id) }}">Delete</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ url('venue_update', $venue->id) }}">Update</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <!-- Table End -->
            </div>
        </div>
    </div>
    <!-- Body Section End -->

    <!-- Footer Section -->
    @include('admin.footer')
    <!-- Footer Section End -->
</body>

</html>
