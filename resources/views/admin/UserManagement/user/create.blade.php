@extends('layouts.admin-app')

@section('title', 'User Management | Manage Roles')

@section('vendor-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/material-vendors.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/icheck/icheck.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/icheck/custom.css')}}">
@endsection

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/material-vertical-menu-modern.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/checkboxes-radios.css')}}">
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">Manage Users</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a>
                    </li>
                    @if(auth::user()->can('View_User'))
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Users</a>
                    </li>
                    @endif
                    <li class="breadcrumb-item active">Create
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right text-md-right col-md-6 col-12">
        @if(auth::user()->can('View_User'))
        <div class="btn-group">
            <a href="{{ route('user.index') }}" class="btn btn-round btn-success" type="button"><i class="material-icons">view_list</i> View All</a>
        </div>
        @endif
    </div>
</div>
<div class="content-wrapper">
    <div class="content-body">
        <section id="configuration">
            <div class="row">
                <div class="col-12">
                    @foreach($errors->all() as $error)
                    <li class="alert alert-danger">{{ $error }}</li>
                    @endforeach
                    <div class="card">
                        <div class="card-header">
                        <h4 class="card-title">Create User</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <form action="{{ route('user.store') }}" method="post" class="form">
                                    @csrf
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-block">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Name">Name</label>
                                                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Email">Email</label>
                                                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Phone Number">Phone Number</label>
                                                            <input type="text" name="phone_number" placeholder="Phone Number" class="form-control" value="{{ old('phone_number') }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Password">Password</label>
                                                            <input type="password" name="password" placeholder="Password" class="form-control" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="ConfirmPassword">Confirm Password</label>
                                                            <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary btn-glow mt-2">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h4>Assign Roles | Please Choose at least one Role</h4>
                                            <hr>
                                            <div class="card-block">
                                                <div class="input-group skin skin-square">
                                                    @foreach($roles as $role)
                                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                                        <fieldset>
                                                            <input type="checkbox" name="roles[]" value="{{ $role->name }}"/>
                                                            <label for="role">{{ $role->name }}</label>
                                                        </fieldset>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('app-assets/vendors/js/forms/icheck/icheck.min.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/pages/material-app.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/forms/checkbox-radio.js') }}"></script>
@endsection
