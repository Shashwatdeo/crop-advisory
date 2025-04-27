<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PestAlert;
use Illuminate\Http\Request;

class PestController extends Controller
{
    public function index()
    {
        $pests = PestAlert::latest()->paginate(10);
        return view('admin.pests.index', compact('pests'));
    }

    public function create()
    {
        return view('admin.pests.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'pest_name' => 'required|string|max:255',
            'affected_crops' => 'required|string|max:255',
            'severity' => 'required|in:Low,Medium,High,Critical',
            'status' => 'required|in:active,resolved',
            'alert_date' => 'required|date',
            'expiry_date' => 'nullable|date|after:alert_date',
            'location' => 'required|string|max:255',
            'crop' => 'required|string|max:255'
        ]);

        PestAlert::create($validated);

        return redirect()->route('admin.pests.index')
            ->with('success', 'Pest alert created successfully.');
    }

    public function edit(PestAlert $pest)
    {
        return view('admin.pests.edit', compact('pest'));
    }

    public function update(Request $request, PestAlert $pest)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'pest_name' => 'required|string|max:255',
            'affected_crops' => 'required|string|max:255',
            'severity' => 'required|in:Low,Medium,High,Critical',
            'status' => 'required|in:active,resolved',
            'alert_date' => 'required|date',
            'expiry_date' => 'nullable|date|after:alert_date',
            'location' => 'required|string|max:255',
            'crop' => 'required|string|max:255'
        ]);

        $pest->update($validated);

        return redirect()->route('admin.pests.index')
            ->with('success', 'Pest alert updated successfully.');
    }

    public function destroy(PestAlert $pest)
    {
        $pest->delete();

        return redirect()->route('admin.pests.index')
            ->with('success', 'Pest alert deleted successfully.');
    }
}
