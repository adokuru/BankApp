@extends('layouts.userdashboard.app')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-xl-4">
                            <div class="page-title-content">
                                <h3>Activity</h3>
                                <p class="mb-2">Welcome Intez Activity page</p>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="breadcrumbs"><a href="#">Settings </a><span><i class="ri-arrow-right-s-line"></i></span><a href="#">Activity</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-12">
                <div class="settings-menu">
                    <a href="{{ route('Account_profile') }}">Profile</a>
                    <a href="{{ route('Account_security') }}">Security</a>
                    <a href="{{ route('Account_activity') }}">Activity</a>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Browser Sessions</h4>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <span class="me-3 icon-circle bg-warning text-white"><i class="ri-question-answer-line"></i></span>
                                    <div>
                                        <h5 class="mb-0">If necessary, you may log out of all of your other browser sessions across all of your devices.
                                        </h5>
                                        <p>Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.
                                        </p>
                                        <a class="btn btn-primary">LOG OUT OTHER BROWSER SESSIONS</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Web Sessions
                                </h4>
                                <small>These sessions are currently signed in to your account.</small>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Confirmed</th>
                                                <th>Browser</th>
                                                <th>IP Address</th>
                                                <th>Current</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($sessions) > 0)
                                                @foreach ($sessions as $session)
                                                    <tr>
                                                        <td>{{ $session->last_active }}</td>
                                                        <td> {{ $session->agent->platform() ? $session->agent->platform() : 'Unknown' }} - {{ $session->agent->browser() ? $session->agent->browser() : 'Unknown' }}</td>
                                                        <td>{{ $session->ip_address }}</td>
                                                        <td>
                                                            @if ($session->is_current_device)
                                                                <span><i class="ri-check-line text-success me-1"></i></span>
                                                            @else
                                                                <span><i class="ri-close-line text-danger"></i></span>
                                                            @endif

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="4">No data found</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="card transparent">
                            <div class="card-header">
                                <h4 class="card-title">Close Account</h4>
                            </div>
                            <div class="card-body">
                                <p>Withdraw funds and close your snuff account - <span class="text-danger">this
                                        cannot be undone</span></p>
                                <a href="#" class="btn btn-danger">Close Account</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
