@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Estimate</h1>
    <form action="{{ route('estimates.update', $estimate->id) }}" method="POST">
        @csrf
        @method('PUT')
        {{-- <div class="form-group">
            <label for="client_id">Client</label>
            <select name="client_id" class="form-control" required>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}" {{ $estimate->client_id == $client->id ? 'selected' : '' }}>
                        {{ $client->name }}
                    </option>
                @endforeach
            </select>
        </div> --}}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $estimate->title }}" required>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" class="form-control" value="{{ $estimate->amount }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="Pending" {{ $estimate->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Approved" {{ $estimate->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                <option value="Rejected" {{ $estimate->status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
