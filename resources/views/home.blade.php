@extends('layouts.frontend.layout')
@section('main')

<div class="main-banner-area">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500"
                data-aos-once="true">
                <div class="main-banner-content">
                    <span>Simple. Quick. Secure.</span>
                    <h1>Get a Secured Personal and Business Account </h1>
                    <p>We offer high quality, sophisticated, personal and business solutions founded on a long tradition
                        of
                        wealth and asset management, infused with an entrepreneurial and business spirit.
                        <!--  , to 7x
                        Faster and secured. <a href="about-us.html">Learn more</a></p> -->
                    <div class="banner-btn">
                        <a href="contact.html" class="default-btn">Get Started</a>
                    </div>
                    <ul class="trust-content">
                        <li>

                            <img src="{{asset('frontend_assets/images/main-banner/line-graph.png')}}" alt="image">
                            <span>Over 10 Million Customers</span>
                        </li>
                        <li>
                            <img src="{{asset('frontend_assets/images/main-banner/diamond.png')}}" alt="image">
                            <span>Fast And Hassle-Free</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="main-banner-image" data-speed="0.05" data-revert="true">
                    <img src="{{asset('frontend_assets/images/main-banner/1.png')}}" alt="image" data-aos="fade-down"
                        data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                </div>
            </div>
            <!-- <div class="col-lg-4 col-md-12" data-aos="fade-left" data-aos-delay="50" data-aos-duration="500"
                data-aos-once="true">
                <form class="money-transfer-form">
                    <div class="amount-currency-total-content">
                        <span>First Five Transfer Is Fee-Free</span>
                        <h3>1 GBP = 5.014920 PLN</h3>
                    </div>
                    <div class="money-transfer-content">
                        <div class="form-group">
                            <label>You Send</label>
                            <input type="text" class="form-control" autocomplete="off" value="25,040">
                            <div class="dropdown amount-currency-select">
                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="true">
                                    <img src="assets/images/currency-flag/GBP.png" alt="flag">
                                    <span class="currency-name"></span>
                                </button>
                                <div class="dropdown-menu currency-dropdown-menu">
                                    <a class="dropdown-item" href="#">
                                        <img src="assets/images/currency-flag/GBP.png" alt="flag">
                                        GBP
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <img src="assets/images/currency-flag/EUR.png" alt="flag">
                                        EUR
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <img src="assets/images/currency-flag/AED.png" alt="flag">
                                        AED
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <img src="assets/images/currency-flag/AUD.png" alt="flag">
                                        AUD
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <img src="assets/images/currency-flag/CAD.png" alt="flag">
                                        CAD
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <img src="assets/images/currency-flag/JPY.png" alt="flag">
                                        JPY
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <img src="assets/images/currency-flag/MYR.png" alt="flag">
                                        MYR
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <img src="assets/images/currency-flag/NZD.png" alt="flag">
                                        NZD
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <img src="assets/images/currency-flag/TRY.png" alt="flag">
                                        TRY
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <img src="assets/images/currency-flag/USD.png" alt="flag">
                                        USD
                                    </a>
                                </div>
                            </div>
                        </div>
                        <ul class="amount-currency-info">
                            <li class="d-flex justify-content-between align-items-center">
                                <div class="info-icon">
                                    <i class="ri-subtract-line"></i>
                                </div>
                                <div class="info-left">
                                    <b>22.07 GBP</b>
                                </div>
                                <div class="info-right">
                                    <div class="dropdown amount-currency-select">
                                        <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="true">
                                            <span class="currency-name"></span>
                                        </button>
                                        <div class="dropdown-menu currency-dropdown-menu">
                                            <a class="dropdown-item" href="#">Low Cost Transfer</a>
                                            <a class="dropdown-item" href="#">Easy Transfer</a>
                                            <a class="dropdown-item" href="#">Advanced Transfer</a>
                                        </div>
                                    </div>
                                    <span class="fee-text">fee</span>
                                </div>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <div class="info-icon">
                                    <i class="ri-pause-line"></i>
                                </div>
                                <div class="info-left">
                                    <span>63,1547 GBP</span>
                                </div>
                                <div class="info-right">
                                    <span>Ammount Will Convert</span>
                                </div>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <div class="info-icon">
                                    <i class="ri-close-fill"></i>
                                </div>
                                <div class="info-left">
                                    <strong>1.0539874 <i class="flaticon-graph"></i></strong>
                                </div>
                                <div class="info-right">
                                    <span>Guaranted Rate (4 hrs)</span>
                                </div>
                            </li>
                        </ul>
                        <div class="form-group">
                            <label>Recipient Gets</label>
                            <input type="text" class="form-control" autocomplete="off" value="14,02433.25">
                            <div class="dropdown amount-currency-select">
                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="true">
                                    <img src="assets/images/currency-flag/EUR.png" alt="flag">
                                    <span class="currency-name"></span>
                                </button>
                                <div class="dropdown-menu currency-dropdown-menu">
                                    <a class="dropdown-item" href="#">
                                        <img src="assets/images/currency-flag/EUR.png" alt="flag">
                                        EUR
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <img src="assets/images/currency-flag/GBP.png" alt="flag">
                                        GBP
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <img src="assets/images/currency-flag/AED.png" alt="flag">
                                        AED
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <img src="assets/images/currency-flag/AUD.png" alt="flag">
                                        AUD
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <img src="assets/images/currency-flag/CAD.png" alt="flag">
                                        CAD
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <img src="assets/images/currency-flag/JPY.png" alt="flag">
                                        JPY
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <img src="assets/images/currency-flag/MYR.png" alt="flag">
                                        MYR
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <img src="assets/images/currency-flag/NZD.png" alt="flag">
                                        NZD
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <img src="assets/images/currency-flag/TRY.png" alt="flag">
                                        TRY
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <img src="assets/images/currency-flag/USD.png" alt="flag">
                                        USD
                                    </a>
                                </div>
                            </div>
                            <div class="lock-icon">
                                <i class="ri-lock-line"></i>
                            </div>
                        </div>
                        <div class="amount-delivery-time">
                            <span>Delivery Time: <b>By August 23th</b></span>
                        </div>
                        <ul class="amount-btn-group">
                            <li>
                                <a href="compare-pricing.html" class="default-btn">Compare Price</a>
                            </li>
                            <li>
                                <button type="button" class="optional-btn">Get Started</button>
                            </li>
                        </ul>
                    </div>
                </form>
            </div> -->
        </div>
    </div>
    <div class="main-banner-shape" data-speed="0.08" data-revert="true">
        <img src="{{asset('frontend_assets/images/main-banner/shape-1.png')}}" alt="image">
    </div>
    <div class="main-banner-shape-2" data-speed="0.08" data-revert="true">
        <img src="{{asset('frontend_assets/images/main-banner/shape-2.png')}}" alt="image">
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


