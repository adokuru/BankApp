@extends('layouts.userdashboard.app')
@section('main')
    <div class="container">
        <div class="page-title">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-4">
                    <div class="page-title-content">
                        <h3>Deposit</h3>
                        <p class="mb-2">View your Manx Capitale Privée Banque Deposit</p>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="breadcrumbs"><a href="#">Home </a><span><i class="ri-arrow-right-s-line"></i></span><a href="#">Deposit</a></div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header flex-row">
                        <h4 class="card-title">Deposit </h4>
                    </div>
                    <div class="card-body">
                        <div class="Deposit-table">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Account Name</th>
                                            <th>Account Number</th>
                                            <th>Transaction Reference</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($deposit as $item)
                                            <tr>
                                                <td>{{$user->first_name}} {{$user->last_name}}</td>
                                                <td>{{$user->account->account_number}}</td>
                                                <td>{{$item->transaction_reference}}</td>
                                                <td>${{ number_format($item->amount, 2, '.', ',') }}</td>
                                                <td>{{$item->created_at->format('M d Y')}}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td>No Deposit</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                    {{-- page links --}}
                                    {{$deposit->links("pagination::simple-bootstrap-5")}}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
