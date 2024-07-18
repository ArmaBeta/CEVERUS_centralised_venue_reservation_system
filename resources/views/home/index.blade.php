<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

    <style>
        /* Your custom styles */
        body {
            font-family: 'Open Sans', sans-serif;

        }

        .main-layout {
            position: relative;
        }

        .loader_bg {
            position: fixed;
            z-index: 999999;
            background: #fff;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loader {
            display: none;
        }

        .titlepage h2 {
            font-size: 2.5rem;
            color: #2c3e50;
            /* Navy color */
            margin-bottom: 20px;
        }

        .our_room .room {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
        }

        .our_room .room:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .room_img figure img {
            transition: transform 0.3s ease;
            height: 200px;
            width: 100%;
            object-fit: cover;
        }

        .room_img figure:hover img {
            transform: scale(1.05);
        }

        .bed_room h3 {
            font-size: 1.5rem;
            color: #2c3e50;
            /* Navy color */
        }

        .bed_room .btn {
            background-color: #2c3e50;
            /* Navy color */
            border: none;
            padding: 10px 20px;
            transition: background-color 0.3s ease;
        }

        .bed_room .btn:hover {
            background-color: #1a1a2e;
            /* Darker navy */
        }

        footer {
            background-color: #2c3e50;
            /* Navy color */
            padding: 20px 0;
            text-align: center;
        }

        footer a {}

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body class="main-layout">
    <!-- loader -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="Loading..." /></div>
    </div>
    <!-- end loader -->

    <!-- header -->
    <header>
        @include('home.header')
    </header>
    <!-- end header -->

    <!-- banner -->
    @include('home.slider')
    <!-- end banner -->

    <!-- about -->
    @include('home.about')
    <!-- end about -->

    <!-- our_venue -->
    <div class="our_room py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-12 text-center">
                    <div class="titlepage">
                        <h2>Our Venues</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($venue->take(3) as $venue)
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="room border rounded shadow-sm">
                            <div class="room_img">
                                <figure class="text-center">
                                    <img src="venue/{{ $venue->image }}" alt="Venue Image"
                                        class="img-fluid rounded-top" />
                                </figure>
                            </div>
                            <div class="bed_room p-3">
                                <h3 class="text-center">{{ $venue->venue_title }}</h3>
                                <div class="text-center">
                                    <a class="btn btn-primary" href="{{ url('venue_details', $venue->id) }}">Venue
                                        Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end our_venue -->

    <!-- contact -->
    @include('home.contact')
    <!-- end contact -->

    <!-- footer -->
    <footer>
        @include('home.footer')
    </footer>
    <!-- end footer -->
</body>

</html>
