@extends('layouts.admin-app')

@section('title', 'Manage Regions')

@section('vendor-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endsection

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/material-vertical-menu-modern.css')}}">
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
                    <li class="breadcrumb-item active">Regions
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right text-md-right col-md-6 col-12">
        @if(auth::user()->can('Add_Region'))
        <div class="btn-group">
            <a href="{{ route('region.create') }}" class="btn btn-round btn-success btn-glow" type="button"><i class="material-icons">add</i> Region</a>
        </div>
        @endif
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
                        <h4 class="card-title">Regions</h4>
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
                                                <th>Region</th>
                                                @if(auth::user()->can('Edit_Region') OR auth::user()->can('Delete_Region'))
                                                <th style="max-width: 50px;">Actions</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($regions as $region)
                                            <tr>
                                                <td>{{ $region->region }}</td>
                                                @if(auth::user()->can('Edit_Region') OR auth::user()->can('Delete_Region'))
                                                <td>
                                                    @if(auth::user()->can('Edit_Region'))
                                                    <a href="{{ route('region.edit', $region->id) }}" type="button"><i class="material-icons text-info">edit</i></a>
                                                    @endif
                                                    @if(auth::user()->can('Delete_Region'))
                                                    <a href="javascript:void(0);" class="deleteModal" type="button" data-toggle="modal" data-id="{{ $region->id }}" data-target="#danger"><i class="material-icons text-danger">delete</i></a>
                                                    @endif
                                                </td>
                                                @endif
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Region</th>
                                                @if(auth::user()->can('Edit_Region') OR auth::user()->can('Delete_Region'))
                                                <th style="max-width: 50px;">Actions</th>
                                                @endif
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
<!-- Modal -->
<div class="modal fade text-left" id="danger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger white">
                <h4 class="modal-title white" id="myModalLabel10">Delete Region</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Are You Sure You Want To Delete Region?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <form action="{{ route('region.destroy') }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE" />
                    <input type="hidden" name="id" id="region" value="" />
                    <button type="submit" class="btn btn-outline-danger">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/tables/datatables/datatable-basic.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){
    $(document).on("click", ".deleteModal", function() {
        var id = $(this).data('id');
        $(".modal-footer #region").val( id );
    });
});
</script>
@endsection
