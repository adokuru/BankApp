<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | {{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{ asset('frontend_assets/images/favicon.png') }}">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('user_dashboard/css/style.css') }}">
</head>

<body class="@@class">

    <div id="preloader">
        <i>.</i>
        <i>.</i>
        <i>.</i>
    </div>

    <div class="authincation section-padding">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-xl-5 col-md-6">
                    <div class="mini-logo text-center my-4">
                        <a href="/"><img src="assets/images/logo.png" alt=""></a>
                        <h4 class="card-title mt-5">Sign in</h4>
                        @if ($errors->any())
                            <div>
                                <div class="font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div>

                                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('status'))
                            <p class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </p>
                        @endif
                    </div>
                    <div class="auth-form card">
                        <div class="card-body">
                            <form method="post" name="myform" class="signin_validate row g-3" action="{{ route('login') }}">
                                @csrf
                                <div class="col-12">
                                    <label class="form-label">Username</label>
                                    <input type="username" class="form-control" placeholder="hello@example.com" name="username">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password">
                                </div>
                                <div class="col-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="remember" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Remember
                                            me</label>
                                    </div>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Sign in</button>
                                </div>
                            </form>
                            <p class="mt-3 mb-0">Don't have an account? <a class="text-primary" href="/register">Sign
                                    up</a></p>
                        </div>

                    </div>
                    <div class="privacy-link">
                        <a href="#">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="{{ asset('user_dashboard/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('user_dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('user_dashboard/js/scripts.js') }}"></script>

</body>

</html>
