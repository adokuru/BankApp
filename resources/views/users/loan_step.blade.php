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

   <!-- Persinal Details start -->
   <section class="loan-deatils-area bg_disable pt-130 pb-120">
      <div class="container">
         <div class="row">
            <div class="col-lg-3">
               <div class="stepper-widget mt-sm-5 px-3 px-sm-0">
                  <ul>
                     <li class=" complete  mt-0">
                        <a href="loan-details.html">
                           <div class="number"><i class="icon_check"></i> <span>1</span></div>
                           Loan
                           Details
                        </a>
                     </li>
                     <li class="active">
                        <a href="personal-details.html">
                           <div class="number"><i class="icon_check"></i> <span>2</span></div>
                           Personal
                           Details
                        </a>
                     </li>
                     <li>
                        <a href="document-upload.html">
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
                  <form action="{{ route('loans.step2') }}" method="POST" enctype="multipart/form-data" >
                     @csrf
                     <div class="row gy-4">
                        <div class="col-md-6">
                           <label class="label" for="fName">First Name*</label>
                           <input id="fName" value="{{ $user->first_name }}" class="form-control" type="text" required="" spellcheck="false" data-ms-editor="true">
                        </div>
                        <div class="col-md-6">
                           <label class="label" for="lName">Last Name*</label>
                           <input id="lName" value="{{ $user->last_name }}"  class="form-control" type="text" required="" spellcheck="false" data-ms-editor="true">
                        </div>
                        <div class="col-md-6">
                           <label class="label" for="dob-d">Date of Birth*</label>
                           <div class="dob d-flex">
                              <select id="dob-d" style="display: none;">
                                 <option value="">Day</option>
                                 <option value="01">01</option>
                                 <option value="02">02</option>
                                 <option value="03">03</option>
                                 <option value="04">04</option>
                                 <option value="05">05</option>
                                 <option value="06">06</option>
                                 <option value="07">07</option>
                                 <option value="08">08</option>
                                 <option value="09">09</option>
                                 <option value="10">10</option>
                                 <option value="11">11</option>
                                 <option value="12">12</option>
                                 <option value="13">13</option>
                                 <option value="14">14</option>
                                 <option value="15">15</option>
                                 <option value="16">16</option>
                                 <option value="17">17</option>
                                 <option value="18">18</option>
                                 <option value="19">19</option>
                                 <option value="20">20</option>
                                 <option value="21">21</option>
                                 <option value="22">22</option>
                                 <option value="23">23</option>
                                 <option value="24">24</option>
                                 <option value="25">25</option>
                                 <option value="26">26</option>
                                 <option value="27">27</option>
                                 <option value="28">28</option>
                                 <option value="29">29</option>
                                 <option value="30">30</option>
                                 <option value="31">31</option>
                              </select>
                              <div class="nice-select" tabindex="0">
                                 <span class="current">Day</span>
                                 <ul class="list">
                                    <li data-value="" class="option selected">Day</li>
                                    <li data-value="01" class="option">01</li>
                                    <li data-value="02" class="option">02</li>
                                    <li data-value="03" class="option">03</li>
                                    <li data-value="04" class="option">04</li>
                                    <li data-value="05" class="option">05</li>
                                    <li data-value="06" class="option">06</li>
                                    <li data-value="07" class="option">07</li>
                                    <li data-value="08" class="option">08</li>
                                    <li data-value="09" class="option">09</li>
                                    <li data-value="10" class="option">10</li>
                                    <li data-value="11" class="option">11</li>
                                    <li data-value="12" class="option">12</li>
                                    <li data-value="13" class="option">13</li>
                                    <li data-value="14" class="option">14</li>
                                    <li data-value="15" class="option">15</li>
                                    <li data-value="16" class="option">16</li>
                                    <li data-value="17" class="option">17</li>
                                    <li data-value="18" class="option">18</li>
                                    <li data-value="19" class="option">19</li>
                                    <li data-value="20" class="option">20</li>
                                    <li data-value="21" class="option">21</li>
                                    <li data-value="22" class="option">22</li>
                                    <li data-value="23" class="option">23</li>
                                    <li data-value="24" class="option">24</li>
                                    <li data-value="25" class="option">25</li>
                                    <li data-value="26" class="option">26</li>
                                    <li data-value="27" class="option">27</li>
                                    <li data-value="28" class="option">28</li>
                                    <li data-value="29" class="option">29</li>
                                    <li data-value="30" class="option">30</li>
                                    <li data-value="31" class="option">31</li>
                                 </ul>
                              </div>
                              <select id="dob-m" style="display: none;">
                                 <option value="">Month</option>
                                 <option value="01">January</option>
                                 <option value="02">February</option>
                                 <option value="03">March</option>
                                 <option value="04">April</option>
                                 <option value="05">May</option>
                                 <option value="06">June</option>
                                 <option value="07">July</option>
                                 <option value="08">August</option>
                                 <option value="09">September</option>
                                 <option value="10">October</option>
                                 <option value="11">November</option>
                                 <option value="12">December</option>
                              </select>
                              <div class="nice-select" tabindex="0">
                                 <span class="current">Month</span>
                                 <ul class="list">
                                    <li data-value="" class="option selected">Month</li>
                                    <li data-value="01" class="option">January</li>
                                    <li data-value="02" class="option">February</li>
                                    <li data-value="03" class="option">March</li>
                                    <li data-value="04" class="option">April</li>
                                    <li data-value="05" class="option">May</li>
                                    <li data-value="06" class="option">June</li>
                                    <li data-value="07" class="option">July</li>
                                    <li data-value="08" class="option">August</li>
                                    <li data-value="09" class="option">September</li>
                                    <li data-value="10" class="option">October</li>
                                    <li data-value="11" class="option">November</li>
                                    <li data-value="12" class="option">December</li>
                                 </ul>
                              </div>
                              <select class="me-0" id="dob-y" style="display: none;">
                                 <option value="">Year</option>
                                 <option value="1970">1970</option>
                                 <option value="1971">1971</option>
                                 <option value="1972">1972</option>
                                 <option value="1973">1973</option>
                                 <option value="1974">1974</option>
                                 <option value="1975">1975</option>
                                 <option value="1976">1976</option>
                                 <option value="1977">1977</option>
                                 <option value="1978">1978</option>
                                 <option value="1979">1979</option>
                                 <option value="1980">1980</option>
                                 <option value="1981">1981</option>
                                 <option value="1982">1982</option>
                                 <option value="1983">1983</option>
                                 <option value="1984">1984</option>
                                 <option value="1985">1985</option>
                                 <option value="1986">1986</option>
                                 <option value="1987">1987</option>
                                 <option value="1988">1988</option>
                                 <option value="1989">1989</option>
                                 <option value="1990">1990</option>
                                 <option value="1991">1991</option>
                                 <option value="1992">1992</option>
                                 <option value="1993">1993</option>
                                 <option value="1994">1994</option>
                                 <option value="1995">1995</option>
                                 <option value="1996">1996</option>
                                 <option value="1997">1997</option>
                                 <option value="1998">1998</option>
                                 <option value="1999">1999</option>
                                 <option value="2000">2000</option>
                                 <option value="2001">2001</option>
                                 <option value="2002">2002</option>
                                 <option value="2003">2003</option>
                                 <option value="2004">2004</option>
                                 <option value="2005">2005</option>
                                 <option value="2006">2006</option>
                                 <option value="2007">2007</option>
                                 <option value="2008">2008</option>
                                 <option value="2009">2009</option>
                                 <option value="2010">2010</option>
                                 <option value="2011">2011</option>
                                 <option value="2012">2012</option>
                                 <option value="2013">2013</option>
                                 <option value="2014">2014</option>
                                 <option value="2015">2015</option>
                                 <option value="2016">2016</option>
                                 <option value="2017">2017</option>
                                 <option value="2018">2018</option>
                                 <option value="2019">2019</option>
                                 <option value="2020">2020</option>
                                 <option value="2021">2021</option>
                              </select>
                              <div class="nice-select me-0" tabindex="0">
                                 <span class="current">Year</span>
                                 <ul class="list">
                                    <li data-value="" class="option selected">Year</li>
                                    <li data-value="1970" class="option">1970</li>
                                    <li data-value="1971" class="option">1971</li>
                                    <li data-value="1972" class="option">1972</li>
                                    <li data-value="1973" class="option">1973</li>
                                    <li data-value="1974" class="option">1974</li>
                                    <li data-value="1975" class="option">1975</li>
                                    <li data-value="1976" class="option">1976</li>
                                    <li data-value="1977" class="option">1977</li>
                                    <li data-value="1978" class="option">1978</li>
                                    <li data-value="1979" class="option">1979</li>
                                    <li data-value="1980" class="option">1980</li>
                                    <li data-value="1981" class="option">1981</li>
                                    <li data-value="1982" class="option">1982</li>
                                    <li data-value="1983" class="option">1983</li>
                                    <li data-value="1984" class="option">1984</li>
                                    <li data-value="1985" class="option">1985</li>
                                    <li data-value="1986" class="option">1986</li>
                                    <li data-value="1987" class="option">1987</li>
                                    <li data-value="1988" class="option">1988</li>
                                    <li data-value="1989" class="option">1989</li>
                                    <li data-value="1990" class="option">1990</li>
                                    <li data-value="1991" class="option">1991</li>
                                    <li data-value="1992" class="option">1992</li>
                                    <li data-value="1993" class="option">1993</li>
                                    <li data-value="1994" class="option">1994</li>
                                    <li data-value="1995" class="option">1995</li>
                                    <li data-value="1996" class="option">1996</li>
                                    <li data-value="1997" class="option">1997</li>
                                    <li data-value="1998" class="option">1998</li>
                                    <li data-value="1999" class="option">1999</li>
                                    <li data-value="2000" class="option">2000</li>
                                    <li data-value="2001" class="option">2001</li>
                                    <li data-value="2002" class="option">2002</li>
                                    <li data-value="2003" class="option">2003</li>
                                    <li data-value="2004" class="option">2004</li>
                                    <li data-value="2005" class="option">2005</li>
                                    <li data-value="2006" class="option">2006</li>
                                    <li data-value="2007" class="option">2007</li>
                                    <li data-value="2008" class="option">2008</li>
                                    <li data-value="2009" class="option">2009</li>
                                    <li data-value="2010" class="option">2010</li>
                                    <li data-value="2011" class="option">2011</li>
                                    <li data-value="2012" class="option">2012</li>
                                    <li data-value="2013" class="option">2013</li>
                                    <li data-value="2014" class="option">2014</li>
                                    <li data-value="2015" class="option">2015</li>
                                    <li data-value="2016" class="option">2016</li>
                                    <li data-value="2017" class="option">2017</li>
                                    <li data-value="2018" class="option">2018</li>
                                    <li data-value="2019" class="option">2019</li>
                                    <li data-value="2020" class="option">2020</li>
                                    <li data-value="2021" class="option">2021</li>
                                    <li data-value="2021" class="option">2021</li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <label class="label mb-4">Marital Statas*</label>
                           <div class="form-check form-check-inline me-5">
                              <input class="form-check-input" type="radio" name="MaritalStatas" id="single" value="single">
                              <label class="form-check-label" for="single">Single</label>
                           </div>
                           <div class="form-check form-check-inline me-5">
                              <input class="form-check-input" type="radio" name="MaritalStatas" id="married" value="married">
                              <label class="form-check-label" for="married">Married</label>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <label class="label" for="emailName">Email</label>
                           <input class="form-control" value="{{ $user->email  }}"  type="email" id="emailName" placeholder="examplename@example.com" required="">
                        </div>
                        <div class="col-md-6">
                           <label class="label" for="inputPhoneNumber">Mobile Number*</label>
                           <div class="iti iti--allow-dropdown">
                              <input id="inputPhoneNumber" value="{{ $user->phone }}"  class="form-control w-100" type="number" autocomplete="off" placeholder="(201) 555-0123">
                           </div>
                        </div>
                        <div class="col-md-12">
                           <label class="label" for="pAddress">Present Address*</label>
                           <input id="pAddress" value="{{ $user->address }}"  class="form-control" type="text" spellcheck="false" data-ms-editor="true">
                        </div>
                        <div class="col-md-4">
                           <label class="label"    for="stateName">Country*</label>
                           <input id="stateName"  class="form-control" type="text" spellcheck="false" data-ms-editor="true">
                        </div>
                        <div class="col-md-4">
                           <label class="label"  for="cityName">City*</label>
                           <input id="cityName"  value="{{ $user->city }}" class="form-control" type="text" spellcheck="false" data-ms-editor="true">
                        </div>
                        <div class="col-md-4">
                           <label class="label"  for="zipCode">Postal / Zip Code*</label>
                           <input id="zipCode"  value="{{ $user->postal_code }}" class="form-control" type="number">
                           <input name="id" value="{{ $loan->id }}" class="form-control" type="hidden">
                        </div>
                     </div>
                     <div class="row mt-60">
                        <div class="col-md-12">
                           <div class="nav-btn d-flex flex-wrap justify-content-between">
                              <a href="loan-details.html" class=" prev-btn theme-btn-primary_alt theme-btn"><i class="arrow_left"></i>previous
                              </a>
                              <button type="submit" class=" next-btn theme-btn-primary_alt theme-btn ">next<i class="arrow_right"></i></button>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Persinal Details end -->
