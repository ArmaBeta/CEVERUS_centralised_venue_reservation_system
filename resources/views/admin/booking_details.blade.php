<!DOCTYPE html>
<html>

<head>
    <base href="/public">
    @include('admin.css')
    <style>
        .booking-details-card {
            border: 3px solid;
            padding: 20px;
            margin: 20px 0;
            font-size: 15px;
            background-color: #343a40;
            color: white;
        }

        .booking-details-card h4 {
            margin-bottom: 20px;
            color: #f8f9fa;
        }

        .booking-details-card p {
            margin: 10px 0;
            color: #ced4da;
        }
    </style>
</head>

<body>
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
                    <h2 class="title mb-0"><strong>Booking Details</strong></h2>
                    <div class="booking-details-card">
                        <h4>Booking Information</h4>
                        <p><strong>Venue Title:</strong> {{ optional($booking->venue)->venue_title ?? 'N/A' }}</p>
                        <p><strong>Username:</strong> {{ $booking->booking_name }}</p>
                        <p><strong>Email:</strong> {{ $booking->booking_email }}</p>
                        <p><strong>Phone Number:</strong> {{ $booking->booking_phone }}</p>
                        <p><strong>Start Date:</strong> {{ $booking->booking_start_date }}</p>
                        <p><strong>End Date:</strong> {{ $booking->booking_end_date }}</p>
                        <p><strong>Purpose:</strong> {{ $booking->booking_purpose }}</p>
                        <p><strong>Number of Participants:</strong> {{ $booking->booking_no_participants }}</p>
                        <p><strong>Total Payment:</strong> {{ $booking->booking_total }}</p>
                        <p><strong>Booking Status:</strong> {{ $booking->booking_status }}</p>
                        @if ($booking->booking_status == 'rejected')
                            <p><strong>Reason of rejection :</strong> {{ $booking->booking_reason }}</p>
                        @endif
                        @if ($booking->booking_status == 'cancelled')
                            <p><strong>Reason of cancellation :</strong> {{ $booking->booking_reason }}</p>
                        @endif
                    </div>
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
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
</body>

</html>
