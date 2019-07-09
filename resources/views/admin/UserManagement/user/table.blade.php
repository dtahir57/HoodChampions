<table class="table table-striped table-bordered zero-configuration">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            @if(auth::user()->can('Edit_User') OR auth::user()->can('Delete_User'))
            <th style="max-width: 50px;">Actions</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone_number }}</td>
            @if(auth::user()->can('Edit_User') OR auth::user()->can('Delete_User'))
            <td>
                @if(auth::user()->can('Edit_User'))
                <a href="{{ route('user.edit', $user->id) }}" type="button"><i class="material-icons text-info">edit</i></a>
                @endif
                @if(auth::user()->can('Delete_User'))
                <a href="javascript:void(0);" class="deleteModal" type="button" data-toggle="modal" data-id="{{ $user->id }}" data-target="#danger"><i class="material-icons text-danger">delete</i></a>
                @endif
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            @if(auth::user()->can('Edit_User') OR auth::user()->can('Delete_User'))
            <th style="max-width: 50px;">Actions</th>
            @endif
        </tr>
    </tfoot>
</table>