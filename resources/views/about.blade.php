@extends('layouts.frontend.layout')
@section('main')

<div class="page-banner-area">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-md-6">
                <div class="page-banner-content" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <h2>About Us</h2>
                    <ul>
                        <li>
                            <a href="{{ route('home')}}">Home</a>
                        </li>
                        <li>About Us</li>
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


<div class="partner-area ptb-100">
    <div class="container">
        <div class="partner-title">
            <h3>Used By 300k+ Businesses Of All Shapes And Sizes</h3>
        </div>
        <div class="partner-slides owl-carousel owl-theme">
            <div class="partner-image">
                <a href="about-us.html"><img src="assets/images/partner/partner-1.png" alt="image"></a>
            </div>
            <div class="partner-image">
                <a href="about-us.html"><img src="assets/images/partner/partner-2.png" alt="image"></a>
            </div>
            <div class="partner-image">
                <a href="about-us.html"><img src="assets/images/partner/partner-3.png" alt="image"></a>
            </div>
            <div class="partner-image">
                <a href="about-us.html"><img src="assets/images/partner/partner-4.png" alt="image"></a>
            </div>
            <div class="partner-image">
                <a href="about-us.html"><img src="assets/images/partner/partner-5.png" alt="image"></a>
            </div>
            <div class="partner-image">
                <a href="about-us.html"><img src="assets/images/partner/partner-6.png" alt="image"></a>
            </div>
        </div>
        <div class="partner-optional-text">
            <p>Medium-to-large Business? <span>Speak To Sales</span></p>
        </div>
    </div>
</div>


<div class="reliable-area pb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="reliable-image-wrap" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-sm-6">
                            <div class="wrap-image" data-aos="fade-down" data-aos-delay="50" data-aos-duration="500"
                                data-aos-once="true">
                                <img src="assets/images/reliable/reliable-1.jpg" alt="image">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="wrap-image mb-25" data-aos="fade-down" data-aos-delay="50"
                                data-aos-duration="500" data-aos-once="true">
                                <img src="assets/images/reliable/reliable-2.jpg" alt="image">
                            </div>
                            <div class="wrap-image" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                                data-aos-once="true">
                                <img src="assets/images/reliable/reliable-3.jpg" alt="image">
                            </div>
                        </div>
                    </div>
                    <div class="reliable-shape">
                        <img src="assets/images/reliable/shape-2.png" alt="image">
                    </div>
                    <div class="reliable-shape-2">
                        <img src="assets/images/reliable/shape-1.png" alt="image">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="reliable-content with-padding-left" data-aos="fade-left" data-aos-delay="50"
                    data-aos-duration="500" data-aos-once="true">
                    <span>Reliable Online Payment Platform</span>
                    <h3>Transfer & Deposite Money Anytime, Anywhere In The World</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Volutpat nisl bibendum vitae
                        consequat. Nisl ut sed accumsan congue tempus fringilla diam arcu. Venenatis nulla senectus
                        risus sagittis.</p>
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-6">
                            <ul class="reliable-list">
                                <li><i class="ri-check-line"></i> Powerful Mobile & Online App</li>
                                <li><i class="ri-check-line"></i> Commitment Free</li>
                                <li><i class="ri-check-line"></i> Full Data Privacy Compliance</li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <ul class="reliable-list">
                                <li><i class="ri-check-line"></i> Free Plan Available</li>
                                <li><i class="ri-check-line"></i> 100% Transparent Cost</li>
                                <li><i class="ri-check-line"></i> Debit Mastercard Included</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="global-transfers-area pt-100 pb-75">
    <div class="container">
        <div class="section-title">
            <span>Global Transfers</span>
            <h2>We Charge As Little As Possible. No Subscription Fee</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-sm-6">
                <div class="single-global-transfers-card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <div class="icon">
                        <i class="flaticon-envelope"></i>
                    </div>
                    <h3>Send Money Cheaper And Easier Than Old-school Banks</h3>
                    <p>Adipiscing eliId neque mi, diam nim etus arcu porta viverra.</p>
                    <a href="protecting-your-money.html" class="global-btn">Send Money</a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-global-transfers-card" data-aos="fade-up" data-aos-delay="60" data-aos-duration="600"
                    data-aos-once="true">
                    <div class="icon">
                        <i class="flaticon-money-transfer"></i>
                    </div>
                    <h3>Spend Abroad Without The Hidden Fees</h3>
                    <p>Adipiscing eliId neque mi, diam nim etus arcu porta viverra.</p>
                    <a href="getting-started.html" class="global-btn">Get Started</a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-global-transfers-card" data-aos="fade-up" data-aos-delay="70" data-aos-duration="700"
                    data-aos-once="true">
                    <div class="icon">
                        <i class="flaticon-income"></i>
                    </div>
                    <h3>Receive Payments Like A Local In 9 Currencies</h3>
                    <p>Adipiscing eliId neque mi, diam nim etus arcu porta viverra.</p>
                    <a href="help-center.html" class="global-btn">Available Accounts</a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-global-transfers-card" data-aos="fade-up" data-aos-delay="80" data-aos-duration="800"
                    data-aos-once="true">
                    <div class="icon">
                        <i class="flaticon-conversion"></i>
                    </div>
                    <h3>Convert And Hold 54 Currencies</h3>
                    <p>Adipiscing eliId neque mi, diam nim etus arcu porta viverra.</p>
                    <a href="help-center.html" class="global-btn">See All Currencies</a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="paiement-area ptb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="paiement-content" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <span>Paiement Services Worldwide</span>
                    <h3>Easily Grow Your Business Save More Money</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Volutpat nisl bibendum vitae
                        consequat. Nisl ut sed accumsan congue tempus fringilla diam arcu. Venenatis nulla senectus
                        risus sagittis.</p>
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-6">
                            <ul class="paiement-list">
                                <li><i class="ri-check-line"></i> Reliable Online Payment</li>
                                <li><i class="ri-check-line"></i> Low Transaction Fee</li>
                                <li><i class="ri-check-line"></i> Affordable Security Packages</li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <ul class="paiement-list">
                                <li><i class="ri-check-line"></i> Best Networking</li>
                                <li><i class="ri-check-line"></i> Secure Payment Service</li>
                                <li><i class="ri-check-line"></i> Real Time Money Tracking</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="paiement-image" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <img src="assets/images/paiement.png" alt="image">
                </div>
            </div>
        </div>
    </div>
