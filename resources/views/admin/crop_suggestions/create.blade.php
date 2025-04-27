@extends('admin.layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Add New Crop Suggestion</h1>
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
        <form action="{{ route('admin.crop-suggestions.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="crop_name" class="block text-sm font-medium text-gray-700">Crop Name</label>
                    <input type="text" name="crop_name" id="crop_name" value="{{ old('crop_name') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                </div>

                <div>
                    <label for="region" class="block text-sm font-medium text-gray-700">Region</label>
                    <input type="text" name="region" id="region" value="{{ old('region') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                </div>

                <div>
                    <label for="soil_type" class="block text-sm font-medium text-gray-700">Soil Type</label>
                    <input type="text" name="soil_type" id="soil_type" value="{{ old('soil_type') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                </div>

                <div>
                    <label for="season" class="block text-sm font-medium text-gray-700">Season</label>
                    <select name="season" id="season" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        <option value="">Select Season</option>
                        <option value="spring" {{ old('season') == 'spring' ? 'selected' : '' }}>Spring</option>
                        <option value="summer" {{ old('season') == 'summer' ? 'selected' : '' }}>Summer</option>
                        <option value="autumn" {{ old('season') == 'autumn' ? 'selected' : '' }}>Autumn</option>
                        <option value="winter" {{ old('season') == 'winter' ? 'selected' : '' }}>Winter</option>
                    </select>
                </div>

                <div>
                    <label for="water_availability" class="block text-sm font-medium text-gray-700">Water Availability</label>
                    <select name="water_availability" id="water_availability" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        <option value="">Select Water Availability</option>
                        <option value="low" {{ old('water_availability') == 'low' ? 'selected' : '' }}>Low</option>
                        <option value="medium" {{ old('water_availability') == 'medium' ? 'selected' : '' }}>Medium</option>
                        <option value="high" {{ old('water_availability') == 'high' ? 'selected' : '' }}>High</option>
                    </select>
                </div>

                <div>
                    <label for="profit_potential" class="block text-sm font-medium text-gray-700">Profit Potential</label>
                    <input type="text" name="profit_potential" id="profit_potential" value="{{ old('profit_potential') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <div>
                    <label for="growth_duration" class="block text-sm font-medium text-gray-700">Growth Duration (days)</label>
                    <input type="number" name="growth_duration" id="growth_duration" value="{{ old('growth_duration') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Crop Image</label>
                    <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                </div>
            </div>

            <div class="mt-6">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description') }}</textarea>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">
                    Create Crop Suggestion
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 