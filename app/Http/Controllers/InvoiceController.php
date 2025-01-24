<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Estimate;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        $estimates = Estimate::all();
        return view('invoices.create', compact('estimates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'estimate_id' => 'required|exists:estimates,id',
            'total' => 'required|numeric',
            'due_date' => 'required|date',
            'status' => 'required|in:Unpaid,Paid,Overdue',
        ]);

        Invoice::create([
            'estimate_id' => $request->estimate_id,
            'total' => $request->total,
            'due_date' => $request->due_date,
            'status' => $request->status,
        ]);

        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully.');
    }

    public function edit(Invoice $invoice)
    {
        $estimates = Estimate::all();
        return view('invoices.edit', compact('invoice', 'estimates'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'estimate_id' => 'required|exists:estimates,id',
            'total' => 'required|numeric',
            'due_date' => 'required|date',
            'status' => 'required|in:Unpaid,Paid,Overdue',
        ]);

        $invoice->update([
            'estimate_id' => $request->estimate_id,
            'total' => $request->total,
            'due_date' => $request->due_date,
            'status' => $request->status,
        ]);

        return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully.');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully.');
    }
}