</div>


<div class="benefits-area pt-100 pb-75">
    <div class="container">
        <div class="section-title">
            <span>Your Benefits</span>
            <h2>Take The Stress Out Of Managing Property And Money</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-sm-6">
                <div class="single-benefits-card" data-aos="fade-up" data-aos-delay="30" data-aos-duration="300"
                    data-aos-once="true">
                    <div class="benefits-content">
                        <div class="benefits-image">
                            <img src="assets/images/benefits/benefits-1.png" alt="image">
                        </div>
                        <h3>Global Coverage</h3>
                        <p>Adipiscing eli neque mi diam nim etus arcu porta viverra pretium auctor ut nam sed
                            adipiscing eliId neque mi diam nim etus arcu porta viverra.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="single-benefits-card" data-aos="fade-up" data-aos-delay="40" data-aos-duration="400"
                    data-aos-once="true">
                    <div class="benefits-content">
                        <div class="benefits-image">
                            <img src="assets/images/benefits/benefits-2.png" alt="image">
                        </div>
                        <h3>Lowest Fee</h3>
                        <p>Adipiscing eli neque mi diam nim etus arcu porta viverra pretium auctor ut nam sed
                            adipiscing eliId neque mi diam nim etus arcu porta viverra.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="single-benefits-card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <div class="benefits-content">
                        <div class="benefits-image">
                            <img src="assets/images/benefits/benefits-3.png" alt="image">
                        </div>
                        <h3>Simple Transfer Methods</h3>
                        <p>Adipiscing eli neque mi diam nim etus arcu porta viverra pretium auctor ut nam sed
                            adipiscing eliId neque mi diam nim etus arcu porta viverra.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="single-benefits-card" data-aos="fade-up" data-aos-delay="60" data-aos-duration="600"
                    data-aos-once="true">
                    <div class="benefits-content">
                        <div class="benefits-image">
                            <img src="assets/images/benefits/benefits-4.png" alt="image">
                        </div>
                        <h3>Instant Processing</h3>
                        <p>Adipiscing eli neque mi diam nim etus arcu porta viverra pretium auctor ut nam sed
                            adipiscing eliId neque mi diam nim etus arcu porta viverra.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="single-benefits-card" data-aos="fade-up" data-aos-delay="70" data-aos-duration="700"
                    data-aos-once="true">
                    <div class="benefits-content">
                        <div class="benefits-image">
                            <img src="assets/images/benefits/benefits-5.png" alt="image">
                        </div>
                        <h3>Bank-level Security</h3>
                        <p>Adipiscing eli neque mi diam nim etus arcu porta viverra pretium auctor ut nam sed
                            adipiscing eliId neque mi diam nim etus arcu porta viverra.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="single-benefits-card" data-aos="fade-up" data-aos-delay="80" data-aos-duration="800"
                    data-aos-once="true">
                    <div class="benefits-content">
                        <div class="benefits-image">
                            <img src="assets/images/benefits/benefits-6.png" alt="image">
                        </div>
                        <h3>Global 24/7 Support</h3>
                        <p>Adipiscing eli neque mi diam nim etus arcu porta viverra pretium auctor ut nam sed
                            adipiscing eliId neque mi diam nim etus arcu porta viverra.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="pricing-area pt-100 pb-75">
    <div class="container">
        <div class="section-title">
            <span>Our Pricing Plan</span>
            <h2>We Charge As Little As Possible. No Subscription Fee</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="single-pricing-table" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <div class="pricing-header">
                        <h3>Basic</h3>
                    </div>
                    <div class="price">$15 <span>Per Monthly</span></div>
                    <div class="pricing-btn">
                        <a href="pricing.html" class="default-btn">Choose This Plan</a>
                    </div>
                    <ul class="features-list">
                        <li><i class="ri-check-line"></i> Free Mobile & Online App</li>
                        <li><i class="ri-check-line"></i> Online System</li>
                        <li><i class="ri-check-line"></i> Data full Access</li>
                        <li><i class="ri-check-line"></i> 1 Business Mastercard</li>
                        <li><i class="ri-check-line"></i> International Payment</li>
                        <li><i class="ri-check-line"></i> Support Unlimited</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-pricing-table" data-aos="fade-up" data-aos-delay="60" data-aos-duration="600"
                    data-aos-once="true">
                    <div class="pricing-header">
                        <h3>Standard</h3>
                    </div>
                    <div class="price">$70 <span>Per Monthly</span></div>
                    <div class="pricing-btn">
                        <a href="pricing.html" class="default-btn">Choose This Plan</a>
                    </div>
                    <ul class="features-list">
                        <li><i class="ri-check-line"></i> Free Mobile & Online App</li>
                        <li><i class="ri-check-line"></i> Online System</li>
                        <li><i class="ri-check-line"></i> Data full Access</li>
                        <li><i class="ri-check-line"></i> 1 Business Mastercard</li>
                        <li><i class="ri-check-line"></i> International Payment</li>
                        <li><i class="ri-check-line"></i> Support Unlimited</li>
                    </ul>
                    <div class="best-sale">Best Sale</div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-pricing-table" data-aos="fade-up" data-aos-delay="70" data-aos-duration="700"
                    data-aos-once="true">
                    <div class="pricing-header">
                        <h3>Premium</h3>
                    </div>
                    <div class="price">$99 <span>Per Monthly</span></div>
                    <div class="pricing-btn">
                        <a href="pricing.html" class="default-btn">Choose This Plan</a>
                    </div>
                    <ul class="features-list">
                        <li><i class="ri-check-line"></i> Free Mobile & Online App</li>
                        <li><i class="ri-check-line"></i> Online System</li>
                        <li><i class="ri-check-line"></i> Data full Access</li>
                        <li><i class="ri-check-line"></i> 1 Business Mastercard</li>
                        <li><i class="ri-check-line"></i> International Payment</li>
                        <li><i class="ri-check-line"></i> Support Unlimited</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="review-area bg-F4F5F5 ptb-100">
    <div class="container">
        <div class="section-title">
            <span>Our Review</span>
            <h2>More Than 4,405,28 Happy Customers Trust Our Services</h2>
        </div>
        <div class="review-slides-two owl-carousel owl-theme">
            <div class="single-review-card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                data-aos-once="true">
                <ul class="review-rating">
                    <li><i class="ri-star-line"></i></li>
                    <li><i class="ri-star-line"></i></li>
                    <li><i class="ri-star-line"></i></li>
                    <li><i class="ri-star-line"></i></li>
                    <li><i class="ri-star-line"></i></li>
                </ul>
                <p>Vitae cras leo tellus lectus non fusce tate nibh massa. Quis ut odio quam in lorem nam felis sed.
                    Eleifend euismod vitae parturient libero. Magna in parturient congue aliquam egestas.</p>
                <div class="review-info">
                    <img src="assets/images/review/review-1.jpg" alt="image">
                    <h3>Thomoson Piterson</h3>
                    <span>Endemycon Leader</span>
                </div>
                <div class="reviewquote-image">
                    <img src="assets/images/quote-icon.png" alt="image">
                </div>
            </div>
            <div class="single-review-card" data-aos="fade-up" data-aos-delay="60" data-aos-duration="600"
                data-aos-once="true">
                <ul class="review-rating">
                    <li><i class="ri-star-line"></i></li>
                    <li><i class="ri-star-line"></i></li>
                    <li><i class="ri-star-line"></i></li>
                    <li><i class="ri-star-line"></i></li>
                    <li><i class="ri-star-line"></i></li>
                </ul>
                <p>Vitae cras leo tellus lectus non fusce tate nibh massa. Quis ut odio quam in lorem nam felis sed.
                    Eleifend euismod vitae parturient libero. Magna in parturient congue aliquam egestas.</p>
                <div class="review-info">
                    <img src="assets/images/review/review-2.jpg" alt="image">
                    <h3>Maxwel Warner</h3>
                    <span>Endemycon Leader</span>
                </div>
                <div class="reviewquote-image">
                    <img src="assets/images/quote-icon.png" alt="image">
                </div>
            </div>
        </div>
        <div class="review-optional-content">
            <p>But don’t just take our word for it - check out what our customers have to say about their experience
                with us: <b>Excellent</b> <span>Based on 25,454 reviews</span></p>
        </div>
    </div>
    <div class="review-shape">
        <img src="assets/images/review/shape-1.png" alt="image">
    </div>
    <div class="review-shape-2">
        <img src="assets/images/review/shape-2.png" alt="image">
    </div>
