@extends('layouts.userdashboard.app')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-xl-8">
                            <div class="page-title-content">
                                <h3>Funds Transfer</h3>
                                <br />
                                <h6 class="mb-2">Manx Capitale Privée Banque allows you to send money from your bank
                                    account to a recipient's bank account
                                    anywhere in the world. Please make sure
                                    that you have enough funds available in
                                    your account to transfer. Also don't forget to
                                    validate receivers account number.</h6>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="breadcrumbs"><a href="#">Funds Transfer </a><span><i class="ri-arrow-right-s-line"></i></span><a href="#">Profile</a></div>
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
                                    <h3 style="color:red"><b style="color:red" class="capitalize text-red-800">{{ $message }}</b></h3>
                                @endif
                            </div>
                            <div class="card-body">
                                <form method="post" name="myform" action="{{ route('Addtransfer') }}" class="personal_validate" novalidate="novalidate">
                                    @csrf
                                    <div class="row g-4">
                                        <div class="col-xxl-6 col-xl-6 col-lg-6">
                                            <label class="form-label">Receiver Bank's Name</label>
                                            <input type="text" class="form-control" placeholder="123, Central Square, Brooklyn" name="recepient_account_bank">
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-lg-6">
                                            <label class="form-label">Receiver Account Number</label>
                                            <input type="text" class="form-control" placeholder="21323132" name="recepient_account_number">
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-lg-6">
                                            <label class="form-label">Receiver Name</label>
                                            <input type="text" class="form-control" placeholder="John Fishers" name="recepient_name">
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-lg-6">
                                            <label class="form-label">Swift Code</label>
                                            <input type="text" class="form-control" placeholder="BCNP2312" name="recepient_swift">
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-lg-6">
                                            <label class="form-label">Country</label>
                                            <input type="text" name="country" class="form-control" placeholder="Germany" name="recepient_country">
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-lg-6">
                                            <label class="form-label">Amount to Transfer [ + Transfer Fee ($500) ] (Account )</label>
                                            <input type="number" class="form-control" placeholder="1000" name="transferamount">
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-lg-6">
                                            <label class="form-label">Receiver Address</label>
                                            <input type="text" class="form-control" placeholder="swiss" name="address">
                                        </div>
                                        <div class="col-xxl-6 col-xl-6 col-lg-6">
                                            <label class="form-label">Description / Remark</label>
                                            <input type="text" class="form-control" placeholder="to mike" name="description">
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary pl-5 pr-5">Send Money</button>
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
