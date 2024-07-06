<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar" class="shrinked">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
        </div>
        <!-- Sidebar Navigation Menus-->
        <span class="heading">Main</span>
        <ul class="list-unstyled">
            <li class="{{ Request::is('home') ? 'active' : '' }}">
                <a href="{{ url('home') }}">
                    <i class="icon-info"></i><span>Dashboard</span>
                </a>
            </li>
            @if (Auth::user()->usertype == 'admin')
                <li>
                    <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse">
                        <i class="icon-home"></i><span>Venues</span>
                    </a>
                    <ul id="exampledropdownDropdown" class="collapse list-unstyled">
                        <li class="{{ Request::is('view_venue') ? 'active' : '' }}">
                            <a href="{{ url('view_venue') }}">View Venues</a>
                        </li>
                    </ul>
                </li>

                <li class="{{ Request::is('all_messages') ? 'active' : '' }}">
                    <a href="{{ url('all_messages') }}">
                        <i class="icon-email"></i><span>Messages</span>
                    </a>
                </li>
                <li class="{{ Request::is('view_users') ? 'active' : '' }}">
                    <a href="{{ url('view_users') }}">
                        <i class="icon-user-1"></i><span>Users</span>
                    </a>
                </li>
            @elseif(Auth::user()->usertype == 'host')
                <li>
                    <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse">
                        <i class="icon-home"></i><span>Venues</span>
                    </a>
                    <ul id="exampledropdownDropdown" class="collapse list-unstyled">
                        <li class="{{ Request::is('create_venue') ? 'active' : '' }}">
                            <a href="{{ url('create_venue') }}">Add Venue</a>
                        </li>
                    </ul>
                    <ul id="exampledropdownDropdown" class="collapse list-unstyled">
                        <li class="{{ Request::is('view_venue') ? 'active' : '' }}">
                            <a href="{{ url('view_venue') }}">View Venues</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ Request::is('bookings') ? 'active' : '' }}">
                    <a href="{{ url('bookings') }}">
                        <i class="icon-contract"></i><span>Bookings</span>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
    <!-- Sidebar Navigation end-->
    <!-- Page Content -->
