@extends('layouts.admin-app')

@section('title', 'Manage Regions')

@section('vendor-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/material-vendors.min.css')}}">
@endsection

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/material-vertical-menu-modern.css') }}">
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">Manage Regions</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a>
                    </li>
                    @if(auth::user()->can('View_Region'))
                    <li class="breadcrumb-item"><a href="{{ route('region.index') }}">Regions</a>
                    </li>
                    @endif
                    <li class="breadcrumb-item active">Edit
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right text-md-right col-md-6 col-12">
        @if(auth::user()->can('View_Region'))
        <div class="btn-group">
            <a href="{{ route('region.index') }}" class="btn btn-round btn-success" type="button"><i class="material-icons">view_list</i> View All</a>
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
                        <h4 class="card-title">Edit Region</h4>
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
                                <form action="{{ route('region.update', $region->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="PATCH">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-block">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="PlanningAreaName">Region Name</label>
                                                            <input type="text" name="region" required class="form-control" placeholder="Region" value="{{ $region->region }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <button type="submit" class="btn btn-glow btn-primary mt-2">Save</button>
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
<script src="{{ asset('app-assets/js/scripts/pages/material-app.js') }}"></script>
@endsection