</div>


<div class="app-area ptb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="app-content" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <span>Download Our Mobile App</span>
                    <h3>You Can Find All The Thing You Need In Our Mobile App</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat nisl bibendum vitae
                        consequat. Nisl ut sed accumsan.</p>
                    <div class="app-btn-box">
                        <a href="#" class="appstore-btn" target="_blank">
                            <i class="ri-apple-fill"></i>
                            Download On
                            <span>App Store</span>
                        </a>
                        <a href="#" class="google-btn" target="_blank">
                            <i class="ri-google-line"></i>
                            Download On
                            <span>Google Play</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="app-image" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <img src="assets/images/app.png" alt="image">
                    <div class="circle-pattern" data-aos="fade-down" data-aos-delay="70" data-aos-duration="700"
                        data-aos-once="true"></div>
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


<div class="fun-fact-area pt-100 pb-75">
    <div class="container">
        <div class="section-title">
            <span>Our Funfact</span>
            <h2>We Always Try To Understand Customers Expectation</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-sm-6 col-6">
                <div class="single-funfact-box" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <h3>
                        <span class="odometer" data-count="180">00</span>
                        <span class="small-text">K</span>
                    </h3>
                    <p>Downloaded</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-6">
                <div class="single-funfact-box" data-aos="fade-up" data-aos-delay="60" data-aos-duration="600"
                    data-aos-once="true">
                    <h3>
                        <span class="odometer" data-count="20">00</span>
                        <span class="small-text">K</span>
                    </h3>
                    <p>Feedback</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-6">
                <div class="single-funfact-box" data-aos="fade-up" data-aos-delay="70" data-aos-duration="700"
                    data-aos-once="true">
                    <h3>
                        <span class="odometer" data-count="500">00</span>
                        <span class="small-text">+</span>
                    </h3>
                    <p>Workers</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-6">
                <div class="single-funfact-box" data-aos="fade-up" data-aos-delay="80" data-aos-duration="800"
                    data-aos-once="true">
                    <h3>
                        <span class="odometer" data-count="100">00</span>
                        <span class="small-text">+</span>
                    </h3>
                    <p>Contrubutors</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="go-top">
    <i class="ri-arrow-up-s-line"></i>
</div>


@endsection