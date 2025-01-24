@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Register</h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf
    <!-- Name Field -->
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Email Field -->
    <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Password Field -->
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Confirm Password Field -->
    <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Register</button>

    <!-- Error message -->
    @if(session('error'))
        <div class="alert alert-danger mt-2">
            {{ session('error') }}
        </div>
    @endif
</form>
</div>
@endsection