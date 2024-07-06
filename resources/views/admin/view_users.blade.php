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
                        <a href="{{ url('add_admin') }}" type="button" class="btn btn-light filter-btn" ">Add Admin</a>
                        <div class="btn-group">
                            <button type="button" class="btn btn-light filter-btn" data-status="all">All</button>
                            <button type="button" class="btn btn-light filter-btn">Users</button>
                            <button type="button" class="btn btn-light filter-btn">Host</button>
                            <button type="button" class="btn btn-light filter-btn">Admin</button>
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
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ($data as $data)
                            <tr class="booking-row">
                                <th scope="row">{{ $loop->iteration }}.</th>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->usertype }}</td>
                                <td>{{ $data->phone }}</td>
                                <td>{{ $data->Usertype }}</td>
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
