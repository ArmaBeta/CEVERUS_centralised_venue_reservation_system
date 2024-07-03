<!DOCTYPE html>
<html lang="en">

<head>
    @include ('home.css')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        @include('home.header')
    </header>
    <!-- end header inner -->
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
                        <h2>Our Venue</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($venue->take(3) as $venue)
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div id="serv_hover" class="room border rounded shadow-sm">
                            <div class="room_img">
                                <figure class="text-center">
                                    <img style="height: 200px; width: 100%; object-fit: cover;"
                                        src="venue/{{ $venue->image }}" alt="#" class="img-fluid rounded-top" />
                                </figure>
                            </div>
                            <div class="bed_room p-3">
                                <h3 class="text-center">{{ $venue->venue_title }}</h3>
                                <p>{!! Str::limit($venue->description, 100) !!}</p>
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
    <!-- blog -->

    <!-- end blog -->
    <!--  contact -->
    @include('home.contact')
    <!-- end contact -->
    <!--  footer -->
    @include('home.footer')
    <!-- end footer -->
</body>

</html>
