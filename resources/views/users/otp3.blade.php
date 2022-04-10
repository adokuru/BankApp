@extends('layouts.userdashboard.app')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-xl-8">
                            <div class="page-title-content">
                                <h3>Tax Code</h3>
                                <br />
                                <h6 class="mb-2">Please provide your offshore Tax
                                    Identification Number as obtained from
                                    the Revenue Department for fund
                                    transfer authorization.
                                    <br/>
                                    This is usually in the form of a number
                                    with a letter prefix, though other non-
                                    standard' codes are also used.
                                    Ensure the recipient's account
                                    information is correct before validating
                                    the TAX code</h6>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="breadcrumbs"><a href="#">Tax Code</a><span><i class="ri-arrow-right-s-line"></i></span><a href="#">Funds Transfer</a></div>
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
                                <form method="post" action="{{ route('transferOTP3') }}" name="myform" class="personal_validate" novalidate="novalidate">
                                    @csrf <div class="row g-4">
                                        <div class="col-xxl-12 col-xl-12 col-lg-12">
                                            <label class="form-label">Code</label>
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
@endsection
