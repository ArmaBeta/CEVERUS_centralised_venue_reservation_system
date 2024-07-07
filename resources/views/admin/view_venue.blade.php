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

    .status {
        font-weight: bold;
    }

    .status.pending {
        color: blue;
    }

    .status.approved {
        color: green;
    }

    .status.reject {
        color: red;
    }

    /* Adjusting filter buttons */
    .filter-btn-group {
        text-align: right;
        margin-bottom: 10px;
    }

    .filter-btn {
        margin-left: 5px;
    }

    .search-form {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 20px;
    }

    .search-form input {
        flex: 1 0 50%;
        border-radius: 20px 0 0 20px;
        padding: 10px;
        border: 1px solid #ced4da;
    }

    .search-form button {
        border-radius: 0 20px 20px 0;
        padding: 10px 20px;
        border: 1px solid #ced4da;
        border-left: none;
    }
</style>

<body>
    @php
        $data = $data->sortByDesc('created_at');
    @endphp
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
                <!-- Filter Buttons -->
                <div class="">
                    <div class="title"><strong>Your Venues</strong>
                    </div>
                </div>
                <!-- Filter Buttons End -->
                <!-- Search Form -->
                <div class="">
                    <form action="{{ url('search_venues') }}" method="GET" class="form-inline mb-6">
                        <input type="text" name="query" class="form-control mr-2" placeholder="Search venues" />
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
                <!-- Search Form End -->
                <div class="filter-btn-group">
                    <button type="button" class="btn btn-light filter-btn" data-status="all">All</button>
                    <button type="button" class="btn btn-light filter-btn" data-status="pending">Pending</button>
                    <button type="button" class="btn btn-light filter-btn" data-status="approved">Approved</button>
                    <button type="button" class="btn btn-light filter-btn" data-status="reject">Rejected</button>
                </div>
                <div class="row">
                    @foreach ($data as $venue)
                        @if (Auth::user()->usertype == 'admin' || $venue->user_id == Auth::user()->id)
                            <div class="col-md-4 col-sm-6 mb-4 venue-card"
                                data-status="{{ strtolower($venue->venue_status) }}">
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
                                        <span>Status :</span>
                                        <span class="status {{ $venue->venue_status }}">
                                            {{ ucfirst($venue->venue_status) }}</span>
                                        @if (Auth::user()->usertype == 'host' && $venue->venue_status == 'reject')
                                            <p>Reason: {{ $venue->venue_reason }}</p>
                                        @endif
                                        <div class="btn-container">
                                            <a class="btn btn-primary"
                                                href="{{ url('venue_admin_details', $venue->id) }}">Venue
                                                Details</a>
                                            @if (Auth::user()->usertype == 'admin')
                                                <div class="btn-group">
                                                    <a class="btn btn-success"
                                                        href="{{ url('approve_venue', $venue->id) }}">Approve</a>
                                                    <a class="btn btn-danger reject-btn" data-toggle="modal"
                                                        data-target="#rejectModal{{ $venue->id }}"
                                                        style="color: white">
                                                        Reject
                                                    </a>
                                                </div>

                                                <!-- Modal -->
                                                <div class="modal fade" id="rejectModal{{ $venue->id }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="rejectModalLabel{{ $venue->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <form action="{{ url('reject_venue', $venue->id) }}"
                                                                method="GET">
                                                                @csrf
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="rejectModalLabel{{ $venue->id }}">
                                                                        Reason for Rejection</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="rejection_reason">Enter
                                                                            reason:</label>
                                                                        <textarea class="form-control" id="rejection_reason" name="venue_reason" rows="3"
                                                                            placeholder="Enter reason for rejection" required></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-danger">Reject
                                                                        venue</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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
    <!-- Body Section End -->

    <!-- Footer Section -->
    @include('admin.footer')
    <!-- Footer Section End -->

    <script>
        // Filter Functionality
        $(document).ready(function() {
            $('.filter-btn').click(function() {
                var status = $(this).data('status');

                if (status === 'all') {
                    $('.venue-card').show();
                } else {
                    $('.venue-card').hide();
                    $('.venue-card[data-status="' + status + '"]').show();
                }
            });
        });
    </script>
</body>

</html>
