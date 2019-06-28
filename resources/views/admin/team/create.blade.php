@extends('layouts.admin-app')

@section('title', 'Manage Teams')

@section('vendor-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/material-vendors.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/ui/prism.min.css')}}">
@endsection

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/material-vertical-menu-modern.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/file-uploaders/dropzone.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/dropzone.css')}}">
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">Manage Teams</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a>
                    </li>
                    @if(auth::user()->can('View_Team'))
                    <li class="breadcrumb-item"><a href="{{ route('team.index') }}">Teams</a>
                    </li>
                    @endif
                    <li class="breadcrumb-item active">Create
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right text-md-right col-md-6 col-12">
        @if(auth::user()->can('View_Team'))
        <div class="btn-group">
            <a href="{{ route('team.index') }}" class="btn btn-round btn-success" type="button"><i class="material-icons">view_list</i> View All</a>
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
                        <h4 class="card-title">Create Team</h4>
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
                                <form action="{{ route('team.store') }}" method="post" class="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-block">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="text-bold-600 font-medium-2">
                                                                Select Hood Name
                                                            </div>
                                                            <select class="select2 form-control" name="hood_id">
                                                                <optgroup label="Planning Area Name">
                                                                    @foreach($hoods as $hood)
                                                                    <option value="{{ $hood->id }}">{{ $hood->planning_area_name }}</option>
                                                                    @endforeach
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="text-bold-600 font-medium-2">
                                                                Add Users
                                                            </div>
                                                            <select class="select2 form-control" name="users[]" multiple="multiple">
                                                                <optgroup label="Planning Area Name">
                                                                    @foreach($kakis as $kaki)
                                                                    <option value="{{ $kaki->id }}">{{ $kaki->name }} | {{ $kaki->email }}</option>
                                                                    @endforeach
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Title">Title</label>
                                                            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ old('title') }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="MaxNoOfPlayers">Max No. Of Players</label>
                                                            <input type="text" name="max_no_of_players" class="form-control" placeholder="Max No. Of Players" value="{{ old('max_no_of_players') }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Email">Email</label>
                                                            <input type="text" name="email" class="form-control" placeholder="email" value="{{ old('email') }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="ContactNo">Contact No</label>
                                                            <input type="text" name="contact_no" class="form-control" placeholder="contact_no" value="{{ old('contact_no') }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="MeetupPlace">Meetup Place</label>
                                                            <input type="text" name="meetup_place" class="form-control" placeholder="Meetup Place" value="{{ old('meetup_place') }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="AboutUs">About Us</label>
                                                            <input type="text" name="about_us" class="form-control" placeholder="About Us" value="{{ old('about_us') }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="Description">Description</label>
                                                            <textarea class="form-control" name="description" placeholder="Description">{{ old('description') }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="file" name="image" />
                                                        <pre>Allowed file types (.png, .jpg, .gif). Max:300kb</pre>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <button type="submit" class="btn btn-primary btn-glow">Save</button>
                                                    </div>
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
<script src="{{ asset('app-assets/vendors/js/extensions/dropzone.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/ui/prism.min.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/extensions/dropzone.js')}}"></script>
<script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{ asset('app-assets/js/scripts/pages/material-app.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
@endsection
