<header class="header header-custom header-fixed header-one">
    <div class="container">
        <nav class="navbar navbar-expand-lg header-nav">
            <div class="navbar-header">
                <a id="mobile_btn" href="javascript:void(0);">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
                <a href="{{ route('home')}}" class="navbar-brand logo">
                    <img src="{{ asset('assets/img/logo.png')}}" class="img-fluid" alt="Logo">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="{{ route('home')}}" class="menu-logo">
                        <img src="{{ asset('assets/img/logo.png')}}" class="img-fluid" alt="Logo">
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
                <ul class="main-nav">
                    <li>
                        <a href="{{ route('home')}}">Home</a>
                     
                    </li>
                    
                    
                    
                </ul>
            </div>
            <ul class="nav header-navbar-rht">
                @if (Auth::check()) 
                    {{-- Display this when the user is logged in --}}
                    <li class="nav-item dropdown has-arrow logged-item">
                        <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                            <span class="user-img">
                                {!! Avatar::create(Auth::user()->first_name . ' ' . Auth::user()->last_name)->setFontSize(20)->setDimension(42)->toSvg() !!}
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="user-header">
                                <div class="avatar avatar-sm">
                                    {!! Avatar::create(Auth::user()->first_name . ' ' . Auth::user()->last_name)->setFontSize(20)->setDimension(42)->toSvg() !!}
                                </div>
                                <div class="user-text">
                                    <h6>{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</h6>
                                    <p class="text-success mb-0">{{ Auth::user()->getRoleNames()->first() }}</p>
                                </div>
                            </div>
                            <a class="dropdown-item" href="{{ route('patientDashboard') }}">Dashboard</a>
                            <a class="dropdown-item" href="profile-settings.html">Profile Settings</a>
                            <a class="dropdown-item" href="{{ route('account.logout') }}">Logout</a>
                        </div>
                    </li>
                @else
                    {{-- Display this when the user is not logged in --}}
                    <li class="nav-item">
                        <a class="nav-link header-login" href="{{ route('account.login') }}">Login / Signup</a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</header>