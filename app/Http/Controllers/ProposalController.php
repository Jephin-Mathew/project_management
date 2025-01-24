<?php

namespace App\Http\Controllers;

// use App\Models\Client;
use App\Models\Proposal;
use App\Models\Lead;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function index()
    {
        $proposals = Proposal::all();
        return view('proposals.index', compact('proposals'));
    }

    public function create()
    {
        $leads = Lead::all();
        // $clients = Client::all(); 
        return view('proposals.create', compact('leads'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            // 'client_id' => 'required|exists:clients,id',
            'lead_id' => 'required|exists:leads,id',
            'title' => 'required',
            'details' => 'nullable',
            'amount' => 'required|numeric',
            'status' => 'required|in:Pending,Approved,Rejected',
        ]);
    
        Proposal::create($request->all());
    
        return redirect()->route('proposals.index');
    }
    

    public function edit(Proposal $proposal)
    {
        $leads = Lead::all();
        return view('proposals.edit', compact('proposal', 'leads')); // Only pass $leads
    }

    public function update(Request $request, Proposal $proposal)
    {
        $request->validate([
            'lead_id' => 'required|exists:leads,id',
            'title' => 'required',
            'details' => 'nullable',
            'amount' => 'required|numeric',
            'status' => 'required|in:Pending,Approved,Rejected',
        ]);

        $proposal->update($request->all());

        return redirect()->route('proposals.index');
    }

    public function destroy(Proposal $proposal)
    {
        $proposal->delete();
        return redirect()->route('proposals.index');
    }
}
