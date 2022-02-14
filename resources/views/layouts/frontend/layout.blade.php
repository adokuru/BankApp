<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    @if (View::hasSection('seo'))
    @yield('seo')
    @else
    <title>Snuff - Swiss Banking Company</title>
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="Banking , Loans, Transfer" />
    <meta name="description" content="" />
    @endif
    <!-- favicons -->
    <link rel="shortcut icon" href="{{ asset('frontend_assets/images/favicon.png') }}">

    <!-- Style CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/aos.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/animate.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/meanmenu.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/remixicon.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/flaticon.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/odometer.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/owl.theme.default.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/magnific-popup.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/navbar.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/footer.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/responsive.css')}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script>
    var app_url = window.location.origin;
    </script>
    @yield('style')
    @livewireStyles



</head>


<body>
    @include('components.header')
    @yield('main')
    @include('components.footer')

    <div class="go-top">
        <i class="ri-arrow-up-s-line"></i>
    </div>
    <!-- jQuery -->
    <script type="text/javascript" src="{{ asset('frontend_assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend_assets/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend_assets/js/jquery.meanmenu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend_assets/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend_assets/js/jquery.appear.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend_assets/js/odometer.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend_assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend_assets/js/TweenMax.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend_assets/js/ScrollMagic.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend_assets/js/aos.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend_assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend_assets/js/form-validator.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend_assets/js/contact-form-script.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend_assets/js/wow.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend_assets/js/main.js') }}"></script>
    @yield('script')

    <!-- orther script -->
    @livewireScripts

</body>

</html>