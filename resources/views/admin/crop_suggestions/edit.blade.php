@extends('admin.layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Edit Crop Suggestion</h1>
        <a href="{{ route('admin.crop-suggestions.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
            Back to List
        </a>
    </div>

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.crop-suggestions.update', $cropSuggestion) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="crop_name" class="block text-sm font-medium text-gray-700">Crop Name</label>
                    <input type="text" name="crop_name" id="crop_name" value="{{ old('crop_name', $cropSuggestion->crop_name) }}" 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>

                <div>
                    <label for="region" class="block text-sm font-medium text-gray-700">Region</label>
                    <input type="text" name="region" id="region" value="{{ old('region', $cropSuggestion->region) }}" 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>

                <div>
                    <label for="soil_type" class="block text-sm font-medium text-gray-700">Soil Type</label>
                    <input type="text" name="soil_type" id="soil_type" value="{{ old('soil_type', $cropSuggestion->soil_type) }}" 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>

                <div>
                    <label for="season" class="block text-sm font-medium text-gray-700">Season</label>
                    <select name="season" id="season" 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        <option value="">Select Season</option>
                        <option value="spring" {{ old('season', $cropSuggestion->season) == 'spring' ? 'selected' : '' }}>Spring</option>
                        <option value="summer" {{ old('season', $cropSuggestion->season) == 'summer' ? 'selected' : '' }}>Summer</option>
                        <option value="autumn" {{ old('season', $cropSuggestion->season) == 'autumn' ? 'selected' : '' }}>Autumn</option>
                        <option value="winter" {{ old('season', $cropSuggestion->season) == 'winter' ? 'selected' : '' }}>Winter</option>
                    </select>
                </div>

                <div>
                    <label for="water_availability" class="block text-sm font-medium text-gray-700">Water Availability</label>
                    <select name="water_availability" id="water_availability" 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        <option value="">Select Water Availability</option>
                        <option value="low" {{ old('water_availability', $cropSuggestion->water_availability) == 'low' ? 'selected' : '' }}>Low</option>
                        <option value="medium" {{ old('water_availability', $cropSuggestion->water_availability) == 'medium' ? 'selected' : '' }}>Medium</option>
                        <option value="high" {{ old('water_availability', $cropSuggestion->water_availability) == 'high' ? 'selected' : '' }}>High</option>
                    </select>
                </div>

                <div>
                    <label for="profit_potential" class="block text-sm font-medium text-gray-700">Profit Potential</label>
                    <input type="text" name="profit_potential" id="profit_potential" value="{{ old('profit_potential', $cropSuggestion->profit_potential) }}" 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div>
                    <label for="growth_duration" class="block text-sm font-medium text-gray-700">Growth Duration (days)</label>
                    <input type="number" name="growth_duration" id="growth_duration" value="{{ old('growth_duration', $cropSuggestion->growth_duration) }}" 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Crop Image</label>
                    @if($cropSuggestion->image_url)
                        <div class="mt-2">
                            <img src="{{ $cropSuggestion->image_url }}" alt="{{ $cropSuggestion->crop_name }}" class="h-20 w-20 object-cover rounded">
                            <p class="text-sm text-gray-500 mt-1">Current image</p>
                        </div>
                    @endif
                    <input type="file" name="image" id="image" 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
            </div>

            <div class="mt-6">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4" 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('description', $cropSuggestion->description) }}</textarea>
            </div>

            <div class="mt-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Update Crop Suggestion
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 