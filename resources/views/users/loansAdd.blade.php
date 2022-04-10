@extends('layouts.userdashboard.app')
@section('main')
    <div class="container">
        <div class="page-title">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-4">
                    <div class="page-title-content">
                        <h3>Loans Request</h3>
                        <p class="mb-2">View your Manx Capitale Privée Banque Loans</p>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="breadcrumbs"><a href="#">Home </a><span><i class="ri-arrow-right-s-line"></i></span><a href="#">Loans Request</a></div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header flex-row">
                        <h4 class="card-title">Loans Request</h4>
                    </div>
                    <div class="card-body">
                        {{-- Not Eligble message --}}
                        <div class="">
                            <h4>Sorry <b>Not eligblie</b> for loans, contact us for more enquiry on your loan eligibility <a href="mailto:contact@manx-capitalebanque.com">contact@manx-capitalebanque.com</a></h4>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
