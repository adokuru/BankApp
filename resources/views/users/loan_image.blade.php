@extends('layouts.userdashboard.app')
@section('main')
    <div class="container">
        <div class="page-title">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-4">
                    <div class="page-title-content">
                        <h3>Loans</h3>
                        <p class="mb-2">Please Confirm Your Personal Information</p>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="breadcrumbs"><a href="#">Home </a><span><i class="ri-arrow-right-s-line"></i></span><a href="#">Loans</a></div>
                </div>
            </div>
        </div>
        <div class="row">
    <!-- CSS here -->
    <link rel="stylesheet" type="text/css" href="https://html-template.spider-themes.net/banca/banca-html/css/bootstrap.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/elegant-icons.min.css')}}" media="all" />
    <link rel="stylesheet" type="text/css" href="https://html-template.spider-themes.net/banca/banca-html/css/all.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="https://html-template.spider-themes.net/banca/banca-html/css/animate.css" media="all" />
    <link rel="stylesheet" type="text/css" href="https://html-template.spider-themes.net/banca/banca-html/css/nice-select.css" media="all" />
    <link rel="stylesheet" type="text/css" href="https://html-template.spider-themes.net/banca/banca-html/css/default.css" media="all" />
    <link rel="stylesheet" type="text/css" href="https://html-template.spider-themes.net/banca/banca-html/css/style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="https://html-template.spider-themes.net/banca/banca-html/css/responsive.css" media="all" />
    <link rel="stylesheet" type="text/css" href="https://html-template.spider-themes.net/banca/banca-html/css/intlTelInput.css" media="all">
    
<main>
<section class="loan-deatils-area  pt-140 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="stepper-widget mt-sm-5 px-3 px-sm-0">
                            <ul>
                                <li class=" complete  mt-0"><a href="#">
                                        <div class="number"><i class="icon_check"></i> <span>1</span></div> Loan
                                        Details
                                    </a>
                                </li>
                                <li class="complete"><a href="#">
                                        <div class="number"><i class="icon_check"></i> <span>2</span></div>
                                        Personal
                                        Details
                                    </a>
                                </li>
                                <li class=" active"><a href="#">
                                        <div class="number"><i class="icon_check"></i> <span>3</span></div>
                                        Documants
                                        Upload
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="loan-details-widget bg_white">
                            <form action="{{ route('loans.step3') }}" method="POST">
                              @csrf
                                <div class="row gy-4">
                                    <div class="col-12">
                                        <div class="doc-info">
                                            <span>1.</span>
                                            <p>Selfie Photo. Your Personal Photo. The photo must be done by yourself.
                                                The photo must show your face and your both shoulders. (Please attach
                                                file )</p>
                                        </div>
                                        <div class="doc-info mt-3">
                                            <span>2.</span>
                                            <p>ID Card. Valid Government ID Card. Front and Back side. Original ID Card.
                                                Full photo. All parts of the ID card must be shown. The four corners of
                                                the ID card must show on the photo. ID must be original and valid. ID
                                                card must be very clear. (Please attach file) *</p>
                                        </div>
                                    </div>
                                    <div class="col-12">

                                        <div id="dropzone" class="dropzone dz-clickable"><div class="dz-default dz-message"> <img src="https://html-template.spider-themes.net/banca/banca-html/img/apply-loan/upload.png" alt="upload"> <h4 class="dz-button" type="button">Drag and drop an image</h4><p class="dz-custom-upload-text">or to <span>Browse</span> choose a file <br> PNG,JPG,PDF</p></div></div>
                                    </div>
                                    <div class="col-12 mt-4">
                                        <div class="form-check form-check-inline">
                                            <input required class="form-check-input" type="checkbox" id="agreeBox">
                                            <label class="form-check-label" for="agreeBox">I hereby agree that the
                                                information given is true, accurate and complete as of the date of this
                                                application submission. **</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-md-12">
                                        <div class="nav-btn d-flex flex-wrap justify-content-between">
                                            <button type="submit" class="theme-btn-primary_alt theme-btn">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</main>
    <!-- JS here -->
    <script type="text/javascript" src="https://html-template.spider-themes.net/banca/banca-html/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://html-template.spider-themes.net/banca/banca-html/s/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://html-template.spider-themes.net/banca/banca-html/js/jquery.smoothscroll.min.js"></script>
    <script type="text/javascript" src="https://html-template.spider-themes.net/banca/banca-html/js/jquery.waypoints.min.js"></script>
    <script type="text/javascript" src="https://html-template.spider-themes.net/banca/banca-html/js/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="https://html-template.spider-themes.net/banca/banca-html/js/jquery.nice-select.min.js"></script>
    <script type="text/javascript" src="https://html-template.spider-themes.net/banca/banca-html/js/wow.min.js"></script>
    <script type="text/javascript" src="https://html-template.spider-themes.net/banca/banca-html/js/dropzone.min.js"></script>
    <script type="text/javascript" src="https://html-template.spider-themes.net/banca/banca-html/js/wow.min.js"></script>
    <script type="text/javascript" src="https://html-template.spider-themes.net/banca/banca-html/js/custom.js"></script>
    <script class="iti-load-utils" async="" src="https://html-template.spider-themes.net/banca/banca-html/js/utils.js"></script>
</div>
@endsection
