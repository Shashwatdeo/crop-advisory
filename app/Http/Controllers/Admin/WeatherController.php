<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WeatherAlert;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index()
    {
        $alerts = WeatherAlert::latest()->paginate(10);
        return view('admin.weather.index', compact('alerts'));
    }

    public function create()
    {
        return view('admin.weather.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'alert_type' => 'required|string|max:255',
            'severity' => 'required|in:low,medium,high',
            'status' => 'required|in:active,inactive',
            'alert_date' => 'required|date',
            'expiry_date' => 'nullable|date|after:alert_date',
            'affected_areas' => 'required|string|in:Northern Region,Central Region,Southern Region'
        ]);

        // Set start_date and end_date based on alert_date and expiry_date
        $validated['start_date'] = $validated['alert_date'];
        $validated['end_date'] = $validated['expiry_date'] ?? $validated['alert_date'];

        WeatherAlert::create($validated);

        return redirect()->route('admin.weather.index')
            ->with('success', 'Weather alert created successfully.');
    }

    public function edit(WeatherAlert $weather)
    {
        return view('admin.weather.edit', compact('weather'));
    }

    public function update(Request $request, WeatherAlert $weather)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'alert_type' => 'required|string|max:255',
            'severity' => 'required|in:low,medium,high',
            'status' => 'required|in:active,inactive',
            'alert_date' => 'required|date',
            'expiry_date' => 'nullable|date|after:alert_date',
            'affected_areas' => 'required|string|in:Northern Region,Central Region,Southern Region'
        ]);

        // Set start_date and end_date based on alert_date and expiry_date
        $validated['start_date'] = $validated['alert_date'];
        $validated['end_date'] = $validated['expiry_date'] ?? $validated['alert_date'];

        $weather->update($validated);

        return redirect()->route('admin.weather.index')
            ->with('success', 'Weather alert updated successfully.');
    }

    public function destroy(WeatherAlert $weather)
    {
        $weather->delete();

        return redirect()->route('admin.weather.index')
            ->with('success', 'Weather alert deleted successfully.');
    }
}
