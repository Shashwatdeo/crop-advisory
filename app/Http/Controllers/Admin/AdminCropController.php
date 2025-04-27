<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Crop;
use Illuminate\Http\Request;

class AdminCropController extends Controller
{
    public function index()
    {
        $crops = Crop::latest()->paginate(10);
        return view('admin.crops.index', compact('crops'));
    }

    public function create()
    {
        return view('admin.crops.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:crops',
            'season' => 'required|in:summer,winter,rainy',
            'water_requirement' => 'required|string|max:255',
            'temperature_range' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Crop::create($validated);

        return redirect()
            ->route('admin.crops.index')
            ->with('success', 'Crop added successfully.');
    }

    public function edit(Crop $crop)
    {
        return view('admin.crops.edit', compact('crop'));
    }

    public function update(Request $request, Crop $crop)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:crops,name,' . $crop->id,
            'season' => 'required|in:summer,winter,rainy',
            'water_requirement' => 'required|string|max:255',
            'temperature_range' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $crop->update($validated);

        return redirect()
            ->route('admin.crops.index')
            ->with('success', 'Crop updated successfully.');
    }

    public function destroy(Crop $crop)
    {
        $crop->delete();

        return redirect()
            ->route('admin.crops.index')
            ->with('success', 'Crop deleted successfully.');
    }
} 