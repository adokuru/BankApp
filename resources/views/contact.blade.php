@extends('layouts.frontend.layout')
@section('main')
    <div class="page-banner-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <div class="page-banner-content" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <h2>Contact Us</h2>
                        <ul>
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li>Contact</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="page-banner-image" data-aos="fade-left" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <img src="assets/images/page-banner/banner.png" alt="image">
                        <div class="banner-shape">
                            <img src="assets/images/page-banner/shape.png" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="contact-information-area pt-100 pb-75">
        <div class="container">
            <div class="section-title">
                <span>Contact Information</span>
                <h2>We're More Than International Payments, Get In Touch</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <div class="contact-information-card">
                        <div class="icon">
                            <i class="ri-map-pin-line"></i>
                        </div>
                        <h3>Address:</h3>
                        <p>Thurgauerstrasse 101, 8152 Opfikon, Switzerland</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="contact-information-card">
                        <div class="icon">
                            <i class="ri-mail-line"></i>
                        </div>
                        <h3>Email Address:</h3>
                        <p><a href="mailto:info@manx-capitalebanque.com"><span class="__cf_email__" data-cfemail="info@manx-capitalebanque.com">[email&#160;protected]</span></a>
                            <br> <a href="mailto:contact@manx-capitalebanque.com"><span class="__cf_email__" data-cfemail="contact@manx-capitalebanque.com">[email&#160;protected]</span></a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="contact-information-card">
                        <div class="icon">
                            <i class="ri-phone-line"></i>
                        </div>
                        <h3>Phone Number:</h3>
                        <p><a href="tel:44789289528790">+44 7892 8952 8790</a> <br> <a href="tel:44 89289524329">+44
                                7892 8952 4329</a></p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="contact-information-card">
                        <div class="icon">
                            <i class="ri-printer-line"></i>
                        </div>
                        <h3>Fax:</h3>
                        <p><a href="tel:12129876543">+1-212-9876543</a> <br> <a href="tel:121298765436709">+1-212-9876543670</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="contact-area ptb-100">
        <div class="container">
            <div class="section-title">
                <span>Contact Information</span>
                <h2>Fill In Your Information And We'll Be In Touch As Soon As We Can</h2>
            </div>
            <form id="contactForm">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>How Did You Find Us?</label>
                            <select class="form-select">
                                <option value="4">Enquires</option>
                                <option selected value="1">Open an Account</option>
                                <option value="2">Complaints</option>
                                <option value="3">Transfer Queries</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label>Your Name *</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Eg: Thomas Adison" required data-error="Please enter your name">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="example@manx-capitalebanque.com" required data-error="Please enter your email">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label>Phone *</label>
                            <input type="text" name="phone_number" id="phone_number" placeholder="Enter your phone number" required data-error="Please enter your number" class="form-control">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label>Subject *</label>
                            <input type="text" name="msg_subject" id="msg_subject" placeholder="Enter your subject" class="form-control" required data-error="Please enter your subject">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>Your Message</label>
                            <textarea name="message" class="form-control" id="message" placeholder="Type your message" cols="30" rows="6" required data-error="Write your message"></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <p class="form-cookies-consent">
                            <input type="checkbox" id="test1">
                            <label for="test1">Accept <a href="terms-of-service.html">Terms Of Services</a> And <a href="privacy-policy.html">Privacy Policy.</a></label>
                        </p>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="send-btn">
                            <button type="submit" class="default-btn">Submit Now</button>
                        </div>
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="overview-area ptb-100">
        <div class="container">
            <div class="overview-content" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <span>Connect Us</span>
                <h3>Sending International Business Payments or Sending Money To Family Overseas? Manx Capitale Privée Banque Are Your Fast And
                    Simple Solution.</h3>
                <ul class="overview-btn-group">
                    <li>
                        <a href="/contact" class="default-btn">Personal Account</a>
                    </li>
                    <li>
                        <a href="/contact" class="optional-btn">Business Account</a>
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
