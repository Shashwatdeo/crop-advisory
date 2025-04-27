<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WeatherAlert;
use Illuminate\Support\Facades\DB;

class WeatherAlertSeeder extends Seeder
{
    public function run()
    {
        DB::table('weather_alerts')->truncate();

        $alerts = [
            [
                'title' => 'Heavy Rainfall Warning',
                'description' => 'Heavy rainfall expected in the northern region for the next 48 hours.',
                'alert_type' => 'rainfall',
                'severity' => 'high',
                'status' => 'active',
                'alert_date' => now(),
                'expiry_date' => now()->addDays(2),
                'affected_areas' => 'Northern Region',
                'start_date' => now(),
                'end_date' => now()->addDays(2)
            ],
            [
                'title' => 'Drought Alert',
                'description' => 'Prolonged dry spell expected in the southern region.',
                'alert_type' => 'drought',
                'severity' => 'medium',
                'status' => 'active',
                'alert_date' => now(),
                'expiry_date' => now()->addDays(7),
                'affected_areas' => 'Southern Region',
                'start_date' => now(),
                'end_date' => now()->addDays(7)
            ],
            [
                'title' => 'Heat Wave Warning',
                'description' => 'Extreme temperatures expected in the central region.',
                'alert_type' => 'temperature',
                'severity' => 'high',
                'status' => 'active',
                'alert_date' => now(),
                'expiry_date' => now()->addDays(3),
                'affected_areas' => 'Central Region',
                'start_date' => now(),
                'end_date' => now()->addDays(3)
            ],
            [
                'title' => 'Frost Warning',
                'description' => 'Frost conditions expected in the eastern region.',
                'alert_type' => 'temperature',
                'severity' => 'medium',
                'status' => 'active',
                'alert_date' => now(),
                'expiry_date' => now()->addDays(2),
                'affected_areas' => 'Eastern Region',
                'start_date' => now(),
                'end_date' => now()->addDays(2)
            ],
            [
                'title' => 'Wind Storm Alert',
                'description' => 'Strong winds expected in the western region.',
                'alert_type' => 'wind',
                'severity' => 'high',
                'status' => 'active',
                'alert_date' => now(),
                'expiry_date' => now()->addDays(1),
                'affected_areas' => 'Western Region',
                'start_date' => now(),
                'end_date' => now()->addDays(1)
            ]
        ];

        foreach ($alerts as $alert) {
            WeatherAlert::create($alert);
        }
    }
} 