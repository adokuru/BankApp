@extends('layouts.userdashboard.app')
@section('main')

<div class="container">
    <div class="page-title">
       <div class="row align-items-center justify-content-between">
          <div class="col-xl-4">
             <div class="page-title-content">
                <h3>Account</h3>
                <p class="mb-2">Welcome Snuff Account</p>
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
       <div class="col-xxl-6 col-xl-6 col-lg-6">
          <div class="card">
             <div class="card-header">
                <h4 class="card-title">Balance Details</h4>
                <a href="#">Transfer</a>
             </div>
             <div class="card-body">
                <div class="row">
                   <div class="col-12">
                      <div class="total-balance">
                         <p>Total Balance</p>
                         <h2>${{number_format($account->balance, 2)}}</h2>
                      </div>
                   </div>
                   <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <div class="balance-stats active">
                         <p>Last Month</p>
                         <h3>${{number_format($account->balance, 2)}}</h3>
                      </div>
                   </div>
                   <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <div class="balance-stats">
                         <p>Debit</p>
                         <h3>${{number_format($account->balance, 2)}}</h3>
                      </div>
                   </div>
                   <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <div class="balance-stats">
                         <p>Credit</p>
                         <h3>${{number_format($account->balance, 2)}}</h3>
                      </div>
                   </div>
                   <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <div class="balance-stats">
                        <p>Depoist</p>
                        <a>click here</a>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <div class="col-xxl-6 col-xl-6 col-lg-6">
          <div class="card">
             <div class="card-header">
                <h4 class="card-title">Transactions</h4>
                <a href="#">See More</a>
             </div>
             <div class="card-body">
                <div class="bills-widget">
                   <div class="bills-widget-content d-flex justify-content-between align-items-center active">
                      <div>
                         <p>Netflix</p>
                         <h4>$17.00</h4>
                      </div>
                   </div>
                   <div class="bills-widget-content d-flex justify-content-between align-items-center">
                      <div>
                         <p class="text-danger">Spotify</p>
                         <h4>$11.00</h4>
                      </div>
                   </div>
                   <div class="bills-widget-content d-flex justify-content-between align-items-center">
                      <div>
                         <p class="text-danger">Youtube</p>
                         <h4>$11.00</h4>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
     
    </div>
 </div>
@endsection