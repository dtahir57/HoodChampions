@extends('layouts.admin-app')

@section('title', 'Manage Hoods')

@section('vendor-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
@endsection

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/material-vertical-menu-modern.css')}}">
@endsection

@section('content')

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