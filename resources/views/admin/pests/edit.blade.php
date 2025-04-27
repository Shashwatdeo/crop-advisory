@extends('admin.layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Edit Pest Alert</h1>
        <a href="{{ route('admin.pests.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Back to List
        </a>
    </div>

    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <form action="{{ route('admin.pests.update', $pest) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                    Title
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') border-red-500 @enderror"
                    id="title" type="text" name="title" value="{{ old('title', $pest->title) }}" required>
                @error('title')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                    Description
                </label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description') border-red-500 @enderror"
                    id="description" name="description" rows="4" required>{{ old('description', $pest->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="pest_name">
                    Pest Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('pest_name') border-red-500 @enderror"
                    id="pest_name" type="text" name="pest_name" value="{{ old('pest_name', $pest->pest_name) }}" required>
                @error('pest_name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="affected_crops">
                    Affected Crops
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('affected_crops') border-red-500 @enderror"
                    id="affected_crops" type="text" name="affected_crops" value="{{ old('affected_crops', $pest->affected_crops) }}" required>
                @error('affected_crops')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="severity">
                    Severity
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('severity') border-red-500 @enderror"
                    id="severity" name="severity" required>
                    <option value="low" {{ old('severity', $pest->severity) === 'low' ? 'selected' : '' }}>Low</option>
                    <option value="medium" {{ old('severity', $pest->severity) === 'medium' ? 'selected' : '' }}>Medium</option>
                    <option value="high" {{ old('severity', $pest->severity) === 'high' ? 'selected' : '' }}>High</option>
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
                    <option value="active" {{ old('status', $pest->status) === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="resolved" {{ old('status', $pest->status) === 'resolved' ? 'selected' : '' }}>Resolved</option>
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
                    id="alert_date" type="date" name="alert_date" value="{{ old('alert_date', $pest->alert_date->format('Y-m-d')) }}" required>
                @error('alert_date')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="expiry_date">
                    Expiry Date (Optional)
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('expiry_date') border-red-500 @enderror"
                    id="expiry_date" type="date" name="expiry_date" value="{{ old('expiry_date', $pest->expiry_date ? $pest->expiry_date->format('Y-m-d') : '') }}">
                @error('expiry_date')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Update Pest Alert
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 