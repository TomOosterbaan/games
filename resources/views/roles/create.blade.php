@extends('base')
@section('title', 'New role')

@section('content')
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <button class="btn btn-primary">Save</button>
        <a href="{{ route('roles.index') }}" class="btn btn-link">Cancel</a>
    </form>
@endsection
