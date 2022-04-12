@extends('layouts.userdashboard.app')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-xl-8">
                            <div class="page-title-content">
                                <h3>Email OTP Challenge</h3>
                                <br />
                                <h6 class="mb-2">
                                    When conducting a
                                    transaction, you will be required to input
                                    a 4-digit OTP in the field below to validate and conclude the transaction.
                                    This code has been generated and sent
                                    to your email. This code expires after
                                    10 minutes, Check your email now and input
                                    the code to complete your transaction.
                                    The token code has been sent to your
                                    <b>Email : {{$user->email}}</b>
                                    You have <span style="color: blue" id="counter"></span> minutes remaining to
                                    insert valid OTP code.
                                </h6>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="breadcrumbs"><a href="#">Email OTP Challenge</a><span><i class="ri-arrow-right-s-line"></i></span><a href="#">Funds Transfer</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-12 col-xl-12">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                @if ($message = Session::get('error'))
                                    <h3><b class="capitalize">Error!</b> {{ $message }}</h3>
                                @endif
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('emailotp') }}" name="myform" class="personal_validate" novalidate="novalidate">
                                    @csrf
                                    <div class="row g-4">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12">
                                            <label class="form-label">Email OTP</label>
                                            <input type="text" class="form-control" placeholder="1234" name="otp">
                                            <input value="{{ $moneyTransfer->id }}" type="hidden" class="form-control" placeholder="1234" name="moneyTransfer_id">
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary pl-5 pr-5">Validate</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        // Set the date we're counting down to 10 minutes from now
        var countDownDate = new Date().getTime() + 600000;
        
        // Update the count down every 1 second
        var x = setInterval(function() {
        
          // Get today's date and time
          var now = new Date().getTime();
        
          // Find the distance between now and the count down date
          var distance = countDownDate - now;
        
          // Time calculations for days, hours, minutes and seconds
        
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
          // Display the result in the element with id="demo"
          document.getElementById("counter").innerHTML = minutes + "m " + seconds + "s ";
        
          // If the count down is finished, write some text
          if (distance < 0) {
            clearInterval(x);
            document.getElementById("counter").innerHTML = "EXPIRED";
            window.location.href = "{{ route('fundstransfer') }}";
          }
        }, 1000);
        </script>
@endsection