<!-- <div class="compare-pricing-area pb-100">
    <div class="container">
        <div class="section-title">
            <span>Compare Our Pricing</span>
            <h2>We Charge As Little As Possible. No Subscription Fee</h2>
        </div>
        <div class="compare-pricing-table table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Sending 1,000.00 GBP With</th>
                        <th scope="col" class="bg-2A3F65"><img src="assets/images/compare-pricing/compare-1.png"
                                alt="image"></th>
                        <th scope="col"><img src="assets/images/compare-pricing/compare-2.png" alt="image"></th>
                        <th scope="col"><img src="assets/images/compare-pricing/compare-3.png" alt="image"></th>
                        <th scope="col"><img src="assets/images/compare-pricing/compare-4.png" alt="image"></th>
                        <th scope="col"><img src="assets/images/compare-pricing/compare-5.png" alt="image"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-F7F7F7">
                        <td>
                            Recipient Gets
                            <span>(Total after fees)</span>
                        </td>
                        <td class="bg-2A3F65 text-center">
                            <b>1,163.98 EUR</b>
                            <span class="color-0FC9BB">Save up to 37.14 EUR</span>
                        </td>
                        <td class="text-center">
                            <b>1,163.98 EUR</b>
                            <span class="color-FD6E5C">-81.024 EUR</span>
                        </td>
                        <td class="text-center">
                            <b>1,163.98 EUR</b>
                            <span class="color-FD6E5C">-81.024 EUR</span>
                        </td>
                        <td class="text-center">
                            <b>1,163.98 EUR</b>
                            <span class="color-FD6E5C">-81.024 EUR</span>
                        </td>
                        <td class="text-center">
                            <b>1,163.98 EUR</b>
                            <span class="color-FD6E5C">-81.024 EUR</span>
                        </td>
                    </tr>
                    <tr>
                        <td>Transfer Fee</td>
                        <td class="bg-2A3F65 text-center">
                            1.0539874
                            <span class="color-fff">(First 5 fee-free)</span>
                        </td>
                        <td class="text-center color-009286">1.0539874</td>
                        <td class="text-center color-009286">1.0539874</td>
                        <td class="text-center color-009286">1.0539874</td>
                        <td class="text-center color-009286">1.0539874</td>
                    </tr>
                    <tr class="bg-F7F7F7">
                        <td>
                            Exchange Rate
                            <span>(1 GBP → EUR)</span>
                        </td>
                        <td class="bg-2A3F65 text-center">
                            5.026
                            <span class="color-fff">Mid-market rate</span>
                        </td>
                        <td class="text-center color-5D7079">5.026</td>
                        <td class="text-center color-5D7079">5.026</td>
                        <td class="text-center color-5D7079">5.026</td>
                        <td class="text-center color-5D7079">5.026</td>
                    </tr>
                    <tr>
                        <td>Total Cost</td>
                        <td class="bg-2A3F65 text-center">
                            5.026
                        </td>
                        <td class="text-center color-90006F">5.026</td>
                        <td class="text-center color-90006F">5.026</td>
                        <td class="text-center color-90006F">5.026</td>
                        <td class="text-center color-90006F">5.026</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div> -->


