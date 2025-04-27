@extends('admin.layout')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Edit Weather Alert</h2>
                    <p class="mt-1 text-sm text-gray-600">Update the weather alert information below.</p>
                </div>

                <form action="{{ route('admin.weather.update', $weather) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $weather->title) }}" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="4" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description', $weather->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="alert_type" class="block text-sm font-medium text-gray-700">Alert Type</label>
                            <select name="alert_type" id="alert_type" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="rain" {{ old('alert_type', $weather->alert_type) == 'rain' ? 'selected' : '' }}>Rain</option>
                                <option value="storm" {{ old('alert_type', $weather->alert_type) == 'storm' ? 'selected' : '' }}>Storm</option>
                                <option value="drought" {{ old('alert_type', $weather->alert_type) == 'drought' ? 'selected' : '' }}>Drought</option>
                                <option value="heat_wave" {{ old('alert_type', $weather->alert_type) == 'heat_wave' ? 'selected' : '' }}>Heat Wave</option>
                            </select>
                            @error('alert_type')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="severity" class="block text-sm font-medium text-gray-700">Severity</label>
                            <select name="severity" id="severity" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="low" {{ old('severity', $weather->severity) == 'low' ? 'selected' : '' }}>Low</option>
                                <option value="medium" {{ old('severity', $weather->severity) == 'medium' ? 'selected' : '' }}>Medium</option>
                                <option value="high" {{ old('severity', $weather->severity) == 'high' ? 'selected' : '' }}>High</option>
                            </select>
                            @error('severity')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" id="status" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="active" {{ old('status', $weather->status) == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status', $weather->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="alert_date" class="block text-sm font-medium text-gray-700">Alert Date</label>
                            <input type="date" name="alert_date" id="alert_date" value="{{ old('alert_date', $weather->alert_date->format('Y-m-d')) }}" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('alert_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="expiry_date" class="block text-sm font-medium text-gray-700">Expiry Date (Optional)</label>
                            <input type="date" name="expiry_date" id="expiry_date" value="{{ old('expiry_date', $weather->expiry_date ? $weather->expiry_date->format('Y-m-d') : '') }}" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('expiry_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="affected_areas" class="block text-sm font-medium text-gray-700">Affected Areas</label>
                            <select name="affected_areas" id="affected_areas" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="Northern Region" {{ old('affected_areas', $weather->affected_areas) == 'Northern Region' ? 'selected' : '' }}>Northern Region</option>
                                <option value="Central Region" {{ old('affected_areas', $weather->affected_areas) == 'Central Region' ? 'selected' : '' }}>Central Region</option>
                                <option value="Southern Region" {{ old('affected_areas', $weather->affected_areas) == 'Southern Region' ? 'selected' : '' }}>Southern Region</option>
                            </select>
                            @error('affected_areas')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end">
                        <a href="{{ route('admin.weather.index') }}" 
                            class="bg-gray-100 text-gray-700 px-4 py-2 rounded-md text-sm font-medium hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            Cancel
                        </a>
                        <button type="submit" 
                            class="ml-3 bg-indigo-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Update Weather Alert
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 