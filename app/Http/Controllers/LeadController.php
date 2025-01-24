<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\User;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::all();
        return view('leads.index', compact('leads'));
    }

    public function create()
    {
        $employees = User::role('Employee')->get(); // Updated to use Spatie's role method
        return view('leads.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'description' => 'nullable',
            'user_id' => 'required|exists:users,id',
        ]);

        Lead::create($request->all());

        return redirect()->route('leads.index');
    }

    public function edit(Lead $lead)
    {
        $employees = User::role('Employee')->get(); // Updated to use Spatie's role method
        return view('leads.edit', compact('lead', 'employees'));
    }

    public function update(Request $request, Lead $lead)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'description' => 'nullable',
            'user_id' => 'required|exists:users,id',
        ]);

        $lead->update($request->all());

        return redirect()->route('leads.index');
    }

    public function destroy(Lead $lead)
    {
        $lead->delete();
        return redirect()->route('leads.index');
    }
}
