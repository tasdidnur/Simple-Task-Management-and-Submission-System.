<div class="navbar navbar-expand-md header-menu-one bg-light">
    <div class="nav-bar-header-one">
        <div class="header-logo" style="color: navy; font-weight: bold; font-style: italic; font-size: 20px;">
            <a href="{{ isset(auth()->user()->role) && auth()->user()->role == 1 ? route('manager.dashboard') : route('teammate.dashboard') }}">
                Simple Task Management and Submission System
            </a>
        </div>

        <div class="toggle-button sidebar-toggle">
            <button type="button" class="item-link">
                <span class="btn-icon-wrap">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </button>
        </div>
    </div>
    <div class="d-md-none mobile-nav-bar">
        <button class="navbar-toggler pulse-animation" type="button" data-toggle="collapse"
            data-target="#mobile-navbar" aria-expanded="false">
            <i class="far fa-arrow-alt-circle-down"></i>
        </button>
        <button type="button" class="navbar-toggler sidebar-toggle-mobile">
            <i class="fas fa-bars"></i>
        </button>
    </div>
    <div class="header-main-menu collapse navbar-collapse" id="mobile-navbar">
        <ul class="navbar-nav">
            <li class="navbar-item header-search-bar">
                <div class="input-group stylish-input-group">


                </div>
            </li>
        </ul>
        <ul class="navbar-nav">
            {{-- Username and Logout Section --}}
            <li class="navbar-item dropdown header-admin">
                <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-expanded="false">
                    <div class="admin-title">
                        <h5 class="item-title">{{ auth()->user()->name }}</h5>
                        <span>
                            @if (auth()->user()->role == 1)
                                Manager
                            @else
                                Teammate
                            @endif
                        </span>
                    </div>
                    <div class="admin-img">
                        <img src="{{ asset('backend/img') }}/figure/user.png" alt="Admin">
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">

                    <div class="item-content">
                        <ul class="logout-menu">
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="logout-button">
                                        <i class="flaticon-turn-off"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>

                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
