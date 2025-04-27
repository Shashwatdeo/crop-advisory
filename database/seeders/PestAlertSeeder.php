<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PestAlert;

class PestAlertSeeder extends Seeder
{
    public function run()
    {
        DB::table('pest_alerts')->truncate(); // Optional: clear old data

        $alerts = [
            [
                'title' => 'Corn Borer Infestation Alert',
                'location' => 'Northern',
                'crop' => 'Corn',
                'severity' => 'High',
                'description' => 'Corn borer infestation in 60% of surveyed fields',
                'pest_name' => 'Corn Borer',
                'affected_crops' => 'Corn, Sweet Corn',
                'status' => 'active',
                'alert_date' => now(),
                'expiry_date' => now()->addDays(7),
                'recommendations' => 'Apply appropriate pesticides and implement crop rotation.'
            ],
            [
                'title' => 'Rice Blast Disease Warning',
                'location' => 'Southern',
                'crop' => 'Rice',
                'severity' => 'Medium',
                'description' => 'Rice blast fungus detected in paddies',
                'pest_name' => 'Rice Blast Fungus',
                'affected_crops' => 'Rice',
                'status' => 'active',
                'alert_date' => now(),
                'expiry_date' => now()->addDays(5),
                'recommendations' => 'Use fungicides and maintain proper water management.'
            ],
            [
                'title' => 'Wheat Aphid Outbreak',
                'location' => 'Central',
                'crop' => 'Wheat',
                'severity' => 'High',
                'description' => 'Severe aphid attack damaging wheat crops',
                'pest_name' => 'Wheat Aphid',
                'affected_crops' => 'Wheat, Barley',
                'status' => 'active',
                'alert_date' => now(),
                'expiry_date' => now()->addDays(3),
                'recommendations' => 'Use insecticidal soaps and monitor natural predators.'
            ],
            [
                'title' => 'Soybean Leaf Spot Alert',
                'location' => 'Eastern',
                'crop' => 'Soybean',
                'severity' => 'Low',
                'description' => 'Mild leaf spot detected in soybean fields',
                'pest_name' => 'Leaf Spot Fungus',
                'affected_crops' => 'Soybean',
                'status' => 'active',
                'alert_date' => now(),
                'expiry_date' => now()->addDays(10),
                'recommendations' => 'Apply fungicides if condition worsens.'
            ],
            [
                'title' => 'Vegetable Whitefly Infestation',
                'location' => 'Western',
                'crop' => 'Vegetables',
                'severity' => 'High',
                'description' => 'Whiteflies spreading rapidly in brinjal crops',
                'pest_name' => 'Whitefly',
                'affected_crops' => 'Brinjal, Tomato, Okra',
                'status' => 'active',
                'alert_date' => now(),
                'expiry_date' => now()->addDays(4),
                'recommendations' => 'Use yellow sticky traps and neem-based pesticides.'
            ],
            [
                'title' => 'Fruit Borers Alert',
                'location' => 'Northern',
                'crop' => 'Fruits',
                'severity' => 'Medium',
                'description' => 'Fruit borers found in apple orchards',
                'pest_name' => 'Fruit Borer',
                'affected_crops' => 'Apple',
                'status' => 'active',
                'alert_date' => now(),
                'expiry_date' => now()->addDays(10),
                'recommendations' => 'Apply appropriate pesticides and monitor for signs of infestation.'
            ],
            [
                'title' => 'Fall Armyworm Outbreak',
                'location' => 'Southern',
                'crop' => 'Corn',
                'severity' => 'Critical',
                'description' => 'Fall armyworm outbreak spreading quickly',
                'pest_name' => 'Fall Armyworm',
                'affected_crops' => 'Corn',
                'status' => 'active',
                'alert_date' => now(),
                'expiry_date' => now()->addDays(3),
                'recommendations' => 'Use insecticidal soaps and monitor natural predators.'
            ],
            [
                'title' => 'Tomato Whitefly and Leaf Miner Attack',
                'location' => 'Central',
                'crop' => 'Vegetables',
                'severity' => 'Critical',
                'description' => 'Whitefly and leaf miner attack on tomatoes',
                'pest_name' => 'Whitefly and Leaf Miner',
                'affected_crops' => 'Tomato',
                'status' => 'active',
                'alert_date' => now(),
                'expiry_date' => now()->addDays(5),
                'recommendations' => 'Use insecticidal soaps and neem-based pesticides.'
            ],
            [
                'title' => 'Pink Bollworm Alert',
                'location' => 'Western',
                'crop' => 'Cotton',
                'severity' => 'High',
                'description' => 'Pink bollworm larvae in cotton bolls',
                'pest_name' => 'Pink Bollworm',
                'affected_crops' => 'Cotton',
                'status' => 'active',
                'alert_date' => now(),
                'expiry_date' => now()->addDays(10),
                'recommendations' => 'Use appropriate insecticides and monitor for signs of infestation.'
            ],
            [
                'title' => 'Late Blight Alert',
                'location' => 'Eastern',
                'crop' => 'Potatoes',
                'severity' => 'Medium',
                'description' => 'Early signs of late blight in potatoes',
                'pest_name' => 'Late Blight',
                'affected_crops' => 'Potato',
                'status' => 'active',
                'alert_date' => now(),
                'expiry_date' => now()->addDays(10),
                'recommendations' => 'Use fungicides and implement crop rotation.'
            ],
            [
                'title' => 'Mango Flower Drop Alert',
                'location' => 'Southern',
                'crop' => 'Fruits',
                'severity' => 'High',
                'description' => 'Mango hoppers causing flower drop',
                'pest_name' => 'Mango Hopper',
                'affected_crops' => 'Mango',
                'status' => 'active',
                'alert_date' => now(),
                'expiry_date' => now()->addDays(10),
                'recommendations' => 'Use appropriate pesticides and monitor for signs of infestation.'
            ],
            [
                'title' => 'Red Rot Disease Alert',
                'location' => 'Northern',
                'crop' => 'Sugarcane',
                'severity' => 'Critical',
                'description' => 'Red rot disease confirmed in fields',
                'pest_name' => 'Red Rot',
                'affected_crops' => 'Sugarcane',
                'status' => 'active',
                'alert_date' => now(),
                'expiry_date' => now()->addDays(10),
                'recommendations' => 'Use fungicides and implement crop rotation.'
            ],
            [
                'title' => 'Leaf Miner Activity Alert',
                'location' => 'Central',
                'crop' => 'Groundnut',
                'severity' => 'Medium',
                'description' => 'Leaf miner activity increasing',
                'pest_name' => 'Leaf Miner',
                'affected_crops' => 'Groundnut',
                'status' => 'active',
                'alert_date' => now(),
                'expiry_date' => now()->addDays(10),
                'recommendations' => 'Use appropriate pesticides and monitor for signs of infestation.'
            ],
            [
                'title' => 'Fusarium Wilt Alert',
                'location' => 'Eastern',
                'crop' => 'Banana',
                'severity' => 'Critical',
                'description' => 'Fusarium wilt detected in plantations',
                'pest_name' => 'Fusarium Wilt',
                'affected_crops' => 'Banana',
                'status' => 'active',
                'alert_date' => now(),
                'expiry_date' => now()->addDays(10),
                'recommendations' => 'Use fungicides and implement crop rotation.'
            ],
            [
                'title' => 'Thrips Damage Alert',
                'location' => 'Western',
                'crop' => 'Vegetables',
                'severity' => 'High',
                'description' => 'Thrips damaging chilli crops',
                'pest_name' => 'Thrips',
                'affected_crops' => 'Chilli',
                'status' => 'active',
                'alert_date' => now(),
                'expiry_date' => now()->addDays(10),
                'recommendations' => 'Use appropriate pesticides and monitor for signs of infestation.'
            ],
            [
                'title' => 'Mosquito Bug Population Alert',
                'location' => 'Southern',
                'crop' => 'Tea',
                'severity' => 'Medium',
                'description' => 'Mosquito bug populations rising',
                'pest_name' => 'Mosquito Bug',
                'affected_crops' => 'Tea',
                'status' => 'active',
                'alert_date' => now(),
                'expiry_date' => now()->addDays(10),
                'recommendations' => 'Use appropriate pesticides and monitor for signs of infestation.'
            ]
        ];

        foreach ($alerts as $alert) {
            PestAlert::create($alert);
        }
    }
}