<div class="security-area ptb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="security-image">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-sm-6">
                            <div class="security-wrap" data-aos="fade-down" data-aos-delay="50" data-aos-duration="500"
                                data-aos-once="true">
                                <img src="{{asset('frontend_assets/images/security/security-1.jpg')}}" alt="image">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="security-wrap mb-25" data-aos="fade-left" data-aos-delay="50"
                                data-aos-duration="500" data-aos-once="true">
                                <img src="{{asset('frontend_assets/images/main-banner/4.jpg')}}" alt="image">
                            </div>
                            <div class="security-wrap" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                                data-aos-once="true">
                                <img src="{{asset('frontend_assets/images/security/security-3.jpg')}}" alt="image">
                            </div>
                        </div>
                    </div>
                    <div class="security-shape" data-speed="0.08" data-revert="true">
                        <img src="{{asset('frontend_assets/images/security/shape-1.png')}}" alt="image">
                    </div>
                    <div class="security-shape-2" data-speed="0.08" data-revert="true">
                        <img src="{{asset('frontend_assets/images/security/shape-2.png')}}" alt="image">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="security-content" data-aos="fade-left" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <span>Security</span>
                    <h3>Take The Stress Out Of Managing Property And Money</h3>
                    <p>We work closely with you to fully understand your investment objectives, risk sensitivity, tax
                        requirements and cash-flow needs. When developing your financial wealth plan, we take a holistic
                        approach to understand your full financial aspirations. By analyzing the complete picture, our
                        team of specialists are able to provide you with a 360° plan to help you achieve your goals.</p>
                    <div class="security-inner-box">
                        <div class="icon">
                            <i class="flaticon-shield"></i>
                        </div>
                        <h4>Pay Online Securely With Instant Notifications</h4>
                        <p>We pride our selves in giving highly secured transaction and baking solutions.
                        </p>
                    </div>
                    <div class="security-inner-box">
                        <div class="icon">
                            <i class="flaticon-secure-shield"></i>
                        </div>
                        <h4>Send Money Borders</h4>
                        <p>Send money securely across the borders, in mintues, without any hidden charges.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="features-area ptb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-12">
                <div class="features-content" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <span>Our Features</span>
                    <h3>The Reliable, Fastest & Secured Way To Own a Personal or Business Account</h3>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="single-features-card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                            data-aos-once="true">
                            <div class="icon-image">
                                <img src="{{asset('frontend_assets/images/features/icon-1.png')}}" alt="image">
                            </div>
                            <div class="content">
                                <h3>We Provide State Of The Act Solutions</h3>
                                <ul class="list">
                                    <li><i class="ri-checkbox-circle-line"></i><b> Personal Solutions:</b> We are
                                        combining the long-standing Swiss Private Banking traditions with a pro-active
                                        personalized mindset.
                                    </li>
                                    <li><i class="ri-checkbox-circle-line"></i><b> Business Solutions and Asset
                                            Management:</b> We are Swiss through and through. Excellence and reliability
                                        are the values guiding our client relations and business activities.
                                    </li>
                                    <li><i class="ri-checkbox-circle-line"></i><b> Customized Solutions:</b> Wealth is
                                        personal. That is why we always customise our solutions to our clients’ needs.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="single-features-card" data-aos="fade-down" data-aos-delay="50"
                            data-aos-duration="500" data-aos-once="true">
                            <div class="icon-image">
                                <img src="{{asset('frontend_assets/images/features/icon-2.png')}}" alt="image">
                            </div>
                            <div class="content">
                                <h3>Trusted & Secure</h3>
                                <ul class="list">
                                    <li><i class="ri-checkbox-circle-line"></i> We provide highly Secured & trusted
                                        business and personal accounts for our clients.
                                    </li>
                                    <li><i class="ri-checkbox-circle-line"></i> We pride our selves, with our state of
                                        the act technology and
                                        authentication system that will keep your money and transactions secured</li>
                                    <li><i class="ri-checkbox-circle-line"></i> We take no one’s trust for granted, and
                                        we manage client assets with the utmost care and respect.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="features-vector-image" data-aos="fade-left" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <img src="{{asset('frontend_assets/images/features/features-1.png')}}" alt="image">
                </div>
            </div>
        </div>
    </div>
