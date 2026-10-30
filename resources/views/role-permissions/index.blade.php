@extends('base')
@section('title', 'Role-Permissions')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('role-permissions.create') }}" class="btn btn-primary mb-3">New link</a>

    <table class="table">
        <thead><tr><th>Role</th><th>Permission</th><th></th></tr></thead>
        <tbody>
        @foreach($links as $link)
            <tr>
                <td>{{ $link->role_id }} - {{ $link->role_name }}</td>
                <td>{{ $link->permission_id }} - {{ $link->permission_name }}</td>
                <td>
                    <form action="{{ route('role-permissions.destroy', [$link->role_id, $link->permission_id]) }}"
                          method="POST" onsubmit="return confirm('Remove this link?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
