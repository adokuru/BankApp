@extends('layouts.frontend.layout')
@section('main')

<div class="page-banner-area">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-md-6">
                <div class="page-banner-content" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <h2>Getting Started</h2>
                    <ul>
                        <li>
                            <a href="{{ route('home')}}">Home</a>
                        </li>
                        <li>Getting Started</li>
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


<div class="getting-started-area pt-100 pb-75">
    <div class="container">
        <div class="section-title">
            <span>Getting Started</span>
            <h2>Get Set Up And Start Spending With Your Card In Minutes</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-sm-6">
                <div class="single-getting-started-card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <div class="getting-image">
                        <img src="assets/images/getting-started/getting-1.png" alt="image">
                    </div>
                    <h3>1. Create Account</h3>
                    <p>Adipiscing eliId neque mi diam nim etus arcu porta viverra pretium auctor ut nam sed.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-getting-started-card" data-aos="fade-up" data-aos-delay="60" data-aos-duration="600"
                    data-aos-once="true">
                    <div class="getting-image">
                        <img src="assets/images/getting-started/getting-2.png" alt="image">
                    </div>
                    <h3>2. Verify Identity</h3>
                    <p>Adipiscing eliId neque mi diam nim etus arcu porta viverra pretium auctor ut nam sed.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-getting-started-card" data-aos="fade-up" data-aos-delay="70" data-aos-duration="700"
                    data-aos-once="true">
                    <div class="getting-image">
                        <img src="assets/images/getting-started/getting-3.png" alt="image">
                    </div>
                    <h3>3. Tap Your Account</h3>
                    <p>Adipiscing eliId neque mi diam nim etus arcu porta viverra pretium auctor ut nam sed.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-getting-started-card" data-aos="fade-up" data-aos-delay="80" data-aos-duration="800"
                    data-aos-once="true">
                    <div class="getting-image">
                        <img src="assets/images/getting-started/getting-4.png" alt="image">
                    </div>
                    <h3>4. Confirm & Send</h3>
                    <p>Adipiscing eliId neque mi diam nim etus arcu porta viverra pretium auctor ut nam sed.</p>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="why-choose-us-area ptb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="why-choose-us-content" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <span>Why Choose Us</span>
                    <h3>Moving And Living Abroad Just Got Simpler Get Paid Like A Local</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat nisl bibendum vitae
                        consequat. Nisl ut sed accumsan congue id tempus fringilla diam arcu. Venenatis nulla
                        senectus risus sagittis turpis felis egestas.</p>
                    <ul class="choose-us-list">
                        <li>
                            <i class="ri-checkbox-circle-line"></i>
                            Send money cheaper and easier than old-school banks.
                        </li>
                        <li>
                            <i class="ri-checkbox-circle-line"></i>
                            Spend abroad without the hidden fees.
                        </li>
                        <li>
                            <i class="ri-checkbox-circle-line"></i>
                            Move money between countries for salary & more.
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="why-choose-us-image">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-sm-6">
                            <div class="choose-image" data-aos="fade-down" data-aos-delay="50" data-aos-duration="500"
                                data-aos-once="true">
                                <img src="assets/images/why-choose-us/choose-1.jpg" alt="image">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="choose-image mb-25" data-aos="fade-left" data-aos-delay="50"
                                data-aos-duration="500" data-aos-once="true">
                                <img src="assets/images/why-choose-us/choose-2.jpg" alt="image">
                            </div>
                            <div class="choose-image" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                                data-aos-once="true">
                                <img src="assets/images/why-choose-us/choose-3.jpg" alt="image">
                            </div>
                        </div>
                    </div>
                    <div class="choose-shape" data-speed="0.08" data-revert="true">
                        <img src="assets/images/why-choose-us/shape-1.png" alt="image">
                    </div>
                    <div class="choose-shape-2" data-speed="0.08" data-revert="true">
                        <img src="assets/images/why-choose-us/shape-2.png" alt="image">
                    </div>
                </div>
            </div>
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

<div class="go-top">
    <i class="ri-arrow-up-s-line"></i>
</div>

@endsection