</div>


<!-- <div class="coverage-area pt-100 pb-75">
    <div class="container">
        <div class="section-title">
            <span>We Are Covering</span>
            <h2>Get These Local Account Details Pay Just Like Pay A Local</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-sm-6">
                <div class="single-coverage-card" data-aos="fade-up" data-aos-delay="10" data-aos-duration="100"
                    data-aos-once="true">
                    <div class="content">
                        <div class="coverage-image">
                            <img src="assets/images/coverage/coverage-1.png" alt="image">
                        </div>
                        <h3>British Pound</h3>
                        <p>Adipiscing eliId nque, diraam nim etus porta vierra.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-coverage-card" data-aos="fade-up" data-aos-delay="20" data-aos-duration="200"
                    data-aos-once="true">
                    <div class="content">
                        <div class="coverage-image">
                            <img src="assets/images/coverage/coverage-2.png" alt="image">
                        </div>
                        <h3>Euro</h3>
                        <p>Adipiscing eliId nque, diraam nim etus porta vierra.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-coverage-card" data-aos="fade-up" data-aos-delay="30" data-aos-duration="300"
                    data-aos-once="true">
                    <div class="content">
                        <div class="coverage-image">
                            <img src="assets/images/coverage/coverage-3.png" alt="image">
                        </div>
                        <h3>US Dollar</h3>
                        <p>Adipiscing eliId nque, diraam nim etus porta vierra.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-coverage-card" data-aos="fade-up" data-aos-delay="40" data-aos-duration="400"
                    data-aos-once="true">
                    <div class="content">
                        <div class="coverage-image">
                            <img src="assets/images/coverage/coverage-4.png" alt="image">
                        </div>
                        <h3>Kuwait Dinar</h3>
                        <p>Adipiscing eliId nque, diraam nim etus porta vierra.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-coverage-card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <div class="content">
                        <div class="coverage-image">
                            <img src="assets/images/coverage/coverage-5.png" alt="image">
                        </div>
                        <h3>Australian Dollar</h3>
                        <p>Adipiscing eliId nque, diraam nim etus porta vierra.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-coverage-card" data-aos="fade-up" data-aos-delay="60" data-aos-duration="600"
                    data-aos-once="true">
                    <div class="content">
                        <div class="coverage-image">
                            <img src="assets/images/coverage/coverage-6.png" alt="image">
                        </div>
                        <h3>Hungarian Forint</h3>
                        <p>Adipiscing eliId nque, diraam nim etus porta vierra.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-coverage-card" data-aos="fade-up" data-aos-delay="70" data-aos-duration="700"
                    data-aos-once="true">
                    <div class="content">
                        <div class="coverage-image">
                            <img src="assets/images/coverage/coverage-state of the art.png" alt="image">
                        </div>
                        <h3>Canadian Dollar</h3>
                        <p>Adipiscing eliId nque, diraam nim etus porta vierra.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-coverage-card" data-aos="fade-up" data-aos-delay="80" data-aos-duration="800"
                    data-aos-once="true">
                    <div class="content">
                        <div class="coverage-image">
                            <img src="assets/images/coverage/coverage-8.png" alt="image">
                        </div>
                        <h3>Singapore Dollar</h3>
                        <p>Adipiscing eliId nque, diraam nim etus porta vierra.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="coverage-shape">
        <img src="assets/images/coverage/shape-1.png" alt="image">
    </div>
    <div class="coverage-shape-2">
        <img src="assets/images/coverage/shape-2.png" alt="image">
    </div>
