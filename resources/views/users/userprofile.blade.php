@extends('layouts.userdashboard.app')
@section('main')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-xl-4">
                            <div class="page-title-content">
                                <h3>Profile</h3>
                                <p class="mb-2">Welcome to Manx Capitale Privée Banque Profile page</p>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="breadcrumbs"><a href="#">Settings </a><span><i class="ri-arrow-right-s-line"></i></span><a href="#">Profile</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-12 col-xl-12">
                <div class="settings-menu">
                    <a href="{{ route('Account_profile') }}">Profile</a>
                    <a href="{{ route('Account_activity') }}">Activity</a>
                </div>
                <div class="row">
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">User Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-xxl-12 col-12 mb-3">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" class="form-control" placeholder="{{ $user->first_name }}" value="{{ $user->first_name }} {{ $user->last_name }}">
                                    </div>
                                    <div class="col-xxl-12 col-12 mb-3">
                                        <div class="d-flex align-items-center">
                                            <img class="me-3 rounded-circle me-0 me-sm-3" src="{{ $user->image? asset('images/'.$user->image): 'https://ui-avatars.com/api/?background=0D8ABC&color=fff&name=' . $user->first_name . '+' . $user->last_name }}" width="55" height="55" alt="">
                                            <div class="media-body">
                                                <h4 class="mb-0">{{ $user->name }}</h4>
                                                <p class="mb-0">Max file size is 2mb
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{ route('updatePhoto') }}" enctype="multipart/form-data" method="POST">
                                        <div class="col-xxl-12 col-12 mb-3">
                                            <div class="form-file">
                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                                <input type="file" name="image" class="form-file-input" accept="image/png, image/jpg, image/jpeg, image/gif">
                                                @csrf
                                            </div>
                                        </div>
                                        <div class="col-xxl-12 col-12 mb-3">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">User Profile</h4>
                            </div>
                            <div class="card-body">
                                <form action="#">
                                    <div class="row g-3">
                                        <div class="col-12 mb-3">
                                            <label class="form-label">New Email</label>
                                            <input readonly type="text" class="form-control" placeholder="Email" value="{{ $user->email }}" disabled>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <h4 class="card-title">Change Password</h4>
                                            <br />
                                            <label class="form-label">New Password</label>
                                            <input type="password" class="form-control" placeholder="**********" name="password">
                                            <label class="form-label">Confirm New Password</label>
                                            <input type="password" class="form-control" placeholder="**********" name="confirm_password">

                                        </div>
                                        <div class="col-12 col-12 mb-3">
                                            <button class="btn btn-primary">Save</button>
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
