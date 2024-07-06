<header class="header">
    <nav class="navbar navbar-expand-lg">
        <div class="search-panel">
            <div class="search-inner d-flex align-items-center justify-content-center">

            </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="navbar-header">
                <!-- Navbar Header--><a href="index.html" class="navbar-brand">
                    @if (Auth::user()->usertype == 'host')
                        <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Host
                                Panel</strong></div>
                    @else
                        <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Admin
                                Panel</strong></div>
                    @endif
                    <div class="brand-text brand-sm"><strong class="text-primary">D</strong><strong>A</strong></div>
                </a>
                <!-- Sidebar Toggle Btn-->

            </div>
            {{-- Log out  --}}
            <div class="right-menu list-inline no-margin-bottom">
                <div class="list-inline-item logout">
                    <x-app-layout>

                    </x-app-layout>
                </div>
            </div>
        </div>
    </nav>
</header>
