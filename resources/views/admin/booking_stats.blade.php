<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>

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
                <h2 class="title">Booking Statistics</h2>
                @foreach ($venues as $venue)
                    @if ($venue->venue_status == 'approved')
                        <div class="col-md-3 col-sm-6">
                            <div class="statistic-block block">
                                <div class="progress-details d-flex align-items-end justify-content-between">
                                    <div class="title">
                                        <div class="icon"><i class="icon-user-1"></i></div>
                                        <strong>{{ $venue->venue_title }}</strong>
                                    </div>
                                    <div class="number dashtext-1">{{ $venue->bookings_count }}</div>
                                </div>
                                <div class="progress progress-template">
                                    @php
                                        $totalBookings = $venues->sum('bookings_count');
                                        $percentage =
                                            $totalBookings > 0 ? ($venue->bookings_count / $totalBookings) * 100 : 0;
                                    @endphp
                                    <div role="progressbar" style="width: {{ $percentage }}%"
                                        aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100"
                                        class="progress-bar progress-bar-template dashbg-1"></div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
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
