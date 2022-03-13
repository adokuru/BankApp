@extends('layouts.frontend.layout')
@section('main')

<div class="page-banner-area">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-md-6">
                <div class="page-banner-content" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500"
                    data-aos-once="true">
                    <h2>Frequently Questions</h2>
                    <ul>
                        <li>
                            <a href="{{ route('home')}}">Home</a>
                        </li>
                        <li>FAQ</li>
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


<div class="faq-area ptb-100">
    <div class="container">
        <div class="section-title">
            <span>Frequently Ask Questions</span>
            <h2>Let’s Answer Some Of Your Questions Or Frequently Asked Questions</h2>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="faq-accordion mb-25">
                    <div class="accordion" id="FaqAccordion">
                        <div class="accordion-item">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                What if I have another question?
                            </button>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <p>Call our contact centre on 01 2716816 or 07007007000. You can also send a mail to
                                        customerservice@www.snuffbank.com. We look forward to serving you.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Can I print my Statement of account?
                            </button>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <p>Yes. You can print your statement of account by clicking on ‘Export to Excel’ or
                                        ‘Export to PDF’ button. This downloads your statement of account in excel or PDF
                                        format which you can save or print.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Can I schedule future transfers?
                            </button>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <p>Yes, you can schedule future transfers through the standing order menu.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="faq-accordion">
                    <div class="accordion" id="FaqAccordionTwo">
                        <div class="accordion-item">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Who determines the exchange rate and charges on transfers?
                            </button>
                            <div id="collapseFour" class="accordion-collapse collapse show"
                                data-bs-parent="#FaqAccordionTwo">
                                <div class="accordion-body">

                                    <p>The exchange rate and transaction charge are determined by the Money Transfer
                                        Organization and not the Bank.</p>


                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                How safe is Manx Capitale Privée Banque online services?
                            </button>
                            <div id="collapseFive" class="accordion-collapse collapse"
                                data-bs-parent="#FaqAccordionTwo">
                                <div class="accordion-body">
                                    <p>UnionOnline is very secure. There are several level of security measures put in
                                        place to ensure that your banking transactions are done seamlessly. The security
                                        features include:
                                    <ul>
                                        <li>Unique username</li>
                                        <li>Password</li>
                                        <li>Security word</li>
                                        <li>Token</li>
                                        </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                What If I forget my Manx Capitale Privée BanqueOnline password?
                            </button>
                            <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#FaqAccordionTwo">
                                <div class="accordion-body">

                                    <p>UnionOnline is very secure. There are several level of security measures put in
                                        place to ensure that your banking transactions are done seamlessly. The security
                                        features include:
                                    <ul>
                                        <li>Unique username</li>
                                        <li>Password</li>
                                        <li>Security word</li>
                                        <li>Token</li>
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
                    <a href="{{ route('help-center')}}" class="default-btn">Personal Account</a>
                </li>
                <li>
                    <a href="{{ route('help-center')}}" class="optional-btn">Business Account</a>
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