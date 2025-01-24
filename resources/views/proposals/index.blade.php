@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Proposals</h1>
    <a href="{{ route('proposals.create') }}" class="btn btn-primary">Create Proposal</a>
    <table class="table">
        <thead>
            <tr>
                {{-- <th>Client</th> --}}
                <th>Title</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proposals as $proposal)
                <tr>
                    {{-- <td>{{ $proposal->client->name }}</td> --}}
                    <td>{{ $proposal->title }}</td>
                    <td>{{ $proposal->description }}</td>
                    <td>{{ $proposal->amount }}</td>
                    <td>{{ $proposal->status }}</td>
                    <td>
                        <a href="{{ route('proposals.edit', $proposal->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('proposals.destroy', $proposal->id) }}" method="POST" style="display:inline;">
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
