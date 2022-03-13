@extends('layouts.frontend.layout')
@section('main')

<div class="page-banner-area">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-md-6">
                <div class="page-banner-content" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <h2>Our Features</h2>
                    <ul>
                        <li>
                            <a href="{{ route('home')}}">Home</a>
                        </li>

                        <li>Features</li>
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


<div class="reliable-area ptb-100">
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


<div class="benefits-area pt-100 pb-75">
    <div class="container">
        <div class="section-title">
            <span>Your Benefits</span>
            <h2>Take The Stress Out Of Managing Property And Money</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6">
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
            <div class="col-lg-6 col-md-6">
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
            <div class="col-lg-6 col-md-6">
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
            <div class="col-lg-6 col-md-6">
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
            <div class="col-lg-6 col-md-6">
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
            <div class="col-lg-6 col-md-6">
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


<div class="faq-area ptb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="faq-item" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500"
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
                                    Can I Hold Multiple Currencies In A Manx Capitale Privée Banque Account?
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
            <div class="col-lg-6 col-md-12">
                <div class="faq-image" data-aos="fade-left" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <img src="assets/images/faq.png" alt="image">
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
            <h3>Sending International Business Payments or Sending Money To Family Overseas? Manx Capitale Privée Banque Are Your Fast And
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