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
                            @if (Auth::user()->name == 'Admin')
                                <a href="{{ url('add_admin') }}" type="button" class="btn btn-light filter-btn">Add
                                    Admin</a>
                            @endif
                            <button type="button" class="btn btn-light filter-btn" data-status="all">All</button>
                            <button type="button" class="btn btn-light filter-btn" data-status="user">Users</button>
                            <button type="button" class="btn btn-light filter-btn" data-status="host">Hosts</button>
                            <button type="button" class="btn btn-light filter-btn" data-status="admin">Admins</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped bookings-table"
                            style="border: 3px solid;text-align: center;font-size: 13.5px;">
                            <thead>
                                <tr style="border: 3px solid">
                                    <th>No.</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Usertype</th>
                                    <th>
                                        @if (Auth::user()->name == 'Admin')
                                            Action
                                        @endif
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $user)
                                    <tr class="booking-row" data-role="{{ $user->usertype }}">
                                        <th scope="row">{{ $loop->iteration }}.</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->usertype }}</td>
                                        <td>
                                            @if ($user->usertype == 'admin' && Auth::user()->name == 'Admin')
                                                <a onclick="return confirm('Are you sure you want to delete this?')"
                                                    class="btn btn-danger"
                                                    href="{{ url('delete_admin', $user->id) }}">Delete</a>
                                            @endif
                                        </td>
                                    </tr>
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
        // Filter Functionality
        $(document).ready(function() {
            $('.filter-btn').click(function() {
                var status = $(this).data('status');

                if (status === 'all') {
                    $('.booking-row').show();
                } else {
                    $('.booking-row').hide();
                    $('.booking-row[data-role="' + status + '"]').show();
                }
            });
        });
    </script>
</body>

</html>
