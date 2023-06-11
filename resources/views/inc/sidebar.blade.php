<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if(Route::is('home')) active @endif">
        <a class="nav-link" href="{{route('home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @if (Auth::user()->isUser())
        <li class="nav-item @if(Route::is('create.prescription')) active @endif">
            <a class="nav-link" href="{{ route('create.prescription') }}">
                <i class="fas fa-fw fa-inbox"></i>
                <span>Prescriptions</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <li class="nav-item @if(Route::is('quotations')) active @endif">
            <a class="nav-link" href="{{ route('quotations') }}">
                <i class="fas fa-fw fa-inbox"></i>
                <span>Quotations</span></a>
        </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    @if(Auth::user()->isPharmacy())
    <li class="nav-item @if(Route::is('prescriptions')) active @endif">
        <a class="nav-link" href="{{ route('prescriptions') }}">
            <i class="fas fa-fw fa-inbox"></i>
            <span>Prescriptions</span></a>
    </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->
