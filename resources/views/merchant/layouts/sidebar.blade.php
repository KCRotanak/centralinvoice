<!-- ========== App Menu ========== -->

<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        {{-- <a href="/home" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logoweb.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logoweb.png') }}" alt="" height="17">
            </span>
        </a> --}}
        <!-- Light Logo-->
        <a href="#" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logoweb.png') }}" alt="" height="50">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logoweb.png') }}" alt="" height="50">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                @php
                $currentRouteName = request()
                    ->route()
                    ->getName();
                @endphp
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a href="/merchant/home" class="nav-link menu-link {{ $currentRouteName === 'merchant.home' ? 'active' : '' }}" role="button"
                    aria-expanded="false"><i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li> <!-- end Dashboard Menu -->

                {{-- <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Pages</span></li> --}}
                <li class="menu-title"><span data-key="t-pages">Pages</span></li>
                <li class="nav-item">
                    <a href="/merchant/customers" class="nav-link menu-link {{ $currentRouteName === 'customers.index' ? 'active' : '' }} one" role="button"
                        aria-expanded="false"><i class="ri-group-line"></i> <span data-key="t-dashboards">Customer</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/merchant/invoices" class="nav-link menu-link {{ $currentRouteName === 'invoices.index' ? 'active' : '' }} one" role="button"
                        aria-expanded="false"><i class="ri-newspaper-line"></i> <span data-key="t-dashboards">Invoice</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    {{-- <div class="sidebar-background"></div> --}}
</div>
