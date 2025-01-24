@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Login</h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf

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

        <!-- Remember Me -->
        <div class="form-group form-check">
            <input type="checkbox" name="remember" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">Remember Me</label>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Login</button>

        <!-- Error message -->
        @if(session('error'))
            <div class="alert alert-danger mt-2">
                {{ session('error') }}
            </div>
        @endif
    </form>
</div>
@endsection
