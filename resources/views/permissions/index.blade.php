@extends('base')
@section('title', 'Permissions')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('permissions.create') }}" class="btn btn-primary mb-3">New permission</a>

    <table class="table">
        <thead><tr><th>ID</th><th>Name</th><th>Guard</th><th></th></tr></thead>
        <tbody>
        @foreach($permissions as $permission)
            <tr>
                <td>{{ $permission->id }}</td>
                <td>{{ $permission->name }}</td>
                <td>{{ $permission->guard_name }}</td>
                <td>
                    <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-sm btn-secondary">Edit</a>
                    <form action="{{ route('permissions.destroy', $permission) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Delete this permission?')">
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
