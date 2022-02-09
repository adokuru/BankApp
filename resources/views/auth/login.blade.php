{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}

@extends('layouts.frontend.layout')
@section('main')

    <div class="page-banner-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <div class="page-banner-content" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <h2>Login</h2>
                        <ul>
                            <li>
                                <a href="index-2.html">Home</a>
                            </li>
                            <li>Pages</li>
                            <li>Login</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="page-banner-image" data-aos="fade-left" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <img src="assets/images/page-banner/banner.png" alt="image" />
                        <div class="banner-shape">
                            <img src="assets/images/page-banner/shape.png" alt="image" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="login-area ptb-100">
        <div class="container">
            <div class="login-form">
                <h2>Login Here</h2>
                <p>Welcome Back, Login To Your Account</p>
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
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label>{{ __('Email') }}</label>
                        <input type="text" class="form-control" placeholder="Your email address" name="email" required />
                    </div>
                    <div class="form-group">
                        <label>Your password</label>
                        <input type="password" class="form-control" placeholder="Your password" name="password" required />
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6 col-sm-6 remember-me-wrap">
                            <p>
                                <input type="checkbox" id="remember" name="remember" />
                                <label for="remember">{{ __('Remember me') }}</label>
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 lost-your-password-wrap">
                            @if (Route::has('password.request'))


                                <a href="{{ route('password.request') }}" class="lost-your-password"> {{ __('Forgot your password?') }}</a>
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="default-btn">
                        Login Now
                    </button>
                    <div class="account-text">
                        <span>Don’t have an account?
                            <a href="/register">Create Account</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="overview-area ptb-100">
        <div class="container">
            <div class="overview-content" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <span>Connect Us</span>
                <h3>
                    Sending International Business Payments or Sending Money
                    To Family Overseas? Snuff Are Your Fast And Simple
                    Solution.
                </h3>
                <ul class="overview-btn-group">
                    <li>
                        <a href="help-center.html" class="default-btn">Personal Account</a>
                    </li>
                    <li>
                        <a href="help-center.html" class="optional-btn">Business Account</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="overview-shape">
            <img src="assets/images/overview/shape-1.png" alt="image" />
        </div>
        <div class="overview-shape-2">
            <img src="assets/images/overview/shape-2.png" alt="image" />
        </div>
    </div>

@endsection
