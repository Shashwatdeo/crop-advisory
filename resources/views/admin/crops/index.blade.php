@extends('admin.layout')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Crop Management</h1>
            <p class="text-gray-600 mt-1">Manage all crops in the advisory system</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
            <a href="{{ route('admin.crops.create') }}" 
               class="inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-blue-600 to-blue-500 text-white rounded-lg hover:from-blue-700 hover:to-blue-600 transition-all shadow-md">
                <i class="fas fa-plus-circle mr-2"></i>
                Add New Crop
            </a>
            <div class="relative">
                <input type="text" placeholder="Search crops..." 
                       class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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

    <!-- Crops Table -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Crop Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Season
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Water Needs
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Temperature
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($crops as $crop)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-100 flex items-center justify-center">
                                        <i class="fas fa-seedling text-gray-500"></i>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $crop->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $crop->variety ?? 'Standard' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    @if($crop->season === 'Kharif') bg-green-100 text-green-800
                                    @elseif($crop->season === 'Rabi') bg-blue-100 text-blue-800
                                    @elseif($crop->season === 'Zaid') bg-yellow-100 text-yellow-800
                                    @else bg-gray-100 text-gray-800
                                    @endif">
                                    {{ $crop->season }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-24">
                                        <div class="relative pt-1">
                                            <div class="flex items-center justify-between">
                                                <div>
                                                    <span class="text-xs font-semibold inline-block 
                                                        @if($crop->water_requirement === 'High') text-blue-600
                                                        @elseif($crop->water_requirement === 'Moderate') text-yellow-600
                                                        @else text-gray-600
                                                        @endif">
                                                        {{ $crop->water_requirement }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="overflow-hidden h-2 mb-4 text-xs flex rounded 
                                                @if($crop->water_requirement === 'High') bg-blue-200
                                                @elseif($crop->water_requirement === 'Moderate') bg-yellow-200
                                                @else bg-gray-200
                                                @endif">
                                                <div style="width: 
                                                    @if($crop->water_requirement === 'High') 100%
                                                    @elseif($crop->water_requirement === 'Moderate') 60%
                                                    @else 30%
                                                    @endif" 
                                                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center 
                                                    @if($crop->water_requirement === 'High') bg-blue-500
                                                    @elseif($crop->water_requirement === 'Moderate') bg-yellow-500
                                                    @else bg-gray-500
                                                    @endif">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex items-center">
                                    <i class="fas fa-temperature-low mr-2 text-gray-400"></i>
                                    {{ $crop->temperature_range }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    @if($crop->status === 'Active') bg-green-100 text-green-800
                                    @else bg-gray-100 text-gray-800
                                    @endif">
                                    {{ $crop->status ?? 'Active' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end items-center space-x-3">
                                    <a href="{{ route('admin.crops.show', $crop) }}" 
                                       class="text-blue-600 hover:text-blue-900 px-2"
                                       title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.crops.edit', $crop) }}" 
                                       class="text-indigo-600 hover:text-indigo-900 px-2"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.crops.destroy', $crop) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-600 hover:text-red-900 px-2"
                                                title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this crop?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                <div class="flex flex-col items-center justify-center py-8">
                                    <i class="fas fa-seedling text-4xl text-gray-300 mb-3"></i>
                                    <p class="text-lg font-medium text-gray-500">No crops found</p>
                                    <p class="text-sm text-gray-400 mt-1">Add your first crop to get started</p>
                                    <a href="{{ route('admin.crops.create') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                        <i class="fas fa-plus-circle mr-2"></i>
                                        Add New Crop
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
            Showing {{ $crops->firstItem() }} to {{ $crops->lastItem() }} of {{ $crops->total() }} crops
        </div>
        <div class="bg-white px-4 py-3 rounded-lg shadow-sm">
            {{ $crops->links() }}
        </div>
    </div>
</div>
@endsection