<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CropSuggestion;
use Illuminate\Support\Facades\Storage;
use App\Services\WeatherService;

class CropSuggestionController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function index()
    {
        $city = 'Phagwara'; // Default city
        $weather = $this->weatherService->getWeather($city);
        return view('crop_suggestions.index', compact('weather', 'city'));
    }

    public function getSuggestions(Request $request)
    {
        $validated = $request->validate([
            'region' => 'required|string',
            'soil_type' => 'required|string',
        ]);

        // Get all matching suggestions
        $suggestions = CropSuggestion::where('region', $validated['region'])
            ->where('soil_type', $validated['soil_type'])
            ->get();

        if ($suggestions->isEmpty()) {
            return response()->json(['message' => 'No suitable crop suggestions found for your criteria.'], 200);
        }

        // Filter to ensure unique crop names
        $uniqueSuggestions = collect();
        $seenCropNames = [];
        
        foreach ($suggestions as $suggestion) {
            if (!in_array($suggestion->crop_name, $seenCropNames)) {
                $seenCropNames[] = $suggestion->crop_name;
                $uniqueSuggestions->push($suggestion);
            }
        }

        // Transform the suggestions to include image
        $uniqueSuggestions->transform(function ($suggestion) {
            $suggestion->image = $suggestion->image_url ?? asset('images/crops/default.jpg');
            return $suggestion;
        });

        return response()->json($uniqueSuggestions);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'crop_name' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'soil_type' => 'required|string|max:255',
            'season' => 'required|string|max:255',
            'water_availability' => 'required|string|max:255',
            'profit_potential' => 'nullable|string|max:255',
            'growth_duration' => 'nullable|string|max:255',
            'water_requirement' => 'nullable|string|max:255',
            'temperature_range' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('public/crops');
            $imageUrl = Storage::url($imagePath); // returns like /storage/crops/filename.jpg
        } else {
            $imageUrl = null;
        }

        CropSuggestion::create([
            'crop_name' => $validated['crop_name'],
            'region' => $validated['region'],
            'soil_type' => $validated['soil_type'],
            'season' => $validated['season'],
            'water_availability' => $validated['water_availability'],
            'profit_potential' => $validated['profit_potential'] ?? '',
            'growth_duration' => $validated['growth_duration'] ?? '',
            'water_requirement' => $validated['water_requirement'] ?? '',
            'temperature_range' => $validated['temperature_range'] ?? '',
            'image_url' => $imageUrl,
        ]);

        return redirect()->route('crop_suggestions.index')->with('success', 'Crop suggestion added successfully!');
    }
}
