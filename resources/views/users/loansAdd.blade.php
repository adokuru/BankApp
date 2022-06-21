@extends('layouts.userdashboard.app')
@section('main')
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Banca - Banking & Business Loan Bootstrap-5 HTML Template</title>
    <link rel="shortcut icon" href="https://html-template.spider-themes.net/banca/banca-html/img/favicon.png" type="image/x-icon">

    <!-- CSS here -->
    <link rel="stylesheet" type="text/css" href="https://html-template.spider-themes.net/banca/banca-html/css/bootstrap.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="https://html-template.spider-themes.net/banca/banca-html/css/elegant-icons.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="https://html-template.spider-themes.net/banca/banca-html/css/all.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="https://html-template.spider-themes.net/banca/banca-html/css/animate.css" media="all" />
    <link rel="stylesheet" type="text/css" href="https://html-template.spider-themes.net/banca/banca-html/css/nice-select.css" media="all" />
    <link rel="stylesheet" type="text/css" href="https://html-template.spider-themes.net/banca/banca-html/css/default.css" media="all" />
    <link rel="stylesheet" type="text/css" href="https://html-template.spider-themes.net/banca/banca-html/css/style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="https://html-template.spider-themes.net/banca/banca-html/css/responsive.css" media="all" />

    <!-- Preloader -->
    <div id="preloader">
        <div id="ctn-preloader" class="ctn-preloader">
            <div class="round_spinner">
                <div class="spinner"></div>
                <div class="text">
                    <img src="https://html-template.spider-themes.net/banca/banca-html/img/logo/Logo-2.png" alt="">
                </div>
            </div>
            <h2 class="head">Did You Know?</h2>
            <p></p>
        </div>
    </div>
    <!-- Header -->
    <header class="header">
        <div class="header-top py-2 bg_white">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <div class="header-info-left">

                            <div class="language-list">
                                <select id="select-lang">
                                    <option value="English">English</option>
                                    <option value="Bangla">Bangla</option>
                                    <option value="French">French</option>
                                    <option value="Hindi">Hindi</option>
                                </select>
                            </div>

                            <div class="timestamp ms-4"> <i class="icon_clock_alt"></i> Mon - Fri 10:00-18:00
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="header-info-right">
                            <ul>
                                <li>
                                    <img class="img-fluid" src="https://html-template.spider-themes.net/banca/banca-html/img/phone-outline.png" alt="phone"><a
                                        href="tel:01234567890">+01234-567890</a>
                                </li>

                                <li>
                                    <i class="icon_mail_alt"></i><a
                                        href="mailto:bancainfo@email.com">bancainfo@email.com</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-menu header-menu-3" id="sticky">
            <nav class="navbar navbar-expand-lg ">
                <div class="container">
                    <a class="navbar-brand sticky_logo" href="index.html">
                        <img class="main" src="https://html-template.spider-themes.net/banca/banca-html/img/logo/Logo.png " srcset="img/logo/Logo@2x.png 2x" alt="logo">
                        <img class="sticky" src="https://html-template.spider-themes.net/banca/banca-html/img/logo/Logo-2.png" srcset="img/logo/Logo-2@2x.png 2x" alt="logo">
                    </a>
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_toggle">
                            <span class="hamburger">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                            <span class="hamburger-cross">
                                <span></span>
                                <span></span>
                            </span>
                        </span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav menu ms-auto">
                            <li class="nav-item dropdown submenu ">
                                <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">Home</a>
                                <i class="arrow_carrot-down_alt2 mobile_dropdown_icon" aria-hidden="true"
                                    data-bs-toggle="dropdown"></i>
                                <ul class="dropdown-menu">
                                    <li class="nav-item "><a href="index.html" class="nav-link">Demo 01</a>
                                    </li>
                                    <li class="nav-item"><a href="index-2.html" class="nav-link ">Demo 02</a>
                                    </li>
                                    <li class="nav-item"><a href="index-3.html" class="nav-link">Demo 03</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown submenu">
                                <a class="nav-link dropdown-toggle active" href="loan.html" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Loan
                                </a>
                                <i class="arrow_carrot-down_alt2 mobile_dropdown_icon" aria-hidden="false"
                                    data-bs-toggle="dropdown"></i>

                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="loan.html">Get loan</a></li>
                                    <li class="nav-item"><a class="nav-link active" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Loan
                                            Application</a>
                                        <i class="arrow_carrot-down_alt2 mobile_dropdown_icon" aria-hidden="false"
                                            data-bs-toggle="dropdown"></i>

                                        <ul class="dropdown-menu">
                                            <li class="nav-item"><a class="nav-link active"
                                                    href="loan-details.html">Step
                                                    01</a></li>
                                            <li class="nav-item"><a class="nav-link" href="personal-details.html">Step
                                                    02</a></li>
                                            <li class="nav-item"><a class="nav-link" href="document-upload.html">Step
                                                    03</a></li>

                                        </ul>
                                    </li>

                                </ul>
                            </li>
                            <li class="nav-item dropdown submenu">
                                <a class="nav-link dropdown-toggle" href="career.html" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Job Pages
                                </a>
                                <i class="arrow_carrot-down_alt2 mobile_dropdown_icon" aria-hidden="false"
                                    data-bs-toggle="dropdown"></i>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="career.html">Career</a></li>
                                    <li class="nav-item"><a class="nav-link" href="job-post.html">Jobs</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="job-application.html">Job
                                            Application</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown submenu">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    Pages
                                </a>
                                <i class="arrow_carrot-down_alt2 mobile_dropdown_icon" aria-hidden="false"
                                    data-bs-toggle="dropdown"></i>
                                <ul class="dropdown-menu ">
                                    <li class="nav-item"><a class="nav-link" href="card.html">Cards</a></li>
                                    <li class="nav-item"><a class="nav-link" href="about.html">About Us</a></li>
                                    <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
                                    <li class="nav-item"><a class="nav-link" href="error.html">404 Error</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown submenu">
                                <a class="nav-link dropdown-toggle" href="blog.html" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Blog
                                </a>
                                <i class="arrow_carrot-down_alt2 mobile_dropdown_icon" aria-hidden="false"
                                    data-bs-toggle="dropdown"></i>
                                <ul class="dropdown-menu ">
                                    <li class="nav-item"><a class="nav-link" href="blog.html">Blog Listing</a></li>
                                    <li class="nav-item"><a class="nav-link" href="blog-details.html">Blog Details</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <a class="theme-btn theme-btn-outlined_alt" href="loan.html">Get loan</a>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- Header end-->


    <main>
        <!-- BreadCrumb start -->
        <section class="breadcrumb-area">
            <div class="breadcrumb-widget  pt-200 pb-110" style="background-image: url(img/breadcrumb/bg-1.png);">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb-content pt-85">
                                <h1>Loan deatails</h1>
                                <ul>
                                    <li><a href="index.html">home</a></li>
                                    <li><a href="index.html">pages</a></li>
                                    <li>loan</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- BreadCrumb end -->

        <!-- Loan details start -->
        <section class="loan-deatils-area bg_disable pt-130 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="stepper-widget mt-sm-5 px-3 px-sm-0">
                            <ul>
                                <li class="active mt-0"><a href="loan-details.html">
                                        <div class="number"><i class="icon_check"></i> <span>1</span></div> Loan
                                        Details
                                    </a>
                                </li>
                                <li class=""><a href="personal-details.html">
                                        <div class="number"><i class="icon_check"></i> <span>2</span></div>
                                        Personal
                                        Details
                                    </a>
                                </li>
                                <li><a href="document-upload.html">
                                        <div class="number"><i class="icon_check"></i> <span>3</span></div>
                                        Documants
                                        Upload
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-9">
                        <div class="loan-details-widget bg_white">
                            <form action="personal-details.html">
                                <div class="row mb-35 gy-4">
                                    <div class="col-lg-3 col-md-6">
                                        <input class="select-loan-type-radio" name="select-loan-type" type="radio"
                                            id="Personal_loan">
                                        <label for="Personal_loan" class="loan-type">
                                            <img src="https://html-template.spider-themes.net/banca/banca-html/img/apply-loan/icon-4.1.png" alt="icon">
                                            <img src="https://html-template.spider-themes.net/banca/banca-html/img/apply-loan/icon-4.2.png" alt="icon">
                                            <span>Personal Loan</span>
                                        </label>

                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <input class="select-loan-type-radio" name="select-loan-type" type="radio"
                                            id="Home_loan">
                                        <label for="Home_loan" class="loan-type">
                                            <img src="https://html-template.spider-themes.net/banca/banca-html/img/apply-loan/icon-5.1.png" alt="icon">
                                            <img src="https://html-template.spider-themes.net/banca/banca-html/img/apply-loan/icon-5.2.png" alt="icon">
                                            <span>home Loan</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <input class="select-loan-type-radio" name="select-loan-type" type="radio"
                                            id="Buisness_loan">
                                        <label for="Buisness_loan" class="loan-type">
                                            <img src="https://html-template.spider-themes.net/banca/banca-html/img/apply-loan/icon-6.1.png" alt="icon">
                                            <img src="https://html-template.spider-themes.net/banca/banca-html/img/apply-loan/icon-6.2.png" alt="icon">
                                            <span>Buisness Loan</span>
                                        </label>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <input class="select-loan-type-radio" name="select-loan-type" type="radio"
                                            id="Car_loan">
                                        <label for="Car_loan" class="loan-type">
                                            <img src="https://html-template.spider-themes.net/banca/banca-html/img/apply-loan/icon-7.1.png" alt="icon">
                                            <img src="https://html-template.spider-themes.net/banca/banca-html/img/apply-loan/icon-7.2.png" alt="icon">
                                            <span>car Loan</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <label class="label" for="loandetails01">Choose your financing type</label>
                                        <select class="w-100" id="loandetails01">
                                            <option value="Debt-Financing">Debt Financing</option>
                                            <option value="Equity-Finance">Equity Finance</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="label" for="loandetails02">Choose your preferred bank service
                                        </label>
                                        <select class=" w-100" id="loandetails02">
                                            <option value="Individual-Banking">Individual Banking</option>
                                            <option value="Business-Banking">Business Banking</option>
                                            <option value="Digital-Banking">Digital Banking</option>
                                            <option value="Loans">Loans</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="label" for="loan-amount">Yout loan amount</label>
                                        <div class="input-field">
                                            <span>$</span>
                                            <input type="number" id="loan-amount" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="label mb-4">Laon duration</label>

                                        <div class="form-check form-check-inline mr-30">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="inlineRadio1" value="option1">
                                            <label class="form-check-label" for="inlineRadio1">12 months</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-30">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="inlineRadio2" value="option2">
                                            <label class="form-check-label" for="inlineRadio2">18 months</label>
                                        </div>

                                        <div class="form-check form-check-inline mr-30">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="inlineRadio3" value="option3">
                                            <label class="form-check-label" for="inlineRadio3">24 months</label>
                                        </div>

                                        <div class="form-check form-check-inline mr-30">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="inlineRadio4" value="option4">
                                            <label class="form-check-label" for="inlineRadio4">36 months</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-30">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="inlineRadio5" value="option5">
                                            <label class="form-check-label" for="inlineRadio5">48 months</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="row  mt-60">
                                    <div class="col-md-12">
                                        <div class="nav-btn d-flex justify-content-end">
                                            <button class=" theme-btn-primary_alt theme-btn next-btn"
                                                type="submit">next<i class="arrow_right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Loan details end -->
    </main>
    <!-- footer end -->

    <!-- Back to top button -->
    <a id="back-to-top" title="Back to Top"></a>

    <!-- JS here -->
    <script type="text/javascript" src="https://html-template.spider-themes.net/banca/banca-html/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://html-template.spider-themes.net/banca/banca-html/s/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://html-template.spider-themes.net/banca/banca-html/js/jquery.smoothscroll.min.js"></script>
    <script type="text/javascript" src="https://html-template.spider-themes.net/banca/banca-html/js/jquery.waypoints.min.js"></script>
    <script type="text/javascript" src="https://html-template.spider-themes.net/banca/banca-html/js/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="https://html-template.spider-themes.net/banca/banca-html/js/jquery.nice-select.min.js"></script>
    <script type="text/javascript" src="https://html-template.spider-themes.net/banca/banca-html/js/wow.min.js"></script>
    <script type="text/javascript" src="https://html-template.spider-themes.net/banca/banca-html/js/custom.js"></script>
@endsection
