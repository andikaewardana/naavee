<!-- Sidebar -->
<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="bg-header-dark">
        <div class="content-header bg-white-5">
        <!-- Logo -->
        <a class="fw-semibold text-white tracking-wide" href="index.html">
            <span class="smini-visible">
                <span class="opacity-75">Naavee</span>
            </span>
            <span class="smini-hidden">
                <span class="opacity-75">Naavee</span>
            </span>
        </a>
        <!-- END Logo -->

        <!-- Options -->
        <div>
            <!-- Toggle Sidebar Style -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <!-- Class Toggle, functionality initialized in Helpers.dmToggleClass() -->
            <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle" data-target="#sidebar-style-toggler" data-class="fa-toggle-off fa-toggle-on" onclick="Dashmix.layout('sidebar_style_toggle');Dashmix.layout('header_style_toggle');">
            <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
            </button>
            <!-- END Toggle Sidebar Style -->

            <!-- Dark Mode -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle" data-target="#dark-mode-toggler" data-class="far fa" onclick="Dashmix.layout('dark_mode_toggle');">
            <i class="far fa-moon" id="dark-mode-toggler"></i>
            </button>
            <!-- END Dark Mode -->

            <!-- Close Sidebar, Visible only on mobile screens -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout" data-action="sidebar_close">
            <i class="fa fa-times-circle"></i>
            </button>
            <!-- END Close Sidebar -->
        </div>
        <!-- END Options -->
        </div>
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
        <ul class="nav-main">

            <li class="nav-main-heading">Managemen Perusahaan</li>
            <li class="nav-main-item">
                <a class="nav-main-link" href="{{ route('perusahaan.index') }}">
                    <i class="nav-main-link-icon fa fa-file-lines"></i>
                    <span class="nav-main-link-name">Perusahaan</span>
                </a>
            </li>

            @if (auth()->user()->role == 'admin')
            <li class="nav-main-heading">Managamen Port</li>
            <li class="nav-main-item">
                <a class="nav-main-link" href="{{ route('port.index') }}">
                    <i class="nav-main-link-icon fa fa-address-card"></i>
                    <span class="nav-main-link-name">Port</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link" href="{{ route('user.index') }}">
                    <i class="nav-main-link-icon fa fa-user"></i>
                    <span class="nav-main-link-name">User</span>
                </a>
            </li>
            @endif
        </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</nav>
<!-- END Sidebar -->