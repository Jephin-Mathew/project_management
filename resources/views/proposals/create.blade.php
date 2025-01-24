@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Proposal</h1>
    <form action="{{ route('proposals.store') }}" method="POST">
        @csrf
        {{-- <div class="form-group">
            <label for="client_id">Client</label>
            <select name="client_id" class="form-control" required>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
        </div> --}}
        <div class="form-group">
            <label for="lead_id">Lead</label>
            <select name="lead_id" class="form-control" required>
                @foreach ($leads as $lead)
                    <option value="{{ $lead->id }}">{{ $lead->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="details">Details</label>
            <textarea name="details" class="form-control" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="Pending">Pending</option>
                <option value="Approved">Approved</option>
                <option value="Rejected">Rejected</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create Proposal</button>
    </form>
    
    
</div>
@endsection
