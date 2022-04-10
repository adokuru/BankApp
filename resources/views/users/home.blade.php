@extends('layouts.userdashboard.app')
@section('main')
    <div class="container">
        <div class="page-title">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-4">
                    <div class="page-title-content">
                        <h3>Account</h3>
                        <p class="mb-2">Welcome back {{$account->user->first_name}} {{$account->user->last_name}}</p>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="breadcrumbs">
                        <a href="#">
                            Account
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xxl-12 col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Balance Details</h4>
                        <a href="{{route('Account_transfers')}}">Transfer</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="total-balance">
                                    <p>Total Balance</p>
                                    <h2>${{ number_format($account->balance, 2) }}</h2>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <div class="balance-stats">
                                    <p>Debit</p>
                                    <h3>${{ number_format($account->totaldebits(), 2) }}</h3>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <div class="balance-stats">
                                    <p>Credit</p>
                                    <h3>${{ number_format($account->totaldeposit(), 2) }}</h3>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Credits</h4>
                        <a href="{{route('Account_deposit')}}">See More</a>
                    </div>
                    <div class="card-body">
                        <div class="bills-widget">
                            @forelse ($credits as $item)
                                <div class="bills-widget-content d-flex justify-content-between align-items-center active">
                                    <div>
                                        <p>Credits</p>
                                        <h4>${{ number_format($item->amount, 2, '.', ',') }}</h4>
                                    </div>
                                </div>
                            @empty
                                <div class="bills-widget-content d-flex justify-content-between align-items-center active">
                                    <div>
                                        <p>No Credits</p>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Debits</h4>
                        <a href="{{route('account.debits')}}">See More</a>
                    </div>
                    <div class="card-body">
                        <div class="bills-widget">
                            @forelse ($transactions as $item)
                                <div class="bills-widget-content d-flex justify-content-between align-items-center active">
                                    <div>
                                        <p>Debit</p>
                                        <h4>-${{ number_format($item->amount, 2, '.', ',') }}</h4>
                                    </div>
                                </div>
                            @empty
                                <div class="bills-widget-content d-flex justify-content-between align-items-center active">
                                    <div>
                                        <p>No Debits</p>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
