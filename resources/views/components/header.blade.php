<header class="main-header-area">

    <div class="topbar-area">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <ul class="topbar-information">
                        <li>
                            <a href="tel:44789289524329">+44 7892 8952 4329</a>
                        </li>
                        <li>
                            <a
                                href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#492a26273d282a3d0920272f26672a2624"><span
                                    class="__cf_email__"
                                    data-cfemail="53203d26353513343e323a3f7d303c3e">[email&#160;protected]</span></a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6">
                    <ul class="topbar-action">
                        <li>
                            <a href="{{ route('contact') }}">Support</a>
                        </li>
                        <li>
                            <a href="{{ route('help-center') }}">Help</a>
                        </li>
                        <li class="dropdown language-option" id="google_translate_element">
                          
                        </li>
                        {{-- <div class="dropdown language-option" id="google_translate_element">
                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="ri-global-line"></i>
                                <span class="lang-name"></span>
                            </button>
                            <div class="dropdown-menu language-dropdown-menu">
                                <a class="dropdown-item" href="#">
                                    English
                                </a>
                                <a class="dropdown-item" href="#">
                                    French
                                </a>
                                <a class="dropdown-item" href="#">
                                    German
                                </a>
                            </div>
                        </div> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="navbar-area">
        <div class="main-responsive-nav">
            <div class="container">
                <div class="main-responsive-menu">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            <img src="assets/images/logo.png" alt="Oleev">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-navbar">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="/">
                        <img src="assets/images/logo.png" alt="Oleev">
                    </a>
                    <div class="navbar-list">
                        <ul>
                            <li><a href="{{ route('help-center') }}">Personal</a></li>
                            <li><a href="{{ route('help-center') }}">Business</a></li>
                        </ul>
                    </div>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a href="{{ route('about') }}" class="nav-link">About Us</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="{{ route('features') }}" class="nav-link">Features</a>
                            </li> -->
                            <li class="nav-item">
                                <a href="{{ route('getting-started') }}" class="nav-link">Getting Started</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Guide
                                    <i class="ri-arrow-down-s-line"></i>
                                </a>
                                <ul class="dropdown-menu">

                                    <li class="nav-item">
                                        <a href="{{ route('help-center') }}" class="nav-link">Help Center</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('faq') }}" class="nav-link">FAQ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('terms-of-service') }}" class="nav-link">Terms of Service</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a href="privacy-policy.html" class="nav-link">Privacy Policy</a>
                                    </li> -->
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                            </li>
                        </ul>
                        <div class="others-options d-flex align-items-center">
                            @if (Auth::check())
                            <div class="option-item">
                                <a href="{{ route('Account_home') }}" class="default-btn">Manage Account</a>
                            </div>
                            <div class="option-item">

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="optional-btn" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}</a>
                                </form>
                            </div>
                            @else
                            <div class="option-item">
                                <a href="/login" class="optional-btn">Log In</a>
                            </div>
                            <div class="option-item">
                                <a href="/register" class="default-btn">Register Now</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="others-option-for-responsive">
            <div class="container">
                <div class="dot-menu">
                    <div class="inner">
                        <div class="circle circle-one"></div>
                        <div class="circle circle-two"></div>
                        <div class="circle circle-three"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="option-inner">
                        <div class="others-options d-flex align-items-center">
                            @if (Auth::check())
                            <div class="option-item">
                                <a href="{{ route('Account_home') }}" class="default-btn">Manage Account</a>
                            </div>
                            <div class="option-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="optional-btn" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}</a>
                                </form>
                            </div>
                            @else
                            <div class="option-item">
                                <a href="/login" class="optional-btn">Log In</a>
                            </div>
                            <div class="option-item">
                                <a href="/register" class="default-btn">Register Now</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>