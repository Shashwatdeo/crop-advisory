@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Welcome Section -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Welcome back, {{ auth()->user()->name }}</h1>
                <p class="text-gray-600 mt-1">Here's what's happening with your farm advisory system today.</p>
            </div>
            <div class="text-sm text-gray-500">
                <i class="far fa-calendar-alt mr-1"></i> {{ now()->format('l, F j, Y') }}
            </div>
        </div>
    </div>
    
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="stat-card bg-white rounded-xl shadow-sm p-6 border border-gray-100 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Registered Farmers</p>
                    <p class="text-3xl font-bold text-blue-600 mt-2">{{ $farmersCount }}</p>
                    <p class="text-xs text-gray-500 mt-1">+{{ rand(2, 10) }}% from last month</p>
                </div>
                <div class="bg-blue-50 p-3 rounded-full">
                    <i class="fas fa-users text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="stat-card bg-white rounded-xl shadow-sm p-6 border border-gray-100 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Crop Suggestions</p>
                    <p class="text-3xl font-bold text-green-600 mt-2">{{ $cropSuggestionsCount }}</p>
                    <p class="text-xs text-gray-500 mt-1">+{{ rand(5, 15) }}% from last month</p>
                </div>
                <div class="bg-green-50 p-3 rounded-full">
                    <i class="fas fa-seedling text-green-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="stat-card bg-white rounded-xl shadow-sm p-6 border border-gray-100 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Pest Alerts</p>
                    <p class="text-3xl font-bold text-red-600 mt-2">{{ $pestAlertsCount }}</p>
                    <p class="text-xs text-gray-500 mt-1">{{ $pestAlertsCount > 0 ? 'Active alerts' : 'No active alerts' }}</p>
                </div>
                <div class="bg-red-50 p-3 rounded-full">
                    <i class="fas fa-bug text-red-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="stat-card bg-white rounded-xl shadow-sm p-6 border border-gray-100 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Weather Warnings</p>
                    <p class="text-3xl font-bold text-yellow-600 mt-2">{{ $weatherWarningsCount }}</p>
                    <p class="text-xs text-gray-500 mt-1">{{ $weatherWarningsCount > 0 ? 'Active warnings' : 'No warnings' }}</p>
                </div>
                <div class="bg-yellow-50 p-3 rounded-full">
                    <i class="fas fa-cloud-sun-rain text-yellow-600 text-xl"></i>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <a href="{{ route('admin.crops.index') }}" class="quick-action group bg-white rounded-xl shadow-sm p-6 border border-gray-100 transition-all duration-300 hover:border-blue-200">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600">Manage Crops</h3>
                <i class="fas fa-chevron-right text-gray-400 group-hover:text-blue-600 transition-colors"></i>
            </div>
            <p class="text-gray-600 text-sm">Add, edit, or delete crop information and recommendations</p>
            <div class="mt-4 flex items-center text-xs text-blue-500 font-medium">
                <span>View all crops</span>
                <i class="fas fa-arrow-right ml-1 text-xs"></i>
            </div>
        </a>
        
        <a href="{{ route('admin.pests.index') }}" class="quick-action group bg-white rounded-xl shadow-sm p-6 border border-gray-100 transition-all duration-300 hover:border-red-200">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800 group-hover:text-red-600">Manage Pest Alerts</h3>
                <i class="fas fa-chevron-right text-gray-400 group-hover:text-red-600 transition-colors"></i>
            </div>
            <p class="text-gray-600 text-sm">Create and manage pest alerts for farmers in your region</p>
            <div class="mt-4 flex items-center text-xs text-red-500 font-medium">
                <span>View pest alerts</span>
                <i class="fas fa-arrow-right ml-1 text-xs"></i>
            </div>
        </a>
        
        <a href="{{ route('admin.weather.index') }}" class="quick-action group bg-white rounded-xl shadow-sm p-6 border border-gray-100 transition-all duration-300 hover:border-yellow-200">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800 group-hover:text-yellow-600">Weather Alerts</h3>
                <i class="fas fa-chevron-right text-gray-400 group-hover:text-yellow-600 transition-colors"></i>
            </div>
            <p class="text-gray-600 text-sm">Set up weather warnings and advisories for farmers</p>
            <div class="mt-4 flex items-center text-xs text-yellow-500 font-medium">
                <span>View weather alerts</span>
                <i class="fas fa-arrow-right ml-1 text-xs"></i>
            </div>
        </a>
        
        <a href="{{ route('admin.users.index') }}" class="quick-action group bg-white rounded-xl shadow-sm p-6 border border-gray-100 transition-all duration-300 hover:border-green-200">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800 group-hover:text-green-600">Manage Users</h3>
                <i class="fas fa-chevron-right text-gray-400 group-hover:text-green-600 transition-colors"></i>
            </div>
            <p class="text-gray-600 text-sm">View and manage farmer accounts and permissions</p>
            <div class="mt-4 flex items-center text-xs text-green-500 font-medium">
                <span>View all users</span>
                <i class="fas fa-arrow-right ml-1 text-xs"></i>
            </div>
        </a>
    </div>
    
    <!-- Recent Activity Section -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-lg font-semibold text-gray-800">Recent Activity</h2>
            <a href="#" class="text-sm text-blue-600 hover:text-blue-800">View all</a>
        </div>
        <div class="space-y-4">
            <div class="flex items-start">
                <div class="flex-shrink-0 bg-blue-50 p-2 rounded-full">
                    <i class="fas fa-user-plus text-blue-600"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900">New farmer registered</p>
                    <p class="text-sm text-gray-500">John Doe registered 2 hours ago</p>
                </div>
                <div class="ml-auto text-xs text-gray-500">2h ago</div>
            </div>
            <div class="flex items-start">
                <div class="flex-shrink-0 bg-green-50 p-2 rounded-full">
                    <i class="fas fa-seedling text-green-600"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900">New crop added</p>
                    <p class="text-sm text-gray-500">You added "Drought-resistant Maize" to the database</p>
                </div>
                <div class="ml-auto text-xs text-gray-500">5h ago</div>
            </div>
            <div class="flex items-start">
                <div class="flex-shrink-0 bg-red-50 p-2 rounded-full">
                    <i class="fas fa-bug text-red-600"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900">Pest alert created</p>
                    <p class="text-sm text-gray-500">New alert for Fall Armyworm in Northern region</p>
                </div>
                <div class="ml-auto text-xs text-gray-500">1d ago</div>
            </div>
        </div>
    </div>
</div>
@endsection