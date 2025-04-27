@extends('admin.layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">{{ isset($crop) ? 'Edit Crop' : 'Add New Crop' }}</h1>

        <form action="{{ isset($crop) ? route('admin.crops.update', $crop) : route('admin.crops.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf
            @if(isset($crop))
                @method('PUT')
            @endif

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Crop Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $crop->name ?? '') }}" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="season" class="block text-gray-700 text-sm font-bold mb-2">Season</label>
                <select name="season" id="season" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('season') border-red-500 @enderror">
                    <option value="">Select Season</option>
                    <option value="summer" {{ old('season', $crop->season ?? '') == 'summer' ? 'selected' : '' }}>Summer</option>
                    <option value="winter" {{ old('season', $crop->season ?? '') == 'winter' ? 'selected' : '' }}>Winter</option>
                    <option value="rainy" {{ old('season', $crop->season ?? '') == 'rainy' ? 'selected' : '' }}>Rainy</option>
                </select>
                @error('season')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="water_requirement" class="block text-gray-700 text-sm font-bold mb-2">Water Requirement</label>
                <input type="text" name="water_requirement" id="water_requirement" value="{{ old('water_requirement', $crop->water_requirement ?? '') }}" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('water_requirement') border-red-500 @enderror">
                @error('water_requirement')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="temperature_range" class="block text-gray-700 text-sm font-bold mb-2">Temperature Range</label>
                <input type="text" name="temperature_range" id="temperature_range" value="{{ old('temperature_range', $crop->temperature_range ?? '') }}" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('temperature_range') border-red-500 @enderror">
                @error('temperature_range')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('admin.crops.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                    Cancel
                </a>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                    {{ isset($crop) ? 'Update Crop' : 'Add Crop' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 