<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // Importing the Http facade
use App\Services\WeatherService;

class WeatherController extends Controller
{
    protected $weatherService;
    protected $apiKey;
    protected $baseUrl;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
        $this->apiKey = config('services.openweathermap.key');
        $this->baseUrl = 'https://api.openweathermap.org/data/2.5/weather';
    }

    public function index(Request $request)
    {
        $city = $request->input('city', 'Phagwara'); // Default city
        $weather = null;
        
        if (empty($this->apiKey)) {
            return view('weather.index', [
                'weather' => null,
                'city' => $city,
                'error' => 'OpenWeatherMap API key is not configured. Please add OPENWEATHERMAP_API_KEY to your .env file.'
            ]);
        }
        
        try {
            $response = Http::get($this->baseUrl, [
                'q' => $city,
                'appid' => $this->apiKey,
                'units' => 'metric'
            ]);

            if ($response->successful()) {
                $weather = $response->json();
            }
        } catch (\Exception $e) {
            // Log the error if needed
        }

        return view('weather.index', compact('weather', 'city'));
    }

    public function check(Request $request)
    {
        $city = $request->input('city');
        $weather = null;
        
        if (empty($this->apiKey)) {
            return view('weather.index', [
                'weather' => null,
                'city' => $city,
                'error' => 'OpenWeatherMap API key is not configured. Please add OPENWEATHERMAP_API_KEY to your .env file.'
            ]);
        }
        
        try {
            $response = Http::get($this->baseUrl, [
                'q' => $city,
                'appid' => $this->apiKey,
                'units' => 'metric'
            ]);

            if ($response->successful()) {
                $weather = $response->json();
            }
        } catch (\Exception $e) {
            // Log the error if needed
        }

        return view('weather.index', compact('weather', 'city'));
    }
}
