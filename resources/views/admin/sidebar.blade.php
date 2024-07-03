<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar" class="shrinked">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
        </div>
        <!-- Sidebar Navigation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
            <li class="{{ Request::is('index') ? 'active' : '' }}">
                <a href="{{ url('index') }}">
                    <i class="icon-info"></i><span>All info</span>
                </a>
            </li>
            <li>
                <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse">
                    <i class="icon-home"></i><span>Venues</span>
                </a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li class="{{ Request::is('create_venue') ? 'active' : '' }}">
                        <a href="{{ url('create_venue') }}">Add Venue</a>
                    </li>
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
            <li class="{{ Request::is('all_messages') ? 'active' : '' }}">
                <a href="{{ url('all_messages') }}">
                    <i class="icon-email"></i><span>Messages</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- Sidebar Navigation end-->
    <!-- Page Content -->
