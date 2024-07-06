<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

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
                <div class="row">
                    @foreach ($venues as $venue)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="statistic-block block">
                                <div class="progress-details d-flex align-items-end justify-content-between">
                                    <div class="title">
                                        <div class="icon"><i class="icon-home"></i></div>
                                        <strong>{{ $venue->venue_title }}

                                            <a class="icon-info"
                                                href="{{ url('venue_admin_details', $venue->id) }}"></a>

                                        </strong>
                                    </div>
                                    <div class="number dashtext-1">{{ $venue->bookings_count }}</div>
                                </div>
                                <div class="progress progress-template">
                                    <div role="progressbar"
                                        style="width: {{ ($venue->bookings_count / max($venues->pluck('bookings_count')->max(), 1)) * 100 }}%"
                                        aria-valuenow="{{ $venue->bookings_count }}" aria-valuemin="0"
                                        aria-valuemax="{{ $venues->pluck('bookings_count')->max() }}"
                                        class="progress-bar progress-bar-template dashbg-1"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
