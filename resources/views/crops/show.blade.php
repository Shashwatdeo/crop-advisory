@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Crop Image Section -->
            <div class="relative h-64 md:h-80 overflow-hidden">
                <img src="{{ $crop->image_url ?? '/images/crop/' . strtolower($crop->name) . '.jpg' }}" 
                     alt="{{ $crop->name }}" 
                     class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                <div class="absolute bottom-4 left-4">
                    <h1 class="text-3xl font-bold text-white">{{ $crop->name }}</h1>
                    <span class="bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full text-sm font-medium">
                        {{ ucfirst($crop->season) }} Season
                    </span>
                </div>
            </div>
            
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <h2 class="text-lg font-semibold mb-2">Water Requirement</h2>
                        <p class="text-gray-600">{{ $crop->water_requirement }}</p>
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold mb-2">Temperature Range</h2>
                        <p class="text-gray-600">{{ $crop->temperature_range }}</p>
                    </div>
                </div>

                <div class="mb-6">
                    <h2 class="text-lg font-semibold mb-2">Description</h2>
                    <p class="text-gray-700">{{ $crop->description }}</p>
                </div>

                <div class="flex justify-between items-center">
                    <a href="{{ route('crops.index') }}" 
                       class="text-indigo-600 hover:text-indigo-800">
                        ← Back to Crops
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection