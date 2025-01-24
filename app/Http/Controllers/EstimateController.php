<?php

namespace App\Http\Controllers;

use App\Models\Estimate;
use App\Models\Proposal;
use Illuminate\Http\Request;

class EstimateController extends Controller
{
    // Constructor to enforce role-based access control
    public function __construct()
    {
        $this->middleware('role:Admin|Manager')->only(['create', 'store', 'edit', 'update', 'destroy']);
        $this->middleware('role:Admin|Manager|Employee')->only('index');
    }

    public function index()
    {
        // Show all estimates (accessible by Admin, Manager, and Employee)
        $estimates = Estimate::all();
        return view('estimates.index', compact('estimates'));
    }

    public function create()
    {
        // Show create form for estimates (accessible by Admin and Manager only)
        $proposals = Proposal::all();
        return view('estimates.create', compact('proposals'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'proposal_id' => 'required|exists:proposals,id',
            'amount' => 'required|numeric',
            'details' => 'nullable|string',
            'status' => 'required|in:Pending,Approved,Rejected',
        ]);

        // Create the estimate
        Estimate::create([
            'proposal_id' => $request->proposal_id,
            'amount' => $request->amount,
            'details' => $request->details,
            'status' => $request->status,
        ]);

        // Redirect to the estimate list with a success message
        return redirect()->route('estimates.index')->with('success', 'Estimate created successfully.');
    }

    public function edit(Estimate $estimate)
    {
        // Show edit form for the selected estimate (accessible by Admin and Manager only)
        $proposals = Proposal::all();
        return view('estimates.edit', compact('estimate', 'proposals'));
    }

    public function update(Request $request, Estimate $estimate)
    {
        // Validate the incoming request
        $request->validate([
            'proposal_id' => 'required|exists:proposals,id',
            'amount' => 'required|numeric',
            'details' => 'nullable|string',
            'status' => 'required|in:Pending,Approved,Rejected',
        ]);

        // Update the estimate
        $estimate->update([
            'proposal_id' => $request->proposal_id,
            'amount' => $request->amount,
            'details' => $request->details,
            'status' => $request->status,
        ]);

        // Redirect to the estimate list with a success message
        return redirect()->route('estimates.index')->with('success', 'Estimate updated successfully.');
    }

    public function destroy(Estimate $estimate)
    {
        // Delete the estimate
        $estimate->delete();

        // Redirect to the estimate list with a success message
        return redirect()->route('estimates.index')->with('success', 'Estimate deleted successfully.');
    }
}
