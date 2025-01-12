<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    /**
     * Store a new lead in the database.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:leads,email',
            'phone' => 'required|string',
            'location' => 'required|string',
            'type' => 'required|string',
            'bedrooms' => 'required|string',
            'message' => 'nullable|string',
        ]);

        // Create the lead in the database
        $lead = Lead::create($request->all());

        // Return a JSON response
        return response()->json([
            'success' => true,
            'message' => 'Lead created successfully!',
            'data' => $lead,
        ], 201);
    }

    /**
     * Retrieve all leads.
     */
    public function index()
    {
        $leads = Lead::all();
        return response()->json($leads);
    }

    /**
     * Retrieve a specific lead.
     */
    public function show($id)
    {
        $lead = Lead::findOrFail($id);
        return response()->json($lead);
    }

    /**
     * Update a specific lead.
     */
    public function update(Request $request, $id)
    {
        $lead = Lead::findOrFail($id);

        $lead->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Lead updated successfully!',
            'data' => $lead,
        ]);
    }

    /**
     * Delete a specific lead.
     */
    public function destroy($id)
    {
        $lead = Lead::findOrFail($id);

        $lead->delete();

        return response()->json([
            'success' => true,
            'message' => 'Lead deleted successfully!',
        ]);
    }
}
