<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\CropSuggestion;
use App\Models\PestAlert;
use App\Models\WeatherAlert;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $farmersCount = User::where('is_admin', false)->count();
        $cropSuggestionsCount = CropSuggestion::count();
        $pestAlertsCount = PestAlert::count();
        $weatherWarningsCount = WeatherAlert::count();

        return view('admin.dashboard', compact(
            'farmersCount',
            'cropSuggestionsCount',
            'pestAlertsCount',
            'weatherWarningsCount'
        ));
    }
} 