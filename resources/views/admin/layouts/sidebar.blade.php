<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        {{-- <a href="/home" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('images/Tlogo.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('images/logo-dark-1.png') }}" alt="" height="17">
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
    <div id="scrollbar" class="text-white">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                @php
                $currentRouteMenu = request()
                    ->route()
                    ->getName();
                @endphp
                <li class="menu-title"><span data-key="t-menu">Total</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ $currentRouteMenu === 'admin.home' ? 'active' : '' }}" data-key="t-analytics" href="/admin/home">
                        <i class='bx bxs-dashboard'></i><span data-key="t-layouts">Dashboard</span>
                    </a>
                </li> <!-- end Dashboard Menu -->
                <li class="menu-title"><span data-key="t-menu">Pages</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ $currentRouteMenu === 'users.index' ? 'active' : '' }} one" data-key="t-analytics" href="/admin/users">
                        <i class="bx bx-buildings"></i><span data-key="t-layouts">Users</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ $currentRouteMenu === 'contacts.index' ? 'active' : '' }} one" data-key="t-analytics" href="/admin/contacts">
                        <i class="bx bx-message-dots"></i> <span data-key="t-landing">Messages</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    {{-- <div class="sidebar-background"></div> --}}
</div>