@extends('layouts.userdashboard.app')
@section('main')
    <div class="container">
        <div class="page-title">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-4">
                    <div class="page-title-content">
                        <h3>Funds Transfer</h3>
                        <p class="mb-2">View your Manx Capitale Privée Banque Funds Transfer</p>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="breadcrumbs"><a href="#">Home </a><span><i class="ri-arrow-right-s-line"></i></span><a href="#">Funds Transfer</a></div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header flex-row">
                        <h4 class="card-title">Funds Transfer</h4>
                        <a class="btn btn-primary" href="{{route('Account_transfers_new')}}"></i></span>Funds Transfer</a>
                    </div>
                    <div class="card-body">
                        <div class="FundTransfer-table">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Account Name</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Date Transfer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($moneyTransfer as $item)
                                            <tr>
                                                <td>{{$user->first_name}} {{$user->last_name}}</td>
                                                <td>${{ number_format($item->amount, 2, '.', ',') }}</td>
                                                <td>{{$item->status}}</td>
                                                <td>{{$item->created_at}}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td>No Fund Transfer</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
