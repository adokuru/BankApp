@extends('layouts.frontend.layout')
@section('main')

<div class="page-banner-wrap-area pt-100">
    <div class="container">
        <div class="help-center-box">
            <h3>Hi, How Can We Help You?</h3>
            <form class="search-form">
                <input type="search" class="form-control" placeholder="Search for articles ...">
                <button type="submit"><i class="ri-search-line"></i></button>
            </form>
            <div class="help-image">
                <img src="assets/images/help.png" alt="image">
            </div>
            <div class="help-shape">
                <img src="assets/images/page-banner/shape.png" alt="image">
            </div>
            <div class="help-shape-2">
                <img src="assets/images/page-banner/shape-2.png" alt="image">
            </div>
            <div class="help-shape-3">
                <img src="assets/images/page-banner/shape-3.png" alt="image">
            </div>
        </div>
    </div>
</div>


<div class="explore-area pt-100 pb-75">
    <div class="container">
        <div class="section-title">
            <span>Topics</span>
            <h2>Explore All Topics</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-sm-6">
                <div class="single-explore-card">
                    <div class="explore-content">
                        <div class="explore-image">
                            <img src="assets/images/explore/explore-1.png" alt="image">
                        </div>
                        <h3>Managing Your Account</h3>
                        <p>Adipiscing eli neque mi diam nim etus arcu porta viverra pretium auctor ut nam sed
                            adipiscing eliId neque mi diam nim etus arcu porta viverra.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="single-explore-card">
                    <div class="explore-content">
                        <div class="explore-image">
                            <img src="assets/images/explore/explore-2.png" alt="image">
                        </div>
                        <h3>Receiving Money</h3>
                        <p>Adipiscing eli neque mi diam nim etus arcu porta viverra pretium auctor ut nam sed
                            adipiscing eliId neque mi diam nim etus arcu porta viverra.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="single-explore-card">
                    <div class="explore-content">
                        <div class="explore-image">
                            <img src="assets/images/explore/explore-3.png" alt="image">
                        </div>
                        <h3>Snuff Card</h3>
                        <p>Adipiscing eli neque mi diam nim etus arcu porta viverra pretium auctor ut nam sed
                            adipiscing eliId neque mi diam nim etus arcu porta viverra.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="single-explore-card">
                    <div class="explore-content">
                        <div class="explore-image">
                            <img src="assets/images/explore/explore-4.png" alt="image">
                        </div>
                        <h3>Holding Money</h3>
                        <p>Adipiscing eli neque mi diam nim etus arcu porta viverra pretium auctor ut nam sed
                            adipiscing eliId neque mi diam nim etus arcu porta viverra.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="single-explore-card">
                    <div class="explore-content">
                        <div class="explore-image">
                            <img src="assets/images/explore/explore-5.png" alt="image">
                        </div>
                        <h3>Sending Money</h3>
                        <p>Adipiscing eli neque mi diam nim etus arcu porta viverra pretium auctor ut nam sed
                            adipiscing eliId neque mi diam nim etus arcu porta viverra.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="single-explore-card">
                    <div class="explore-content">
                        <div class="explore-image">
                            <img src="assets/images/explore/explore-6.png" alt="image">
                        </div>
                        <h3>Our Business</h3>
                        <p>Adipiscing eli neque mi diam nim etus arcu porta viverra pretium auctor ut nam sed
                            adipiscing eliId neque mi diam nim etus arcu porta viverra.</p>
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


@endsection