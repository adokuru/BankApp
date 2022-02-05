@extends('layouts.frontend.layout')
@section('main')


<div class="page-banner-area">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-md-6">
                <div class="page-banner-content" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <h2>Register</h2>
                    <ul>
                        <li>
                            <a href="index-2.html">Home</a>
                        </li>
                        <li>Pages</li>
                        <li>Register</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="page-banner-image" data-aos="fade-left" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <img src="assets/images/page-banner/banner.png" alt="image">
                    <div class="banner-shape">
                        <img src="assets/images/page-banner/shape.png" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="register-area ptb-100">
    <div class="container">
        <div class="register-form">
            <h2>Create Your Account</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore.
            </p>
            <form>
                <div class="form-group">
                    <label>User name</label>
                    <input type="text" class="form-control" placeholder="User name">
                </div>
                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" class="form-control" placeholder="Email address">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <label>Confirm password</label>
                    <input type="password" class="form-control" placeholder="Confirm password">
                </div>
                <p class="description">The password should be at least eight characters long. To make it stronger,
                    use upper and lower case letters, numbers, and symbols like ! " ? $ % ^ & )</p>
                <button type="submit" class="default-btn">Create Account</button>
                <div class="account-text">
                    <span>Already have an account? <a href="login.html">Login</a></span>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="overview-area ptb-100">
    <div class="container">
        <div class="overview-content" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
            data-aos-once="true">
            <span>Connect Us</span>
            <h3>Sending International Business Payments or Sending Money To Family Overseas? Snuff Are Your Fast And
                Simple Solution.</h3>
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
        <img src="assets/images/overview/shape-1.png" alt="image">
    </div>
    <div class="overview-shape-2">
        <img src="assets/images/overview/shape-2.png" alt="image">
    </div>
</div>

@endsection