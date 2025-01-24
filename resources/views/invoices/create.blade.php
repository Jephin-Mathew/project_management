@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Invoice</h1>
    <form action="{{ route('invoices.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="estimate_id">Estimate</label>
            <select name="estimate_id" class="form-control" required>
                @foreach ($estimates as $estimate)
                    <option value="{{ $estimate->id }}">{{ $estimate->id }} - {{ $estimate->amount }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="total">Total</label>
            <input type="number" name="total" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="date" name="due_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="Unpaid">Unpaid</option>
                <option value="Paid">Paid</option>
                <option value="Overdue">Overdue</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
