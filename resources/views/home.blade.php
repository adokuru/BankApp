@extends('layouts.frontend.layout')
@section('main')

<div class="main-banner-area">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-12" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500"
                data-aos-once="true">
                <div class="main-banner-content">
                    <span>Simple. Quick. Secure.</span>
                    <h1>Transfer Money Across World In Real Time</h1>
                    <p>An international account to send money to over 60 countries around the world, up to 7x
                        cheaper the bank. <a href="about-us.html">Learn more</a></p>
                    <div class="banner-btn">
                        <a href="contact.html" class="default-btn">Send Now</a>
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
            <div class="col-lg-4 col-md-12">
                <div class="main-banner-image" data-speed="0.05" data-revert="true">
                    <img src="{{asset('frontend_assets/images/main-banner/banner-women.png')}}" alt="image"
                        data-aos="fade-down" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                </div>
            </div>
            <div class="col-lg-4 col-md-12" data-aos="fade-left" data-aos-delay="50" data-aos-duration="500"
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
            </div>
        </div>
    </div>
    <div class="main-banner-shape" data-speed="0.08" data-revert="true">
        <img src="assets/images/main-banner/shape-1.png" alt="image">
    </div>
    <div class="main-banner-shape-2" data-speed="0.08" data-revert="true">
        <img src="assets/images/main-banner/shape-2.png" alt="image">
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


<div class="compare-pricing-area pb-100">
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
</div>


<div class="security-area ptb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="security-image">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-sm-6">
                            <div class="security-wrap" data-aos="fade-down" data-aos-delay="50" data-aos-duration="500"
                                data-aos-once="true">
                                <img src="assets/images/security/security-1.jpg" alt="image">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="security-wrap mb-25" data-aos="fade-left" data-aos-delay="50"
                                data-aos-duration="500" data-aos-once="true">
                                <img src="assets/images/security/security-2.jpg" alt="image">
                            </div>
                            <div class="security-wrap" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                                data-aos-once="true">
                                <img src="assets/images/security/security-3.jpg" alt="image">
                            </div>
                        </div>
                    </div>
                    <div class="security-shape" data-speed="0.08" data-revert="true">
                        <img src="assets/images/security/shape-1.png" alt="image">
                    </div>
                    <div class="security-shape-2" data-speed="0.08" data-revert="true">
                        <img src="assets/images/security/shape-2.png" alt="image">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="security-content" data-aos="fade-left" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <span>Security</span>
                    <h3>Take The Stress Out Of Managing Property And Money</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat nisl bibendum vitae
                        consequat. Nisl ut sed accumsan congue id tempus fringilla diam arcu. Venenatis nulla
                        senectus risus sagittis turpis felis egestas.</p>
                    <div class="security-inner-box">
                        <div class="icon">
                            <i class="flaticon-shield"></i>
                        </div>
                        <h4>Pay Online Securely With Instant Notifications</h4>
                        <p>Adipiscing eliId neque mi, diam nim etus arcu porta viverra pretium auctor ut nam sed.
                        </p>
                    </div>
                    <div class="security-inner-box">
                        <div class="icon">
                            <i class="flaticon-secure-shield"></i>
                        </div>
                        <h4>Convert Your Money In Seconds</h4>
                        <p>Adipiscing eliId neque mi, diam nim etus arcu porta viverra pretium auctor ut nam sed.
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
                    <h3>The Reliable, Cheap & Fastest Way To Send Money Abroad</h3>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="single-features-card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500"
                            data-aos-once="true">
                            <div class="icon-image">
                                <img src="assets/images/features/icon-1.png" alt="image">
                            </div>
                            <div class="content">
                                <h3>Faster And Cheaper</h3>
                                <ul class="list">
                                    <li><i class="ri-checkbox-circle-line"></i> Lorem neque, diam nim etus porta
                                        viverra. pretium auctor ut nam sed.</li>
                                    <li><i class="ri-checkbox-circle-line"></i> Adipiscing eliId neque, diam nim
                                        etus porta viverra. pretium auctor nam sed.</li>
                                    <li><i class="ri-checkbox-circle-line"></i> EliId neque, diam nim etus porta
                                        viverra. pretium auctor ut nam sed.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="single-features-card" data-aos="fade-down" data-aos-delay="50"
                            data-aos-duration="500" data-aos-once="true">
                            <div class="icon-image">
                                <img src="assets/images/features/icon-2.png" alt="image">
                            </div>
                            <div class="content">
                                <h3>Trusted & Secure</h3>
                                <ul class="list">
                                    <li><i class="ri-checkbox-circle-line"></i> Lorem neque, diam nim etus porta
                                        viverra. pretium auctor ut nam sed.</li>
                                    <li><i class="ri-checkbox-circle-line"></i> Adipiscing eliId neque, diam nim
                                        etus porta viverra. pretium auctor nam sed.</li>
                                    <li><i class="ri-checkbox-circle-line"></i> EliId neque, diam nim etus porta
                                        viverra. pretium auctor ut nam sed.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="features-vector-image" data-aos="fade-left" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <img src="assets/images/features/features-1.png" alt="image">
                </div>
            </div>
        </div>
    </div>
</div>


<div class="coverage-area pt-100 pb-75">
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
                            <img src="assets/images/coverage/coverage-7.png" alt="image">
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
</div>


<div class="review-area ptb-100">
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
                    <img src="assets/images/quote-icon.png" alt="image">
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
                    <img src="assets/images/quote-icon.png" alt="image">
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
                    <img src="assets/images/quote-icon.png" alt="image">
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


<div class="faq-area ptb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="faq-image" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <img src="assets/images/faq.png" alt="image">
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
                                    What Is A Multi-Currency Account And How Does It Work?
                                </button>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#FaqAccordion">
                                    <div class="accordion-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est nibh felis
                                            tortor viverra pulvinar nibh tincidunt pellentesque dolor. Sem lectus
                                            magna metus sit felis, ipsum, et. Auctor tellus id nunc nibh felis
                                            aliquam.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    What Happened To The Borderless Account?
                                </button>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    data-bs-parent="#FaqAccordion">
                                    <div class="accordion-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est nibh felis
                                            tortor viverra pulvinar nibh tincidunt pellentesque dolor. Sem lectus
                                            magna metus sit felis, ipsum, et. Auctor tellus id nunc nibh felis
                                            aliquam.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Can I Hold Multiple Currencies In A Snuff Account?
                                </button>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    data-bs-parent="#FaqAccordion">
                                    <div class="accordion-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est nibh felis
                                            tortor viverra pulvinar nibh tincidunt pellentesque dolor. Sem lectus
                                            magna metus sit felis, ipsum, et. Auctor tellus id nunc nibh felis
                                            aliquam.</p>
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