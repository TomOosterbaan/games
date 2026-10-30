@extends('base')
@section('title', 'Link permission to role')

@section('content')
    <form action="{{ route('role-permissions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="role_id">Role</label>
            <select name="role_id" id="role_id" class="form-control">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->id }} - {{ $role->name }}</option>
                @endforeach
            </select>
            @error('role_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="form-group">
            <label for="permission_id">Permission</label>
            <select name="permission_id" id="permission_id" class="form-control">
                @foreach($permissions as $permission)
                    <option value="{{ $permission->id }}">{{ $permission->id }} - {{ $permission->name }}</option>
                @endforeach
            </select>
            @error('permission_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <button class="btn btn-primary">Save</button>
        <a href="{{ route('role-permissions.index') }}" class="btn btn-link">Cancel</a>
    </form>
@endsection
