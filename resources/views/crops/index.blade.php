@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Hero Section -->
    <div class="crop-hero rounded-xl mb-10 animate-fade-in">
        <div class="crop-hero-content">
            <div>
                <h1 class="crop-hero-title">Discover the Perfect Crops</h1>
                <p class="crop-hero-subtitle">Find the ideal plants for your farm based on season and conditions</p>
            </div>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="filter-section animate-fade-in" style="animation-delay: 0.2s">
        <h2 class="filter-title">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
            </svg>
            Filter Crops
        </h2>
        <form action="{{ route('crops.index') }}" method="GET" class="filter-grid">
            <div class="filter-group">
                <label for="season" class="filter-label">Season</label>
                <select id="season" name="season" class="filter-select">
                    <option value="">All Seasons</option>
                    <option value="spring" {{ request('season') === 'spring' ? 'selected' : '' }}>Spring</option>
                    <option value="summer" {{ request('season') === 'summer' ? 'selected' : '' }}>Summer</option>
                    <option value="autumn" {{ request('season') === 'autumn' ? 'selected' : '' }}>Autumn</option>
                    <option value="winter" {{ request('season') === 'winter' ? 'selected' : '' }}>Winter</option>
                </select>
            </div>
            <div class="filter-group">
                <label for="water" class="filter-label">Water Needs</label>
                <select id="water" name="water" class="filter-select">
                    <option value="">Any Water Level</option>
                    <option value="low" {{ request('water') === 'low' ? 'selected' : '' }}>Low</option>
                    <option value="medium" {{ request('water') === 'medium' ? 'selected' : '' }}>Medium</option>
                    <option value="high" {{ request('water') === 'high' ? 'selected' : '' }}>High</option>
                </select>
            </div>
            <div class="filter-group">
                <label for="temperature" class="filter-label">Temperature</label>
                <select id="temperature" name="temperature" class="filter-select">
                    <option value="">Any Temperature</option>
                    <option value="cool" {{ request('temperature') === 'cool' ? 'selected' : '' }}>Cool</option>
                    <option value="moderate" {{ request('temperature') === 'moderate' ? 'selected' : '' }}>Moderate</option>
                    <option value="warm" {{ request('temperature') === 'warm' ? 'selected' : '' }}>Warm</option>
                </select>
            </div>
            <div class="filter-group">
                <label for="sort" class="filter-label">Sort By</label>
                <select id="sort" name="sort" class="filter-select">
                    <option value="name" {{ request('sort') === 'name' ? 'selected' : '' }}>Name (A-Z)</option>
                    <option value="season" {{ request('sort') === 'season' ? 'selected' : '' }}>Season</option>
                    <option value="water_requirement" {{ request('sort') === 'water_requirement' ? 'selected' : '' }}>Water Needs</option>
                </select>
            </div>
            <div class="filter-group col-span-full flex justify-end">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition-colors">
                    Apply Filters
                </button>
            </div>
        </form>
    </div>

    <!-- Results Count -->
    <div class="flex justify-between items-center mb-6 animate-fade-in" style="animation-delay: 0.3s">
        <h2 class="text-2xl font-semibold text-gray-800">
            Available Crops <span class="text-gray-500 text-lg">({{ $crops->total() }} results)</span>
        </h2>
        <div class="flex items-center space-x-2">
            <span class="text-sm text-gray-600">View:</span>
            <button class="p-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
            </button>
            <button class="p-2 rounded-lg bg-indigo-100 text-indigo-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Crops Grid -->
    @if($crops->count() > 0)
        <div class="crop-grid">
            @foreach($crops as $index => $crop)
                <div class="crop-card animate-fade-in" style="animation-delay: {{ 0.4 + ($index * 0.1) }}s">
                    <!-- Seasonal Badge -->
                    <div class="seasonal-badge {{ $crop->season }}-badge">
                        {{ ucfirst($crop->season) }}
                    </div>
                    
                    <!-- Crop Image -->
                    <div class="relative overflow-hidden h-48">
                        <img src="{{ $crop->image_url ?? '/images/crop/' . strtolower($crop->name) . '.jpg' }}" 
                             alt="{{ $crop->name }}" 
                             class="crop-card-image w-full h-full object-cover">
                    </div>
                    
                    <!-- Crop Content -->
                    <div class="crop-card-content">
                        <h3 class="crop-card-title">{{ $crop->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($crop->description, 100) }}</p>
                        
                        <div class="crop-card-details">
                            <div class="crop-detail-item">
                                <span class="crop-detail-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <span>{{ ucfirst($crop->season) }}</span>
                            </div>
                            <div class="crop-detail-item">
                                <span class="crop-detail-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.2 9.4a1 1 0 011.6 0l4 5.33a1 1 0 11-1.6 1.2L8 11.67 4.8 16a1 1 0 01-1.6-1.2l4-5.33zm8-4a1 1 0 011.6 0l4 5.33a1 1 0 11-1.6 1.2L16 7.67 12.8 12a1 1 0 01-1.6-1.2l4-5.33z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <span>{{ $crop->water_requirement }}</span>
                            </div>
                            <div class="crop-detail-item">
                                <span class="crop-detail-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.653 16.915l-.005-.003-.019-.01a20.759 20.759 0 01-1.162-.682 22.045 22.045 0 01-2.582-1.9C4.045 12.733 2 10.352 2 7.5a4.5 4.5 0 018-2.828A4.5 4.5 0 0118 7.5c0 2.852-2.044 5.233-3.885 6.82a22.049 22.049 0 01-3.744 2.582l-.019.01-.005.003h-.002a.739.739 0 01-.69.001l-.002-.001z" />
                                    </svg>
                                </span>
                                <span>{{ $crop->temperature_range }}</span>
                            </div>
                            <div class="crop-detail-item">
                                <span class="crop-detail-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4 5a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V7a2 2 0 00-2-2h-1.586a1 1 0 01-.707-.293l-1.121-1.121A2 2 0 0011.172 3H8.828a2 2 0 00-1.414.586L6.293 4.707A1 1 0 015.586 5H4zm6 9a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <span>View Details</span>
                            </div>
                        </div>
                        
                        <a href="{{ route('crops.show', $crop) }}" 
                           class="btn-primary mt-4 inline-flex items-center justify-center px-4 py-2 rounded-lg">
                            <span>Explore</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <!-- Empty State -->
        <div class="empty-state animate-fade-in" style="animation-delay: 0.3s">
            <div class="empty-state-icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h3 class="empty-state-text font-bold mb-2">No Crops Found</h3>
            <p class="text-gray-600 mb-4">Try adjusting your filters or come back later</p>
            <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                Reset Filters
            </button>
        </div>
    @endif

    <!-- Pagination -->
    <div class="mt-10 animate-fade-in" style="animation-delay: 0.5s">
        {{ $crops->links() }}
    </div>
</div>
@endsection