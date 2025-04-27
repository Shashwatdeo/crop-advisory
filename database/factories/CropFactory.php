<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CropFactory extends Factory
{
    protected $model = \App\Models\Crop::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word,
            'season' => $this->faker->randomElement(['summer', 'winter', 'rainy']),
            'water_requirement' => $this->faker->sentence,
            'temperature_range' => $this->faker->numberBetween(10, 40) . '°C - ' . $this->faker->numberBetween(41, 50) . '°C',
        ];
    }
} 