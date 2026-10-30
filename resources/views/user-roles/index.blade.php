@extends('base')
@section('title', 'Role-Users')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('user-roles.create') }}" class="btn btn-primary mb-3">New link</a>

    <table class="table">
        <thead><tr><th>User</th><th>Role</th><th></th></tr></thead>
        <tbody>
        @foreach($links as $link)
            <tr>
                <td>{{ $link->user_id }} - {{ $link->user_name }}</td>
                <td>{{ $link->role_id }} - {{ $link->role_name }}</td>
                <td>
                    <form action="{{ route('user-roles.destroy', [$link->user_id, $link->role_id]) }}"
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
