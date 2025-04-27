<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use Illuminate\Http\Request;

class CropController extends Controller
{
    public function index(Request $request)
    {
        $query = Crop::query();

        // Filter by season
        if ($request->has('season') && $request->season !== '') {
            $query->where('season', $request->season);
        }

        // Filter by water requirement
        if ($request->has('water') && $request->water !== '') {
            $waterLevel = match($request->water) {
                'low' => 'Low water requirement',
                'medium' => 'Moderate water requirement',
                'high' => 'High water requirement',
                default => null
            };
            if ($waterLevel) {
                $query->where('water_requirement', 'like', "%$waterLevel%");
            }
        }

        // Filter by temperature
        if ($request->has('temperature') && $request->temperature !== '') {
            $tempRange = match($request->temperature) {
                'cool' => '10°C - 20°C',
                'moderate' => '15°C - 25°C',
                'warm' => '20°C - 30°C',
                default => null
            };
            if ($tempRange) {
                $query->where('temperature_range', 'like', "%$tempRange%");
            }
        }

        // Sort results
        if ($request->has('sort')) {
            $query->orderBy($request->sort, 'asc');
        } else {
            $query->latest();
        }

        $crops = $query->paginate(10);
        return view('crops.index', compact('crops'));
    }

    public function show(Crop $crop)
    {
        return view('crops.show', compact('crop'));
    }
}
