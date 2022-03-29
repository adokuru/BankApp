<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="shortcut icon" href="{{ asset('frontend_assets/images/favicon.png') }}">
        <!-- Custom Stylesheet -->
        <link rel="stylesheet" href="{{asset('user_dashboard/css/style.css')}}">

        <link rel="stylesheet" href="https://demo.harnishdesign.net/html/payyed/vendor/font-awesome/css/all.min.css">

        @livewireStyles
    </head>
    <body class="dashboard">

        <div id="preloader">
            <i>.</i>
            <i>.</i>
            <i>.</i>
        </div>
        
        <div id="main-wrapper">
        
        
            <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xxl-12">
                     <div class="header-content">
                        <div class="header-left">
                           <div class="brand-logo"><a class="mini-logo" href="/"><img src="images/logoi.png" alt="" width="40"></a></div>
                           
                        </div>
                        <div class="header-right">
                           <div class="dark-light-toggle"><span class="dark"><i class="ri-moon-line"></i></span><span class="light"><i class="ri-sun-line"></i></span></div>
                         
                           <div class="dropdown profile_log dropdown">
                              <div data-toggle="dropdown" aria-haspopup="true" class="" aria-expanded="false">
                                <img class="me-3 rounded-circle me-0 me-sm-3" src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&name={{ auth()->user()->first_name }}{{ auth()->user()->last_name }}" width="55" height="55" alt="">
                              </div>
                              <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu dropdown-menu-right">
                                 <div class="user-email">
                                    <div class="user">
                                       <div class="user-info">
                                          <h5>{{auth()->user()->first_name}} {{auth()->user()->last_name}}</h5>
                                          <span>{{auth()->user()->email}}</span>
                                       </div>
                                    </div>
                                 </div>
                                 <a class="dropdown-item" href="{{route('Account_profile')}}"><span><i class="ri-user-line"></i></span>Profile</a>
                                 <a class="dropdown-item" href="{{route('Account_home')}}"><span><i class="ri-wallet-line"></i></span>Balance</a>
                                 <a class="dropdown-item" href="{{route('Account_security')}}"><span><i class="ri-settings-3-line"></i></span>Settings</a>
                                 <a class="dropdown-item" href="{{route('Account_activity')}}"><span><i class="ri-time-line"></i></span>Activity</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
        
            <div class="sidebar">
            <div class="brand-logo"><a class="full-logo" href="/"><img src="images/logoi.png" alt="" width="30"></a></div>
            <div class="menu">
                <ul>
                    <li><a href="{{route('Account_home')}}">
                            <span><i class="ri-home-5-line"></i></span>
                            <span class="nav-text">Account</span>
                        </a>
                    </li>
                    <li><a href="{{route('Account_deposit')}}">
                            <span><i class="ri-wallet-line"></i></span>
                            <span class="nav-text">Depoist</span>
                        </a>
                    </li>
                    <li><a href="{{route('account.debits')}}">
                            <span><i class="ri-wallet-line"></i></span>
                            <span class="nav-text">Debits</span>
                        </a>
                    </li>
                    <li><a href="{{route('Account_transfers')}}">
                            <span><i class="ri-secure-payment-line"></i></span>
                            <span class="nav-text">Transfers</span>
                        </a>
                    </li>
                    <li><a href="{{route('Account_transactions')}}">
                            <span><i class="ri-file-copy-2-line"></i></span>
                            <span class="nav-text">Statement</span>
                        </a>
                    </li>
                    <li><a href="{{route('Account_profile')}}">
                            <span><i class="ri-settings-3-line"></i></span>
                            <span class="nav-text">Settings</span>
                        </a>
                    </li>
                    <li class="logout">
                     <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        this.closest('form').submit();">
                             <span><i class="ri-logout-circle-line"></i></span>
                             <span class="nav-text">{{ __('Log Out') }}</span>
                         </a>
                    </form>
                       
                    </li>
                </ul>
            </div>
        </div>
        
            <div class="content-body">
                @yield('main')
            </div>
        
        
        
        </div>
        
        
        
        
        <script src="{{asset('user_dashboard/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('user_dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        
        
        <script src="{{asset('user_dashboard/vendor/chartjs/chartjs.js')}}"></script>
        
        
        
        <script src="{{asset('user_dashboard/js/plugins/chartjs-line-init.js')}}"></script>
        
        
        
        
        <script src="{{asset('user_dashboard/js/plugins/chartjs-donut.js')}}"></script>
        
        
        
        
        
        
        <script src="{{asset('user_dashboard/vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
        <script src="{{asset('user_dashboard/js/plugins/perfect-scrollbar-init.js')}}"></script>
        
        
        
        <script src="{{asset('user_dashboard/vendor/circle-progress/circle-progress.min.js')}}"></script>
        <script src="{{asset('user_dashboard/js/plugins/circle-progress-init.js')}}"></script>
        
        
        
        
        
        
        
        <script src="{{asset('user_dashboard/js/scripts.js')}}"></script>
        
        
        @stack('modals')

        @livewireScripts
    </body>
</html>
