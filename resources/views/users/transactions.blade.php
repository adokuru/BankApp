@extends('layouts.userdashboard.app')
@section('main')
    <div class="container">
        <div class="page-title">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-4">
                    <div class="page-title-content">
                        <h3>Transactions</h3>
                        <p class="mb-2">View your Manx Capitale Privée Banque Transactions</p>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="breadcrumbs"><a href="#">Home </a><span><i class="ri-arrow-right-s-line"></i></span><a href="#">Transactions</a></div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header flex-row">
                        <h4 class="card-title">Transactions </h4>
                    </div>
                    <div class="card-body">
                        <div class="Transactions-table">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Account Name</th>
                                            <th>Amount</th>
                                            <th>Transaction Type</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($transactions as $item)
                                            <tr>
                                                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                                <td>${{ $item->amount }}</td>
                                                <td><span class="badge px-3 py-2 bg-success">Successful</span></td>
                                                <td>{{ $item->created_at }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td>No Transactions</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                                {{ $transactions->links('pagination::simple-bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