</div> -->


<!-- <div class="review-area ptb-100">
    <div class="container">
        <div class="section-title">
            <span>Our Review</span>
            <h2>More Than 4,405,28 Happy Customers Trust Our Services</h2>
        </div>
        <div class="review-slides owl-carousel owl-theme">
            <div class="single-review-box" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
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
                <div class="reviewquote-image">
                    <img src="{{asset('frontend_assets/images/quote-icon.png')}}" alt="image">
                </div>
                <div class="review-info">
                    <h3>Thomoson Piterson</h3>
                    <span>Endemycon Leader</span>
                </div>
            </div>
            <div class="single-review-box" data-aos="fade-up" data-aos-delay="60" data-aos-duration="600"
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
                <div class="reviewquote-image">
                    <img src="{{asset('frontend_assets/images/quote-icon.png')}}" alt="image">
                </div>
                <div class="review-info">
                    <h3>Maxwel Warner</h3>
                    <span>Endemycon Leader</span>
                </div>
            </div>
            <div class="single-review-box" data-aos="fade-up" data-aos-delay="70" data-aos-duration="700"
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
                <div class="reviewquote-image">
                    <img src="{{asset('frontend_assets/images/quote-icon.png')}}" alt="image">
                </div>
                <div class="review-info">
                    <h3>John Terry</h3>
                    <span>Endemycon Leader</span>
                </div>
            </div>
        </div>
        <div class="review-optional-content">
            <p>But don’t just take our word for it - check out what our customers have to say about their experience
                with us: <b>Excellent</b> <span>Based on 25,454 reviews</span></p>
        </div>
    </div>
</div> -->


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


<div class="faq-area ptb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="faq-image" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <img src="{{asset('frontend_assets/images/faq.png')}}" alt="image">
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="faq-item" data-aos="fade-left" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <div class="faq-content">
                        <span>Frequently Ask Questions</span>
                        <h3>Let’s Answer Some Of Your Questions Or Frequently Asked Questions</h3>
                    </div>
                    <div class="faq-accordion">
                        <div class="accordion" id="FaqAccordion">
                            <div class="accordion-item">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Is It Possible To Open An Account In The Country And Operate The Account While Out
                                    Of The Country?
                                </button>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#FaqAccordion">
                                    <div class="accordion-body">
                                        <p>Yes. The account can be operated through any of our card products or internet
                                            banking solution.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    How Long Does It Take To Open An Account With The Bank?
                                </button>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    data-bs-parent="#FaqAccordion">
                                    <div class="accordion-body">
                                        <p>Accounts are opened within 24 hours upon submission of complete
                                            documentation.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    What Types Of Transactions Can I Perform On Manx Capitale Privée BanqueOnline?
                                </button>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    data-bs-parent="#FaqAccordion">
                                    <div class="accordion-body">
                                        <p>

                                        <ul>
                                            <li>Check your balance</li>
                                            <li>Generation your bank statements</li>
                                            <li>Perform own bank and third-party transfers</li>
                                            <li>Perform international transfers</li>
                                            <li>Review your transaction history</li>
                                            <li>Pay your bills</li>
                                            <li>Schedule standing orders</li>
                                        </ul>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="go-top">
    <i class="ri-arrow-up-s-line"></i>
</div>


@endsection