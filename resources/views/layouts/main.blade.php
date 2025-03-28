<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Simple Task Management and Submission System</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/img') }}/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css') }}/normalize.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css') }}/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css') }}/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css') }}/all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('backend/fonts') }}/flaticon.css">
    <!-- Full Calender CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css') }}/fullcalendar.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css') }}/animate.min.css">
    <!-- Select 2 CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css') }}/select2.min.css">
    <!-- Date Picker CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css') }}/datepicker.min.css">
    <!-- Dropzone CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css') }}/dropzone.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css') }}/style.css">
    <!-- Modernize js -->
    <script src="{{ asset('backend/js') }}/modernizr-3.6.0.min.js"></script>

</head>

<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper bg-ash">
        <!-- Header Menu Area Start Here -->
        @include('layouts.header')
        <!-- Header Menu Area End Here -->
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
            <!-- Page Area Start Here -->
            <div class="dashboard-page-one">
                <!-- Sidebar Area Start Here -->
                <div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
                <div class="mobile-sidebar-header d-md-none">
                        <div class="header-logo">
                            <a href="index.html"><img src="img/logo1.png" alt="logo"></a>
                        </div>
                </div>
                    <div class="sidebar-menu-content">
                        <ul class="nav nav-sidebar-menu sidebar-toggle-view">
                            <li class="nav-item">
                                <a href="{{ isset(auth()->user()->role) && auth()->user()->role == 1 ? route('manager.dashboard') : route('teammate.dashboard') }}" class="nav-link">
                                    <i class="flaticon-dashboard"></i><span>Dashboard</span>
                                </a>
                            </li>
                            {{-- manager area starts here --}}
                            @if (auth()->user()->role == 1)
                            {{-- temamates starts here --}}
                            <li class="nav-item sidebar-nav-item">
                                <a href="#" class="nav-link"><i class="flaticon-menu-1"></i><span>Teammates</span></a>
                                <ul class="nav sub-group-menu {{ Request::routeIs('manager.create-teammate') || Request::routeIs('manager.list-teammates') ? 'sub-group-active' : '' }}">
                                    <li class="nav-item">
                                        <a href="{{ route('manager.create-teammate') }}" class="nav-link {{ Request::routeIs('manager.create-teammate') ? 'menu-active' : '' }}"><i class="fas fa-angle-right"></i>Add Teammate</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('manager.list-teammates') }}" class="nav-link {{ Request::routeIs('manager.list-teammates') ? 'menu-active' : '' }}"><i class="fas fa-angle-right"></i>Teammate list</a>
                                    </li>
                                </ul>
                            </li>
                            {{-- temamates ends here --}}

                            {{-- projects starts here --}}
                            <li class="nav-item sidebar-nav-item">
                                <a href="#" class="nav-link"><i class="flaticon-technological"></i><span>Projects</span></a>
                                <ul class="nav sub-group-menu {{ Request::routeIs('manager.create-project') || Request::routeIs('manager.list-projects') ? 'sub-group-active' : '' }}">
                                    <li class="nav-item">
                                        <a href="{{ route('manager.create-project') }}" class="nav-link {{ Request::routeIs('manager.create-project') ? 'menu-active' : '' }}"><i class="fas fa-angle-right"></i>Add Project</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('manager.list-projects') }}" class="nav-link {{ Request::routeIs('manager.list-projects') ? 'menu-active' : '' }}"><i class="fas fa-angle-right"></i>Projects list</a>
                                    </li>
                                </ul>
                            </li>
                            {{-- projects ends here --}}

                            {{-- tasks starts here --}}
                            <li class="nav-item sidebar-nav-item">
                                <a href="#" class="nav-link"><i class="flaticon-open-book"></i><span>Tasks</span></a>
                                <ul class="nav sub-group-menu {{ Request::routeIs('manager.create-task') || Request::routeIs('manager.list-tasks') ? 'sub-group-active' : '' }}">
                                    <li class="nav-item">
                                        <a href="{{ route('manager.create-task') }}" class="nav-link {{ Request::routeIs('manager.create-task') ? 'menu-active' : '' }}"><i class="fas fa-angle-right"></i>Add Task</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('manager.list-tasks') }}" class="nav-link {{ Request::routeIs('manager.list-tasks') ? 'menu-active' : '' }}"><i class="fas fa-angle-right"></i>Tasks list</a>
                                    </li>
                                </ul>
                            </li>
                            {{-- tasks ends here --}}
                            @endif
                            {{-- manager area ends here --}}

                            {{-- teammate area starts here --}}
                            @if (auth()->user()->role == 2)
                            <li class="nav-item sidebar-nav-item">
                                <a href="#" class="nav-link"><i class="flaticon-books"></i><span>Tasks</span></a>
                                <ul class="nav sub-group-menu {{ Request::routeIs('teammate.assigned-tasks') ? 'sub-group-active' : '' }}">
                                    <li class="nav-item">
                                        <a href="{{ route('teammate.assigned-tasks') }}" class="nav-link {{ Request::routeIs('teammate.assigned-tasks') ? 'menu-active' : '' }}"><i class="fas fa-angle-right"></i>Assigned Tasks</a>
                                    </li>
                                </ul>
                            </li>
                            @endif
                            {{-- teammate area ends here --}}
                        </ul>
                    </div>
                </div>
                <!-- Sidebar Area End Here -->
                <div class="dashboard-content-one">
                    @yield('content')
                </div>
            </div>
            <!-- Page Area End Here -->
        </div>
    <!-- jquery-->
    <script src="{{ asset('backend/js') }}/jquery-3.3.1.min.js"></script>
    <!-- Plugins js -->
    <script src="{{ asset('backend/js') }}/plugins.js"></script>
    <!-- Popper js -->
    <script src="{{ asset('backend/js') }}/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('backend/js') }}/bootstrap.min.js"></script>
    <!-- Counterup Js -->
    <script src="{{ asset('backend/js') }}/jquery.counterup.min.js"></script>
    <!-- Moment Js -->
    <script src="{{ asset('backend/js') }}/moment.min.js"></script>
    <!-- Waypoints Js -->
    <script src="{{ asset('backend/js') }}/jquery.waypoints.min.js"></script>
    <!-- Scroll Up Js -->
    <script src="{{ asset('backend/js') }}/jquery.scrollUp.min.js"></script>
    <!-- Full Calender Js -->
    <script src="{{ asset('backend/js') }}/fullcalendar.min.js"></script>
    <!-- Chart Js -->
    <script src="{{ asset('backend/js') }}/Chart.min.js"></script>
    <!-- Select 2 Js -->
    <script src="{{ asset('backend/js') }}/select2.min.js"></script>
    <!-- Date Picker Js -->
    <script src="{{ asset('backend/js') }}/datepicker.min.js"></script>
    <!-- Dropzone Js -->
    <script src="{{ asset('backend/js') }}/dropzone.min.js"></script>
    <!-- Custom Js -->
    <script src="{{ asset('backend/js') }}/main.js"></script>

    @stack('script')

</body>

</html>
