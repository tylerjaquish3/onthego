<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="/" class="site_title">
                <!-- <img src="{{ url('/images/ET-logo-color-notag.png') }}" id="full"> -->
                <img src="{{ url('/images/ET-logo-color-square.png') }}" id="full">
                <span>{{ config('app.name') }}</span>
            </a>
        </div>

        <div class="clearfix"></div>
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li><a href="{{ route('photos.index') }}"><i class="fa fa-shopping-cart"></i> Photos</a></li>
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <!-- @yield('nav-footer-buttons') -->
        <!-- /menu footer buttons -->
    </div>
</div>