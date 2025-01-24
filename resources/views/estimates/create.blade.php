@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Estimate</h1>
    <form action="{{ route('estimates.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="proposal_id">Proposal</label>
            <select name="proposal_id" class="form-control" required>
                @foreach ($proposals as $proposal)
                    <option value="{{ $proposal->id }}">{{ $proposal->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="details">Details</label>
            <textarea name="details" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="Pending">Pending</option>
                <option value="Approved">Approved</option>
                <option value="Rejected">Rejected</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
