@extends('admin.layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Create New Weather Alert</h1>
        <a href="{{ route('admin.weather.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Back to List
        </a>
    </div>

    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <form action="{{ route('admin.weather.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                    Title
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') border-red-500 @enderror"
                    id="title" type="text" name="title" value="{{ old('title') }}" required>
                @error('title')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                    Description
                </label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description') border-red-500 @enderror"
                    id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="region">
                    Region
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('region') border-red-500 @enderror"
                    id="region" name="region" required>
                    <option value="">Select Region</option>
                    <option value="Northern Region" {{ old('region') === 'Northern Region' ? 'selected' : '' }}>Northern Region</option>
                    <option value="Central Region" {{ old('region') === 'Central Region' ? 'selected' : '' }}>Central Region</option>
                    <option value="Southern Region" {{ old('region') === 'Southern Region' ? 'selected' : '' }}>Southern Region</option>
                </select>
                @error('region')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="alert_type">
                    Alert Type
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('alert_type') border-red-500 @enderror"
                    id="alert_type" name="alert_type" required>
                    <option value="rain" {{ old('alert_type') === 'rain' ? 'selected' : '' }}>Rain</option>
                    <option value="drought" {{ old('alert_type') === 'drought' ? 'selected' : '' }}>Drought</option>
                    <option value="storm" {{ old('alert_type') === 'storm' ? 'selected' : '' }}>Storm</option>
                    <option value="flood" {{ old('alert_type') === 'flood' ? 'selected' : '' }}>Flood</option>
                    <option value="heatwave" {{ old('alert_type') === 'heatwave' ? 'selected' : '' }}>Heatwave</option>
                    <option value="frost" {{ old('alert_type') === 'frost' ? 'selected' : '' }}>Frost</option>
                </select>
                @error('alert_type')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="severity">
                    Severity
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('severity') border-red-500 @enderror"
                    id="severity" name="severity" required>
                    <option value="low" {{ old('severity') === 'low' ? 'selected' : '' }}>Low</option>
                    <option value="medium" {{ old('severity') === 'medium' ? 'selected' : '' }}>Medium</option>
                    <option value="high" {{ old('severity') === 'high' ? 'selected' : '' }}>High</option>
                </select>
                @error('severity')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="status">
                    Status
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('status') border-red-500 @enderror"
                    id="status" name="status" required>
                    <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="resolved" {{ old('status') === 'resolved' ? 'selected' : '' }}>Resolved</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="alert_date">
                    Alert Date
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('alert_date') border-red-500 @enderror"
                    id="alert_date" type="date" name="alert_date" value="{{ old('alert_date') }}" required>
                @error('alert_date')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="expiry_date">
                    Expiry Date (Optional)
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('expiry_date') border-red-500 @enderror"
                    id="expiry_date" type="date" name="expiry_date" value="{{ old('expiry_date') }}">
                @error('expiry_date')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="affected_areas">
                    Affected Areas
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('affected_areas') border-red-500 @enderror"
                    id="affected_areas" type="text" name="affected_areas" value="{{ old('affected_areas') }}" required>
                @error('affected_areas')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Create Weather Alert
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 