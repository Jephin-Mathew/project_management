@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Proposal</h1>
    <form action="{{ route('proposals.update', $proposal->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="client_id">Client</label>
            <select name="client_id" class="form-control" required>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}" {{ $proposal->client_id == $client->id ? 'selected' : '' }}>
                        {{ $client->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $proposal->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="5" required>{{ $proposal->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" class="form-control" value="{{ $proposal->amount }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="Pending" {{ $proposal->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Accepted" {{ $proposal->status == 'Accepted' ? 'selected' : '' }}>Accepted</option>
                <option value="Rejected" {{ $proposal->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
