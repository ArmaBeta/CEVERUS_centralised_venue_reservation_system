<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
</head>

<body>
    {{-- Include Header --}}
    @include('admin.header')
    {{-- End Header --}}

    {{-- Sidebar Navigation --}}
    @include('admin.sidebar')
    {{-- End Sidebar Navigation --}}

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Dashboard</h2>
            </div>
        </div>

        <!-- Total Statistics Section -->
        <section class="no-padding-top no-padding-bottom">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="container-fluid">
                        <h2 class="h5 no-margin-bottom">Bookings</h2>
                    </div>
                </div>
                <div class="row">
                    <!-- Total Bookings -->
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="statistic-block block">
                            <div class="progress-details d-flex align-items-end justify-content-between">
                                <div class="title">
                                    <div class="icon"><i class="icon-contract"></i></div>
                                    <strong>Total Bookings</strong>
                                </div>
                                <div class="number dashtext-1">{{ $totalBookings }}</div>
                            </div>
                            <div class="progress progress-template">
                                <div role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                    aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="statistic-block block">
                            <div class="progress-details d-flex align-items-end justify-content-between">
                                <div class="title">
                                    <div class="icon"><i class="icon-"></i></div>
                                    <strong>Approved Bookings</strong>
                                </div>
                                <div class="number dashtext-1">{{ $totalApprovedBookings }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="statistic-block block">
                            <div class="progress-details d-flex align-items-end justify-content-between">
                                <div class="title">
                                    <div class="icon"><i class="icon-cross"></i></div>
                                    <strong>Rejected Bookings</strong>
                                </div>
                                <div class="number dashtext-2">{{ $totalRejectedBookings }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="statistic-block block">
                            <div class="progress-details d-flex align-items-end justify-content-between">
                                <div class="title">
                                    <div class="icon"><i class="icon-clock"></i></div>
                                    <strong>Pending Bookings</strong>
                                </div>
                                <div class="number dashtext-3">{{ $totalPendingBookings }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @if (Auth::user()->usertype == 'admin')
                    <div class="page-header">
                        <div class="container-fluid">
                            <h2 class="h5 no-margin-bottom">Users</h2>
                        </div>
                    </div>

                    <div class="row">

                        <!-- Total Users -->
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="statistic-block block">
                                <div class="progress-details d-flex align-items-end justify-content-between">
                                    <div class="title">
                                        <div class="icon"><i class="icon-user-1"></i></div>
                                        <strong>Users</strong>
                                    </div>
                                    <div class="number dashtext-2">{{ $totalUsers }}</div>
                                </div>
                                <div class="progress progress-template">
                                    <div role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0"
                                        aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Hosts -->
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="statistic-block block">
                                <div class="progress-details d-flex align-items-end justify-content-between">
                                    <div class="title">
                                        <div class="icon"><i class="icon-user-1"></i></div>
                                        <strong>Hosts</strong>
                                    </div>
                                    <div class="number dashtext-3">{{ $totalHosts }}</div>
                                </div>
                                <div class="progress progress-template">
                                    <div role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0"
                                        aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Admins -->
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="statistic-block block">
                                <div class="progress-details d-flex align-items-end justify-content-between">
                                    <div class="title">
                                        <div class="icon"><i class="icon-user-1"></i></div>
                                        <strong>Admins</strong>
                                    </div>
                                    <div class="number dashtext-1">{{ $totalAdmins }}</div>
                                </div>
                                <div class="progress progress-template">
                                    <div role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0"
                                        aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="page-header">
                    <div class="container-fluid">
                        <h2 class="h5 no-margin-bottom">Venues</h2>
                    </div>
                </div>
                <!-- Total Venues -->
                <div class="row">
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="statistic-block block">
                            <div class="progress-details d-flex align-items-end justify-content-between">
                                <div class="title">
                                    <div class="icon"><i class="icon-home"></i></div>
                                    <strong>Venues</strong>
                                </div>
                                <div class="number dashtext-1">{{ $totalVenues }}</div>
                            </div>
                            <div class="progress progress-template">
                                <div role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0"
                                    aria-valuemax="100" class="progress-bar progress-bar-template dashbg-5">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="statistic-block block">
                            <div class="progress-details d-flex align-items-end justify-content-between">
                                <div class="title">
                                    <div class="icon"><i class="icon"></i></div>
                                    <strong>Approved Venues</strong>
                                </div>
                                <div class="number dashtext-1">{{ $totalApprovedVenues }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="statistic-block block">
                            <div class="progress-details d-flex align-items-end justify-content-between">
                                <div class="title">
                                    <div class="icon"><i class="icon-cross"></i></div>
                                    <strong>Rejected Venues</strong>
                                </div>
                                <div class="number dashtext-2">{{ $totalRejectedVenues }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="statistic-block block">
                            <div class="progress-details d-flex align-items-end justify-content-between">
                                <div class="title">
                                    <div class="icon"><i class="icon-clock"></i></div>
                                    <strong>Pending Venues</strong>
                                </div>
                                <div class="number dashtext-3">{{ $totalPendingVenues }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">Bookings Per Venues</h2>
                </div>
            </div>
            <!-- Venue Statistics Section -->
            <div class="container-fluid">
                <div class="row">
                    @foreach ($venues as $venue)
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="statistic-block block">
                                <div class="progress-details d-flex align-items-end justify-content-between">
                                    <div class="title">
                                        <div class="icon"><i class="icon-home"></i></div>
                                        <strong>{{ $venue->venue_title }}</strong>
                                        <a class="icon-info" href="{{ url('venue_admin_details', $venue->id) }}"></a>
                                    </div>
                                    <div class="number dashtext-1">{{ $venue->bookings_count }}</div>
                                </div>
                                <div class="progress progress-template">
                                    <div role="progressbar"
                                        style="width: {{ ($venue->bookings_count / max($venues->pluck('bookings_count')->max(), 1)) * 100 }}%"
                                        aria-valuenow="{{ $venue->bookings_count }}" aria-valuemin="0"
                                        aria-valuemax="{{ $venues->pluck('bookings_count')->max() }}"
                                        class="progress-bar progress-bar-template dashbg-6"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

    {{-- Include Footer --}}
    @include('admin.footer')
    {{-- End Footer --}}

    <!-- Include JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>
