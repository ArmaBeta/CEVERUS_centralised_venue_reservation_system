<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CEVERUS</title>
    <!-- Include admin.css if needed -->
    {{-- @include('admin.css') --}}
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
                <div class="container mt-4">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">Add Admin</div>

                                <div class="card-body">
                                    <form method="POST" action="{{ 'store_admin' }}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input id="name" type="text" class="form-control" name="name"
                                                required autofocus>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input id="email" type="email" class="form-control" name="email"
                                                required>
                                        </div>

                                        <div class="form-group">
                                            <label for="phone">Phone Number</label>
                                            <input id="phone" type="text" class="form-control" name="phone"
                                                required>
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input id="password" type="password" class="form-control" name="password"
                                                required>
                                        </div>

                                        {{-- Hidden Field for usertype --}}
                                        <input type="hidden" name="usertype" value="admin">

                                        <div class="form-group mb-0">
                                            <button type="submit" class="btn btn-primary">
                                                Add Admin
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
</body>

</html>
