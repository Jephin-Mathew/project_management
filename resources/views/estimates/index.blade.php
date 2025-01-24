@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Estimates</h1>
    
    <!-- Success message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <!-- Create Estimate Button (only visible for Admin and Manager) -->
    @can('create', App\Models\Estimate::class)
        <a href="{{ route('estimates.create') }}" class="btn btn-primary mb-3">Create Estimate</a>
    @endcan
    
    <!-- Estimates Table -->
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estimates as $estimate)
                <tr>
                    <td>{{ $estimate->title }}</td>
                    <td>{{ $estimate->amount }}</td>
                    <td>{{ $estimate->status }}</td>
                    <td>
                        <!-- Edit Button (only visible for Admin and Manager) -->
                        @can('update', $estimate)
                            <a href="{{ route('estimates.edit', $estimate->id) }}" class="btn btn-warning">Edit</a>
                        @endcan

                        <!-- Delete Button (only visible for Admin and Manager) -->
                        @can('delete', $estimate)
                            <form action="{{ route('estimates.destroy', $estimate->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