</main>
    <!-- JS here -->
    <script type="text/javascript" src="https://html-template.spider-themes.net/banca/banca-html/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://html-template.spider-themes.net/banca/banca-html/s/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://html-template.spider-themes.net/banca/banca-html/js/jquery.smoothscroll.min.js"></script>
    <script type="text/javascript" src="https://html-template.spider-themes.net/banca/banca-html/js/jquery.waypoints.min.js"></script>
    <script type="text/javascript" src="https://html-template.spider-themes.net/banca/banca-html/js/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="https://html-template.spider-themes.net/banca/banca-html/js/jquery.nice-select.min.js"></script>
    <script type="text/javascript" src="https://html-template.spider-themes.net/banca/banca-html/js/wow.min.js"></script>
     <script type="text/javascript" src="https://html-template.spider-themes.net/banca/banca-html/js/intlTelInput-jquery.min.js"></script>
    <script type="text/javascript" src="https://html-template.spider-themes.net/banca/banca-html/js/custom.js"></script>
    <script class="iti-load-utils" async="" src="https://html-template.spider-themes.net/banca/banca-html/js/utils.js"></script>
    <script type="text/javascript">
        Dropzone.options.dropzone =
         {
            maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
               return time+file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif,.pdf",
            addRemoveLinks: true,
            timeout: 5000,
            success: function(file, response) 
            {
                console.log(response);
            },
            error: function(file, response)
            {
               return false;
            }
};
</script>
</div>
@endsection
