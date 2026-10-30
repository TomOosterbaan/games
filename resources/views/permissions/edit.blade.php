@extends('base')
@section('title', 'Edit permission')

@section('content')
    <form action="{{ route('permissions.update', $permission) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $permission->name) }}" class="form-control">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('permissions.index') }}" class="btn btn-link">Cancel</a>
    </form>
@endsection
