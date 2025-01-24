@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Invoice</h1>
    <form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="client_id">Client</label>
            <select name="client_id" class="form-control" required>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}" {{ $invoice->client_id == $client->id ? 'selected' : '' }}>
                        {{ $client->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $invoice->title }}" required>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" class="form-control" value="{{ $invoice->amount }}" required>
        </div>
        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="date" name="due_date" class="form-control" value="{{ $invoice->due_date }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="Pending" {{ $invoice->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Paid" {{ $invoice->status == 'Paid' ? 'selected' : '' }}>Paid</option>
                <option value="Overdue" {{ $invoice->status
