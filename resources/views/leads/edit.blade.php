@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Lead</h1>
    <form action="{{ route('leads.update', $lead->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $lead->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $lead->email }}">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $lead->phone }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control">{{ $lead->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="user_id">Assigned To</label>
            <select name="user_id" class="form-control" required>
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $lead->user_id == $employee->id ? 'selected' : '' }}>
                        {{ $employee->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
