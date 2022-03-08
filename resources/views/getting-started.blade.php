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
            <h2>Get Set Up And Start In Minutes</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-sm-6">
                <div class="single-getting-started-card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <div class="getting-image">
                        <img src="{{asset('frontend_assets/images/getting-started/getting-1.png')}}" alt="image">
                    </div>
                    <h3>1. Create Account</h3>
                    <p>Choose a Personal or Business account and start in Minutes. Click on the "Get started"
                        Button and follow the prompt</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-getting-started-card" data-aos="fade-up" data-aos-delay="60" data-aos-duration="600"
                    data-aos-once="true">
                    <div class="getting-image">
                        <img src="{{asset('frontend_assets/images/getting-started/getting-2.png')}}" alt="image">
                    </div>
                    <h3>2. Verify Identity</h3>
                    <p>Once you choose an Account solution, you will be prompted to upload a means of Identification to
                        verify your identity.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-getting-started-card" data-aos="fade-up" data-aos-delay="70" data-aos-duration="700"
                    data-aos-once="true">
                    <div class="getting-image">
                        <img src="{{asset('frontend_assets/images/getting-started/getting-3.png')}}" alt="image">
                    </div>
                    <h3>3. Activate Your Account</h3>
                    <p>You will get a Notification mail, telling you to verify your account, with an option to recieve a
                        physical or virtual card. </p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-getting-started-card" data-aos="fade-up" data-aos-delay="80" data-aos-duration="800"
                    data-aos-once="true">
                    <div class="getting-image">
                        <img src="{{asset('frontend_assets/images/getting-started/getting-4.png')}}" alt="image">
                    </div>
                    <h3>4. Confirm & Send</h3>
                    <p>Once you have choosen a card type, you will be prompted to
                        add your address to recieve a physical card.</p>
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
                    <h3>Private and Secured Banking</h3>
                    <p>We are combining the long-standing Swiss Private Banking traditions with a pro-active
                        entrepreneurial mindset. This alchemy results in what we call Modern Private Bankers, where
                        agility, integrity and enthusiasm meet in a boutique-sized structure. It is our ambition to
                        benefit from that to offer “best in class” services.</p>
                    <ul class="choose-us-list">
                        <li>
                            <i class="ri-checkbox-circle-line"></i>
                            Open a secured and private account in minutes.
                        </li>
                        <li>
                            <i class="ri-checkbox-circle-line"></i>
                            Get the best intrest rates on loans and mortgages.
                        </li>
                        <li>
                            <i class="ri-checkbox-circle-line"></i>
                            24/7 state of the art personalised customer support services.
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
                                <img src="{{asset('frontend_assets/images/main-banner/2.jpeg')}}" alt="image">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="choose-image mb-25" data-aos="fade-left" data-aos-delay="50"
                                data-aos-duration="500" data-aos-once="true">
                                <img src="{{asset('frontend_assets/images/main-banner/3.jpeg')}}" alt="image">
                            </div>
                            <div class="choose-image" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                                data-aos-once="true">
                                <img src="assets/images/why-choose-us/choose-3.jpg" alt="image">
                            </div>
                        </div>
                    </div>
                    <div class="choose-shape" data-speed="0.08" data-revert="true">
                        <img src="{{asset('frontend_assets/images/why-choose-us/shape-1.png')}}" alt="image">
                    </div>
                    <div class="choose-shape-2" data-speed="0.08" data-revert="true">
                        <img src="{{asset('frontend_assets/images/why-choose-us/shape-2.png')}}" alt="image">
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
            <h3> Are You Looking For Where You Can Open a Secured & Relaible Offshore, Personal, or Business Account?
                Manx Capitale Privée Banque is Your Fast And
                Secured Solution.</h3>
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