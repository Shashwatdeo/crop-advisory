<?php

namespace Database\Seeders;

use App\Models\CropSuggestion;
use Illuminate\Database\Seeder;

class CropSuggestionSeeder extends Seeder
{
    public function run()
    {
        $suggestions = [
            [
                'crop_name' => 'Rice',
                'region' => 'Northern Highlands',
                'soil_type' => 'Clay',
                'season' => 'Summer (Jun-Aug)',
                'water_availability' => 'High (Irrigation available)',
                'profit_potential' => 'High',
                'growth_duration' => 120,
                'description' => 'Rice is a staple food crop that requires plenty of water and warm temperatures. Best grown in clay soil with good water retention.',
                'image_url' => '/images/crop/rice.jpg',
            ],
            [
                'crop_name' => 'Wheat',
                'region' => 'Central Valley',
                'soil_type' => 'Sandy',
                'season' => 'Winter (Dec-Feb)',
                'water_availability' => 'Moderate (Limited irrigation)',
                'profit_potential' => 'Medium',
                'growth_duration' => 150,
                'description' => 'Wheat is a winter crop that grows well in sandy soil. Requires moderate water and cooler temperatures.',
                'image_url' => '/images/crop/wheat.jpg',
            ],
            [
                'crop_name' => 'Maize',
                'region' => 'Southern Plains',
                'soil_type' => 'Loamy',
                'season' => 'Summer (Jun-Aug)',
                'water_availability' => 'Moderate (Limited irrigation)',
                'profit_potential' => 'High',
                'growth_duration' => 90,
                'description' => 'Maize is a summer crop that grows well in loamy soil. Requires moderate water and warm temperatures.',
                'image_url' => '/images/crop/maize.jpg',
            ],
            [
                'crop_name' => 'Potato',
                'region' => 'Northern Highlands',
                'soil_type' => 'Sandy',
                'season' => 'Spring (Mar-May)',
                'water_availability' => 'Moderate (Limited irrigation)',
                'profit_potential' => 'High',
                'growth_duration' => 100,
                'description' => 'Potatoes grow well in sandy soil with good drainage. Best planted in spring with moderate water requirements.',
                'image_url' => '/images/crop/potato.jpg',
            ],
            [
                'crop_name' => 'Tomato',
                'region' => 'Central Valley',
                'soil_type' => 'Loamy',
                'season' => 'Summer (Jun-Aug)',
                'water_availability' => 'High (Irrigation available)',
                'profit_potential' => 'High',
                'growth_duration' => 75,
                'description' => 'Tomatoes require well-drained loamy soil and plenty of water. Best grown in summer with full sunlight.',
                'image_url' => '/images/crop/tomato.jpg',
            ],
            [
                'crop_name' => 'Cotton',
                'region' => 'Southern Plains',
                'soil_type' => 'Sandy',
                'season' => 'Summer (Jun-Aug)',
                'water_availability' => 'Moderate (Limited irrigation)',
                'profit_potential' => 'High',
                'growth_duration' => 180,
                'description' => 'Cotton is a summer crop that thrives in sandy soil. Requires moderate water and warm temperatures.',
                'image_url' => '/images/crop/cotton.jpg',
            ],
            [
                'crop_name' => 'Sugarcane',
                'region' => 'Northern Highlands',
                'soil_type' => 'Clay',
                'season' => 'Summer (Jun-Aug)',
                'water_availability' => 'High (Irrigation available)',
                'profit_potential' => 'High',
                'growth_duration' => 365,
                'description' => 'Sugarcane requires clay soil with high water availability. Best grown in summer with plenty of water.',
                'image_url' => '/images/crop/sugarcane.jpg',
            ],
            [
                'crop_name' => 'Barley',
                'region' => 'Central Valley',
                'soil_type' => 'Sandy',
                'season' => 'Winter (Dec-Feb)',
                'water_availability' => 'Low (Rainfed only)',
                'profit_potential' => 'Medium',
                'growth_duration' => 120,
                'description' => 'Barley is a winter crop that can grow in sandy soil with low water availability. Tolerant to cold temperatures.',
                'image_url' => '/images/crop/barley.jpg',
            ],
            [
                'crop_name' => 'Soybean',
                'region' => 'Southern Plains',
                'soil_type' => 'Loamy',
                'season' => 'Summer (Jun-Aug)',
                'water_availability' => 'Moderate (Limited irrigation)',
                'profit_potential' => 'High',
                'growth_duration' => 100,
                'description' => 'Soybeans grow well in loamy soil during summer. Requires moderate water and warm temperatures.',
                'image_url' => '/images/crop/soybean.jpg',
            ],
            [
                'crop_name' => 'Chickpea',
                'region' => 'Northern Highlands',
                'soil_type' => 'Sandy',
                'season' => 'Winter (Dec-Feb)',
                'water_availability' => 'Low (Rainfed only)',
                'profit_potential' => 'Medium',
                'growth_duration' => 120,
                'description' => 'Chickpeas are winter crops that can grow in sandy soil with low water availability.',
                'image_url' => '/images/crop/chickpea.jpg',
            ]
        ];

        foreach ($suggestions as $suggestion) {
            CropSuggestion::create($suggestion);
        }
    }
}