@extends('base')
@section('title', 'Edit role')

@section('content')
    <form action="{{ route('roles.update', $role) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $role->name) }}" class="form-control">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('roles.index') }}" class="btn btn-link">Cancel</a>
    </form>
@endsection
