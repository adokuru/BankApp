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
                                What Is A Multi-Currency Account And How Does It Work?
                            </button>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est nibh felis
                                        tortor viverra pulvinar nibh tincidunt pellentesque dolor. Sem lectus magna
                                        metus sit felis, ipsum, et. Auctor tellus id nunc nibh felis aliquam.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                What Happened To The Borderless Account?
                            </button>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est nibh felis
                                        tortor viverra pulvinar nibh tincidunt pellentesque dolor. Sem lectus magna
                                        metus sit felis, ipsum, et. Auctor tellus id nunc nibh felis aliquam.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Can I Hold Multiple Currencies In A Snuff Account?
                            </button>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#FaqAccordion">
                                <div class="accordion-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est nibh felis
                                        tortor viverra pulvinar nibh tincidunt pellentesque dolor. Sem lectus magna
                                        metus sit felis, ipsum, et. Auctor tellus id nunc nibh felis aliquam.</p>
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
                                data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                What Is The Best Features And Services We Deliver?
                            </button>
                            <div id="collapseFour" class="accordion-collapse collapse show"
                                data-bs-parent="#FaqAccordionTwo">
                                <div class="accordion-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est nibh felis
                                        tortor viverra pulvinar nibh tincidunt pellentesque dolor. Sem lectus magna
                                        metus sit felis, ipsum, et. Auctor tellus id nunc nibh felis aliquam.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                What Are The Objectives Of This Service?
                            </button>
                            <div id="collapseFive" class="accordion-collapse collapse"
                                data-bs-parent="#FaqAccordionTwo">
                                <div class="accordion-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est nibh felis
                                        tortor viverra pulvinar nibh tincidunt pellentesque dolor. Sem lectus magna
                                        metus sit felis, ipsum, et. Auctor tellus id nunc nibh felis aliquam.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                What Is A Multi-currency Card?
                            </button>
                            <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#FaqAccordionTwo">
                                <div class="accordion-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est nibh felis
                                        tortor viverra pulvinar nibh tincidunt pellentesque dolor. Sem lectus magna
                                        metus sit felis, ipsum, et. Auctor tellus id nunc nibh felis aliquam.</p>
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
            <h3>Sending International Business Payments or Sending Money To Family Overseas? Snuff Are Your Fast And
                Simple Solution.</h3>
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