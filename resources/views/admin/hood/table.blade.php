<table class="table table-striped table-bordered zero-configuration" id="hoodsTbl">
    <thead>
        <tr>
            <th style="max-width: 5px;"><input type="checkbox" name="selectAll" id="checkAll" /></th>
            <th>Planning Area Name</th>
            <th>Region</th>
            @if(auth::user()->can('Edit_Hood') OR auth::user()->can('Delete_Hood'))
            <th style="max-width: 50px;">Actions</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($hoods as $hood)
        <tr>
            <td class=""><input type="checkbox" class="check_box" name="hoods[]" value="{{ $hood->id }}"></td>
            <td>{{ $hood->planning_area_name }}</td>
            <td>{{ $hood->region->region }}</td>
            @if(auth::user()->can('Edit_Hood') OR auth::user()->can('Delete_Hood'))
            <td>
                @if(auth::user()->can('Edit_Hood'))
                <a href="{{ route('hood.edit', $hood->id) }}" type="button"><i class="material-icons text-info">edit</i></a>
                @endif
                @if(auth::user()->can('Delete_Hood'))
                <a href="javascript:void(0);" class="deleteModal" type="button" data-toggle="modal" data-id="{{ $hood->id }}" data-target="#danger"><i class="material-icons text-danger">delete</i></a>
                @endif
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>Check</th>
            <th>Planning Area Name</th>
            <th>Region</th>
            @if(auth::user()->can('Edit_Hood') OR auth::user()->can('Delete_Hood'))
            <th style="max-width: 50px;">Actions</th>
            @endif
        </tr>
    </tfoot>
</table>