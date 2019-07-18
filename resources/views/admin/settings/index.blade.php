@extends('layouts.admin-app')

@section('title', 'Manage Hoods')

@section('vendor-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endsection

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/material-vertical-menu-modern.css')}}">
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">Settings</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Settings
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content-wrapper">
    <div class="content-body">
        <section id="configuration">
            <div class="row">
                <div class="col-12">
                    @if(session('created'))
                    <li class="alert alert-success">{{ session('created') }}</li>
                    @endif
                    @if(session('updated'))
                    <li class="alert alert-success">{{ session('updated') }}</li>
                    @endif
                    @if(session('deleted'))
                    <li class="alert alert-success">{{ session('deleted') }}</li>
                    @endif
                    <div class="card">
                        <div class="card-header">
                        <h4 class="card-title">Configure Your Bulksms Username & Password</h4>
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
                                <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th style="max-width: 50px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ env('BULKSMS_USERNAME') }}</td>
                                                <td>{{ env('BULKSMS_PASSWORD') }}</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="deleteModal" type="button" data-toggle="modal" data-target="#editModal"><i class="material-icons text-info">edit</i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Bulksms Username</th>
                                                <th>Bulksms Password</th>
                                                <th style="max-width: 50px;">Actions</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<div class="modal fade text-left" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h4 class="modal-title white" id="myModalLabel10">Edit Bulksms Credentials</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('setting.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" value="{{ env('BULKSMS_USERNAME') }}" placeholder="Bulksms Username" required />
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" value="{{ env('BULKSMS_PASSWORD') }}" placeholder="Bulksms Password" required />
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/tables/datatables/datatable-basic.js') }}"></script>
@endsection