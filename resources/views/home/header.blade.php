<!-- header inner -->
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                <div class="full">
                    <div class="center-desk">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                <h1>CEVERUS</h1>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                <nav class="navigation navbar navbar-expand-md navbar-dark">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04"
                        aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarsExample04">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="nav-item {{ request()->is('all_venues') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('all_venues') }}">Venues</a>
                            </li>
                            <li class="nav-item {{ request()->is('contact_us') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('contact_us') }}">Contact Us</a>
                            </li>

                            @auth
                                <li class="nav-item {{ request()->is('my_bookings') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ url('my_bookings') }}">My Bookings</a>
                                </li>
                            @endauth

                            <li class="nav-item {{ request()->is('register_host') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('register_host') }}">Join as a Host</a>
                            </li>

                            @if (Route::has('login'))
                                @auth
                                    <x-app-layout></x-app-layout>
                                @else
                                    <li class="nav-item" style="padding-right: 10px">
                                        <a class="btn btn-success" href="{{ url('login') }}">Login</a>
                                    </li>

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="btn btn-primary" href="{{ url('register') }}">Register</a>
                                        </li>
                                    @endif
                                @endauth
                            @endif

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
