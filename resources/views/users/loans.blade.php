@extends('layouts.userdashboard.app')
@section('main')
    <div class="container">
        <div class="page-title">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-4">
                    <div class="page-title-content">
                        <h3>Loans</h3>
                        <p class="mb-2">View your Manx Capitale Privée Banque Loans</p>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="breadcrumbs"><a href="#">Home </a><span><i class="ri-arrow-right-s-line"></i></span><a href="#">Loans</a></div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header flex-row">
                        <h4 class="card-title">Loans</h4>
                        <a href="{{route('Account_loans_add')}}" class="btn btn-primary" href="#"></i></span>Request Loans</a>
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
                                            <th>Date initiated</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @forelse ($loans as $item)
                                            <tr>
                                                <td>{{$user->first_name}} {{$user->last_name}}</td>
                                                <td>${{ number_format($item['loan-amount'], 2, '.', ',') }}</td>
                                                <td>{{$item->status == 0 ? 'Pending' : 'Awaiting Approval'}}</td>
                                                <td>{{$item->created_at}}</td>
                                                <td>@if($item->status == 2)
                                                    <a href="{{ route('loan.single', $item->id) }}" class="btn btn-primary pl-5 pr-5">View</a>
                                                    @else
                                                    <button class="btn btn-primary pl-5 pr-5">No Action</button>
                                                    @endif    
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td>No Fund Transfer</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                   {{ $loans->links('pagination::simple-bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
