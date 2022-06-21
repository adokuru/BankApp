@extends('layouts.userdashboard.app')
@section('main')
    <!-- CSS here -->
    <link rel="stylesheet" type="text/css" href="https://html-template.spider-themes.net/banca/banca-html/css/bootstrap.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="https://html-template.spider-themes.net/banca/banca-html/css/elegant-icons.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="https://html-template.spider-themes.net/banca/banca-html/css/all.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="https://html-template.spider-themes.net/banca/banca-html/css/animate.css" media="all" />
    <link rel="stylesheet" type="text/css" href="https://html-template.spider-themes.net/banca/banca-html/css/nice-select.css" media="all" />
    <link rel="stylesheet" type="text/css" href="https://html-template.spider-themes.net/banca/banca-html/css/default.css" media="all" />
    <link rel="stylesheet" type="text/css" href="https://html-template.spider-themes.net/banca/banca-html/css/style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="https://html-template.spider-themes.net/banca/banca-html/css/responsive.css" media="all" />


    <main>
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
