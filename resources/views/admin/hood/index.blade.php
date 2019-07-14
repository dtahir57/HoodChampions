@extends('layouts.admin-app')

@section('title', 'Manage Hoods')

@section('vendor-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endsection

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/material-vertical-menu-modern.css')}}">
@endsection

@section('content')
<form action="{{ route('hood.bulk_destroy') }}" method="POST">
@csrf
<input type="hidden" name="_method" value="DELETE" />
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title mb-0">Manage Hoods</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Hoods
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-6 col-12">
            <div class="btn-group">
                @if(auth::user()->can('Add_Hood'))
                <a href="{{ route('hood.create') }}" class="btn btn-round btn-success btn-glow" type="button"><i class="material-icons">add</i> Hood</a>
                @endif
                @if(auth::user()->can('Export_Hoods'))
                <a href="{{ route('hood.export') }}" type="button" class="btn btn-primary btn-round btn-glow"><i class="material-icons">import_export</i>Export</a>
                @endif
                <button id="bulk_delete" type="submit" class="btn btn-danger btn-round btn-glow mr-2" hidden><i class="material-icons">delete</i></button>
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
                            <h4 class="card-title">Hoods</h4>
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
                                    @include('admin.hood.table')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</form>
<!-- Modal -->
<div class="modal fade text-left" id="danger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger white">
                <h4 class="modal-title white" id="myModalLabel10">Delete Hood</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Are You Sure You Want To Delete Hood?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <form action="{{ route('hood.destroy') }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE" />
                    <input type="hidden" name="id" id="hood" value="" />
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
        $(".modal-footer #hood").val( id );
    });
    $('.check_box').change(function(){
        if ($("#hoodsTbl input[name='hoods[]']:checked").length > 0) {
            $('#bulk_delete').removeAttr('hidden');
        } else {
            $('#bulk_delete').attr('hidden', 'hidden');
        }
    });
    $("#checkAll").click(function(){
        $("#hoodsTbl input[name='hoods[]']").not(this).prop('checked', this.checked);
        if ($("#hoodsTbl input[name='hoods[]']:checked").length > 0) {
            $('#bulk_delete').removeAttr('hidden');
        } else {
            $('#bulk_delete').attr('hidden', 'hidden');
        }
    });
});
</script>
@endsection
