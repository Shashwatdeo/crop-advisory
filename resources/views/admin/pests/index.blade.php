@extends('admin.layout')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Pest Alerts Management</h1>
            <p class="text-gray-600 mt-1">Monitor and manage pest alerts for farmers</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
            <a href="{{ route('admin.pests.create') }}" 
               class="inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-red-600 to-red-500 text-white rounded-lg hover:from-red-700 hover:to-red-600 transition-all shadow-md">
                <i class="fas fa-bug mr-2"></i>
                Create New Alert
            </a>
            <div class="relative">
                <input type="text" placeholder="Search alerts..." 
                       class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
            </div>
        </div>
    </div>

    <!-- Success Notification -->
    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-r-lg flex items-start">
            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
            <div>
                <p class="font-medium text-green-800">Success</p>
                <p class="text-sm text-green-700 mt-1">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <!-- Pest Alerts Table -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Alert Title
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Pest Type
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Affected Crops
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Severity
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date Reported
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($pests as $pest)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-red-100 flex items-center justify-center">
                                        <i class="fas fa-bug text-red-500"></i>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $pest->title }}</div>
                                        <div class="text-sm text-gray-500">{{ $pest->location ?? 'Multiple regions' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900 font-medium">{{ $pest->pest_name }}</div>
                                <div class="text-xs text-gray-500">{{ $pest->scientific_name ?? 'N/A' }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-wrap gap-1">
                                    @foreach(explode(',', $pest->affected_crops) as $crop)
                                        <span class="px-2 py-1 text-xs bg-gray-100 text-gray-800 rounded-full">
                                            {{ trim($crop) }}
                                        </span>
                                    @endforeach
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="mr-2 w-4 h-4 rounded-full 
                                        @if($pest->severity === 'low') bg-green-500
                                        @elseif($pest->severity === 'medium') bg-yellow-500
                                        @else bg-red-500
                                        @endif">
                                    </div>
                                    <span class="text-sm font-medium 
                                        @if($pest->severity === 'low') text-green-800
                                        @elseif($pest->severity === 'medium') text-yellow-800
                                        @else text-red-800
                                        @endif">
                                        {{ ucfirst($pest->severity) }}
                                    </span>
                                </div>
                                <div class="mt-1 w-full bg-gray-200 rounded-full h-1.5">
                                    <div class="h-1.5 rounded-full 
                                        @if($pest->severity === 'low') bg-green-500 w-1/3
                                        @elseif($pest->severity === 'medium') bg-yellow-500 w-2/3
                                        @else bg-red-500 w-full
                                        @endif">
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    @if($pest->status === 'active') bg-green-100 text-green-800
                                    @else bg-gray-100 text-gray-800
                                    @endif">
                                    {{ ucfirst($pest->status) }}
                                    @if($pest->status === 'active')
                                        <i class="fas fa-check-circle ml-1 text-green-500"></i>
                                    @else
                                        <i class="fas fa-times-circle ml-1 text-gray-500"></i>
                                    @endif
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $pest->alert_date->format('M d, Y') }}</div>
                                <div class="text-xs text-gray-500">{{ $pest->alert_date->diffForHumans() }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end items-center space-x-3">
                                    <a href="{{ route('admin.pests.show', $pest) }}" 
                                       class="text-blue-600 hover:text-blue-900 px-2"
                                       title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.pests.edit', $pest) }}" 
                                       class="text-indigo-600 hover:text-indigo-900 px-2"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.pests.destroy', $pest) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-600 hover:text-red-900 px-2"
                                                title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this pest alert?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                <div class="flex flex-col items-center justify-center py-12">
                                    <i class="fas fa-bug text-4xl text-gray-300 mb-3"></i>
                                    <p class="text-lg font-medium text-gray-500">No pest alerts found</p>
                                    <p class="text-sm text-gray-400 mt-1">Create your first pest alert to notify farmers</p>
                                    <a href="{{ route('admin.pests.create') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                                        <i class="fas fa-plus-circle mr-2"></i>
                                        Create Alert
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination and Summary -->
    <div class="flex flex-col md:flex-row justify-between items-center mt-6">
        <div class="text-sm text-gray-500 mb-4 md:mb-0">
            Showing {{ $pests->firstItem() }} to {{ $pests->lastItem() }} of {{ $pests->total() }} alerts
        </div>
        <div class="bg-white px-4 py-3 rounded-lg shadow-sm">
            {{ $pests->links() }}
        </div>
    </div>
</div>
@endsection