@extends('base')
@section('title', 'Assign role to user')

@section('content')
    <form action="{{ route('user-roles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="user_id">User</label>
            <select name="user_id" id="user_id" class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->id }} - {{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="form-group">
            <label for="role_id">Role</label>
            <select name="role_id" id="role_id" class="form-control">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->id }} - {{ $role->name }}</option>
                @endforeach
            </select>
            @error('role_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <button class="btn btn-primary">Save</button>
        <a href="{{ route('user-roles.index') }}" class="btn btn-link">Cancel</a>
    </form>
@endsection
