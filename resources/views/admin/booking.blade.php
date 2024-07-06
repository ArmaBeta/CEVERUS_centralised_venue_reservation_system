<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>
        td {
            font-size: 15px;
        }
    </style>
</head>

<body>
    @php
        $data = $data->sortByDesc('created_at');
    @endphp
    {{-- Header Section --}}
    @include('admin.header')
    {{-- Header Section End --}}
    {{-- Sidebar Navigation --}}
    @include('admin.sidebar')
    {{-- Sidebar Navigation End --}}
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <div class="block margin-bottom-sm">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2 class="title mb-0"><strong>Bookings</strong></h2>
                        <div class="btn-group">
                            <button type="button" class="btn btn-light filter-btn" data-status="all">All</button>
                            <button type="button" class="btn btn-light filter-btn"
                                data-status="pending">Pending</button>
                            <button type="button" class="btn btn-light filter-btn"
                                data-status="approved">Approved</button>
                            <button type="button" class="btn btn-light filter-btn"
                                data-status="rejected">Rejected</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped bookings-table"
                            style="border: 3px solid;text-align: center;font-size: 13.5px;">
                            <thead>
                                <tr style="border: 3px solid">
                                    <th>No.</th>
                                    <th>Venue Title</th>
                                    <th>Total</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone no.</th>

                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Booking Details</th>
                                    <th>Payment Status</th>
                                    <th>Status Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $booking)
                                    @if (Auth::user()->usertype == 'admin' || optional($booking->venue)->user_id == Auth::user()->id)
                                        <tr class="booking-row" data-status="{{ $booking->booking_status }}">
                                            <th scope="row">{{ $loop->iteration }}.</th>
                                            <td>{{ optional($booking->venue)->venue_title ?? 'N/A' }}</td>
                                            <td>RM {{ $booking->booking_total }}</td>
                                            <td>{{ $booking->booking_name }}</td>
                                            <td>{{ $booking->booking_email }}</td>
                                            <td>{{ $booking->booking_phone }}</td>

                                            <td>
                                                @if ($booking->booking_status == 'approved')
                                                    <span style="color: greenyellow;">Approved</span>
                                                @elseif ($booking->booking_status == 'rejected')
                                                    <span style="color: red;">Rejected</span>
                                                @elseif ($booking->booking_status == 'pending')
                                                    <span style="color: rgb(0, 153, 255);">Pending</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if (optional($booking->venue)->image)
                                                    <img width="300px" height="500px"
                                                        src="venue/{{ optional($booking->venue)->image }}">
                                                @else
                                                    <span>N/A</span>
                                                @endif
                                            </td>

                                            <td>
                                                <a class="btn btn-primary icon-info"
                                                    href="{{ url('booking_details', $booking->id) }}"></a>
                                            </td>
                                            <td>
                                                @if ($booking->payment_status == 'Paid')
                                                    <a
                                                        href="{{ url('payment_details', $booking->id) }}">{{ $booking->payment_status }}</a>
                                                @else
                                                    {{ $booking->payment_status }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($booking->booking_status != 'rejected' && $booking->booking_status != 'approved')
                                                    <div class="btn-group">
                                                        <a class="btn btn-success"
                                                            href="{{ url('approve_book', $booking->id) }}">Approve</a>
                                                        <button class="btn btn-danger reject-btn" data-toggle="modal"
                                                            data-target="#rejectModal{{ $booking->id }}">Reject</button>
                                                    </div>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="rejectModal{{ $booking->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="rejectModalLabel{{ $booking->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <form action="{{ url('reject_book', $booking->id) }}"
                                                                    method="GET">
                                                                    @csrf
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="rejectModalLabel{{ $booking->id }}">
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
                                                                            <textarea class="form-control" id="rejection_reason" name="booking_reason" rows="3"
                                                                                placeholder="Enter reason for rejection" required></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Reject
                                                                            Booking</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif ($booking->booking_status == 'rejected' || $booking->booking_status == 'approved')
                                                    <div class="btn-group">
                                                        <a class="btn " style="color: white">Status
                                                            Updated</a>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Footer Section --}}
    @include('admin.footer')
    {{-- Footer Section End --}}

    <!-- Include JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        document.querySelectorAll('.filter-btn').forEach(button => {
            button.addEventListener('click', () => {
                const status = button.getAttribute('data-status');
                document.querySelectorAll('.booking-row').forEach(row => {
                    if (status === 'all' || row.getAttribute('data-status') === status) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>

</html>
