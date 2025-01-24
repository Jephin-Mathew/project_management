@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Leads</h1>
    <a href="{{ route('leads.create') }}" class="btn btn-primary">Create Lead</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Assigned To</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leads as $lead)
                <tr>
                    <td>{{ $lead->name }}</td>
                    <td>{{ $lead->email }}</td>
                    <td>{{ $lead->user->name }}</td>
                    <td>
                        <a href="{{ route('leads.edit', $lead->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('leads.destroy', $lead->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
