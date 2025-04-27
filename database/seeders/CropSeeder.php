<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Crop;

class CropSeeder extends Seeder
{
    public function run()
    {
        // First, truncate the crops table to avoid duplicates
        Crop::truncate();

        $crops = [
            [
                'name' => 'Rice',
                'season' => 'rainy',
                'water_requirement' => 'High water requirement, needs standing water',
                'temperature_range' => '20°C - 35°C',
                'description' => 'Rice is a cereal grain and is the most widely consumed staple food for a large part of the world\'s human population.',
                'region' => 'Tropical and Subtropical regions',
                'soil_type' => 'Clay or clay loam soil',
            ],
            [
                'name' => 'Wheat',
                'season' => 'winter',
                'water_requirement' => 'Moderate water requirement',
                'temperature_range' => '15°C - 25°C',
                'description' => 'Wheat is a grass widely cultivated for its seed, a cereal grain which is a worldwide staple food.',
                'region' => 'Temperate regions',
                'soil_type' => 'Well-drained loamy soil',
            ],
            [
                'name' => 'Maize',
                'season' => 'summer',
                'water_requirement' => 'Moderate to high water requirement',
                'temperature_range' => '18°C - 32°C',
                'description' => 'Maize, also known as corn, is a cereal grain first domesticated by indigenous peoples in southern Mexico.',
                'region' => 'Tropical and Subtropical regions',
                'soil_type' => 'Well-drained fertile soil',
            ],
            [
                'name' => 'Sugarcane',
                'season' => 'summer',
                'water_requirement' => 'High water requirement',
                'temperature_range' => '25°C - 35°C',
                'description' => 'Sugarcane is a perennial grass that is cultivated for the production of sugar.',
                'region' => 'Tropical regions',
                'soil_type' => 'Deep, well-drained soil',
            ],
            [
                'name' => 'Groundnut',
                'season' => 'summer',
                'water_requirement' => 'Moderate water requirement',
                'temperature_range' => '20°C - 30°C',
                'description' => 'Groundnut, also known as peanut, is a legume crop grown mainly for its edible seeds.',
                'region' => 'Tropical and Subtropical regions',
                'soil_type' => 'Sandy loam soil',
            ],
            [
                'name' => 'Onion',
                'season' => 'winter',
                'water_requirement' => 'Moderate water requirement',
                'temperature_range' => '15°C - 25°C',
                'description' => 'Onion is a vegetable that is the most widely cultivated species of the genus Allium.',
                'region' => 'Temperate regions',
                'soil_type' => 'Well-drained fertile soil',
            ],
            [
                'name' => 'Potato',
                'season' => 'winter',
                'water_requirement' => 'Moderate water requirement',
                'temperature_range' => '15°C - 25°C',
                'description' => 'Potato is a starchy tuber of the plant Solanum tuberosum and is a root vegetable native to the Americas.',
                'region' => 'Temperate regions',
                'soil_type' => 'Well-drained sandy loam',
            ],
            [
                'name' => 'Pulses',
                'season' => 'winter',
                'water_requirement' => 'Low water requirement',
                'temperature_range' => '15°C - 25°C',
                'description' => 'Pulses are the edible seeds of plants in the legume family.',
                'region' => 'Various regions',
                'soil_type' => 'Well-drained soil',
            ],
            [
                'name' => 'Spinach',
                'season' => 'winter',
                'water_requirement' => 'Moderate water requirement',
                'temperature_range' => '10°C - 20°C',
                'description' => 'Spinach is a leafy green flowering plant native to central and western Asia.',
                'region' => 'Temperate regions',
                'soil_type' => 'Rich, well-drained soil',
            ],
            [
                'name' => 'Tomato',
                'season' => 'summer',
                'water_requirement' => 'Moderate water requirement',
                'temperature_range' => '20°C - 30°C',
                'description' => 'Tomato is the edible berry of the plant Solanum lycopersicum, commonly known as a tomato plant.',
                'region' => 'Various regions',
                'soil_type' => 'Well-drained fertile soil',
            ],
            [
                'name' => 'Bell Peppers',
                'season' => 'summer',
                'water_requirement' => 'Moderate water requirement',
                'temperature_range' => '18°C - 30°C',
                'description' => 'Bell peppers are colorful, nutritious vegetables that are part of the nightshade family.',
                'region' => 'Temperate and Subtropical regions',
                'soil_type' => 'Well-drained, fertile soil',
            ],
            [
                'name' => 'Cotton',
                'season' => 'Kharif',
                'water_requirement' => 'Moderate',
                'temperature_range' => '25-35°C',
                'description' => 'A soft, fluffy staple fiber that grows in a boll around the seeds of the cotton plants.',
                'region' => 'North, Central',
                'soil_type' => 'Black, Alluvial'
            ],
            [
                'name' => 'Mango',
                'season' => 'Summer',
                'water_requirement' => 'Moderate to High',
                'temperature_range' => '24-30°C',
                'description' => 'A tropical fruit known for its sweet taste and rich nutritional value. Requires well-drained soil and proper spacing.',
                'region' => 'North, South, Central',
                'soil_type' => 'Loamy, Alluvial'
            ],
            [
                'name' => 'Mustard',
                'season' => 'Rabi',
                'water_requirement' => 'Low to Moderate',
                'temperature_range' => '20-25°C',
                'description' => 'An important oilseed crop used for oil extraction and as a spice. Tolerant to frost and cold weather.',
                'region' => 'North, Central',
                'soil_type' => 'Loamy, Clay'
            ]
        ];

        foreach ($crops as $crop) {
            Crop::create($crop);
        }
    }
}
