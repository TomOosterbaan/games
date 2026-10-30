@extends('base')
@section('title', 'Roles')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">New role</a>

    <table class="table">
        <thead><tr><th>ID</th><th>Name</th><th>Guard</th><th></th></tr></thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>{{ $role->guard_name }}</td>
                <td>
                    <a href="{{ route('roles.edit', $role) }}" class="btn btn-sm btn-secondary">Edit</a>
                    <form action="{{ route('roles.destroy', $role) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Delete this role?')">
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
