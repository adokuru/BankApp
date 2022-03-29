@extends('layouts.userdashboard.app')
@section('main')
    <div class="container">

        <h2 class="fw-400 text-center mt-3 mb-4">Your Transfer is on it's way</h2>
        <div class="row">
            <div class="col-md-9 col-lg-7 col-xl-6 mx-auto">
                <div class="bg-white text-center shadow-sm rounded p-3 pt-sm-4 pb-sm-5 px-sm-5 mb-4">
                    <div class="my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="84" height="84" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                        </svg>
                        <br/> <br/>
                        <p class="text-success text-8 fw-500 lh-1">Success!</p>
                        <p class="lead">Transactions Complete</p>
                    </div>
                    <p class="text-3 mb-4">You've Succesfully sent <span class="text-4 fw-500">$1000</span> to <span class="fw-500">demo@gmail.com</span>, See transaction details under <a class="btn-link" href="#">Activity</a>.</p>
                    <div class="d-grid"><button class="btn btn-primary">Send Money Again</button></div>
                </div>
            </div>
        </div>
    </div>
@endsection
