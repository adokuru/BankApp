<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register | {{ config('app.name', 'Laravel') }}</title>

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
                            <form method="post" name="myform" class="signin_validate row g-3" action="{{ route('register') }}">
                                @csrf
                                <div class="col-12">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" class="form-control" placeholder="Name" name="name">
                                </div>
                                <div class="col-12 ">
                                    <label class="form-label">{{ __('Email') }}</label>
                                    <input type="email" class="form-control" placeholder="hello@example.com" name="email">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">{{ __('Password') }}</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">{{ __('Confirm Password') }}</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password_confirmation">
                                </div>
                                <div class="col-12">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" required>
                                        <label class="form-check-label" for="flexSwitchCheckDefault">
                                            I certify that I am 18 years of age or older, and agree to the <a href="#" class="text-primary">User Agreement</a> and <a href="#" class="text-primary">Privacy Policy</a>.
                                        </label>
                                    </div>
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Create account</button>
                                </div>
                            </form>
                            <div class="text-center">
                                <p class="mt-3 mb-0"> <a class="text-primary" href="">Sign in</a> to your
                                    account</p>
                            </div>
                        </div>
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
