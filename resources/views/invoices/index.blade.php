@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Invoices</h1>
    <a href="{{ route('invoices.create') }}" class="btn btn-primary">Create Invoice</a>
    <table class="table">
        <thead>
            <tr>
                {{-- <th>Client</th> --}}
                <th>Title</th>
                <th>Amount</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                    {{-- <td>{{ $invoice->client->name }}</td> --}}
                    <td>{{ $invoice->title }}</td>
                    <td>{{ $invoice->amount }}</td>
                    <td>{{ $invoice->due_date }}</td>
                    <td>{{ $invoice->status }}</td>
                    <td>
                        <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" style="display:inline;">
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
