<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel - Crop Advisory</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Inter font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .sidebar {
            transition: all 0.3s ease;
        }
        .sidebar-item.active {
            background: linear-gradient(90deg, rgba(59, 130, 246, 0.1) 0%, rgba(59, 130, 246, 0) 100%);
            border-left: 4px solid #3b82f6;
        }
        .sidebar-item:hover:not(.active) {
            background-color: rgba(243, 244, 246, 0.5);
        }
        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .quick-action:hover {
            transform: translateY(-3px);
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="sidebar hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 border-r border-gray-200 bg-white">
                <div class="flex items-center h-16 flex-shrink-0 px-4 bg-blue-600">
                    <div class="flex items-center">
                        <i class="fas fa-leaf text-white text-2xl mr-2"></i>
                        <span class="text-white text-xl font-semibold">Crop Advisory</span>
                    </div>
                </div>
                <div class="flex-1 flex flex-col overflow-y-auto pt-5 pb-4">
                    <nav class="flex-1 px-2 space-y-1">
                        <a href="{{ route('admin.dashboard') }}" 
                           class="sidebar-item group flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('admin.dashboard') ? 'active text-blue-600' : 'text-gray-600 hover:text-gray-900' }}">
                            <i class="fas fa-tachometer-alt mr-3 {{ request()->routeIs('admin.dashboard') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}"></i>
                            Dashboard
                        </a>
                        <a href="{{ route('admin.crops.index') }}" 
                           class="sidebar-item group flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('admin.crops.*') ? 'active text-blue-600' : 'text-gray-600 hover:text-gray-900' }}">
                            <i class="fas fa-seedling mr-3 {{ request()->routeIs('admin.crops.*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}"></i>
                            Manage Crops
                        </a>
                        <a href="{{ route('admin.pests.index') }}" 
                           class="sidebar-item group flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('admin.pests.*') ? 'active text-blue-600' : 'text-gray-600 hover:text-gray-900' }}">
                            <i class="fas fa-bug mr-3 {{ request()->routeIs('admin.pests.*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}"></i>
                            Pest Alerts
                        </a>
                        <a href="{{ route('admin.weather.index') }}" 
                           class="sidebar-item group flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('admin.weather.*') ? 'active text-blue-600' : 'text-gray-600 hover:text-gray-900' }}">
                            <i class="fas fa-cloud-sun-rain mr-3 {{ request()->routeIs('admin.weather.*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}"></i>
                            Weather Alerts
                        </a>
                        <a href="{{ route('admin.users.index') }}" 
                           class="sidebar-item group flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('admin.users.*') ? 'active text-blue-600' : 'text-gray-600 hover:text-gray-900' }}">
                            <i class="fas fa-users mr-3 {{ request()->routeIs('admin.users.*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}"></i>
                            Manage Users
                        </a>
                    </nav>
                </div>
                <div class="p-4 border-t border-gray-200">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-user-circle text-gray-400 text-2xl"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-700">{{ auth()->user()->name }}</p>
                            <p class="text-xs font-medium text-gray-500">Administrator</p>
                        </div>
                        <div class="ml-auto">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-gray-500 hover:text-gray-700">
                                    <i class="fas fa-sign-out-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex-1 overflow-auto">
            <!-- Mobile header -->
            <div class="md:hidden bg-white shadow-sm">
                <div class="flex items-center justify-between px-4 py-3">
                    <div class="flex items-center">
                        <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                        <div class="ml-4 flex items-center">
                            <i class="fas fa-leaf text-blue-600 text-xl mr-2"></i>
                            <span class="text-lg font-semibold">Crop Advisory</span>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-gray-500 hover:text-gray-700">
                                <i class="fas fa-sign-out-alt text-xl"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <main class="p-6">
                <!-- Notifications -->
                @if(session('success'))
                    <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-r">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-check-circle text-green-500"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-green-700">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-circle text-red-500"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-red-700">{{ session('error') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <!-- Mobile sidebar (hidden by default) -->
    <div class="md:hidden fixed inset-0 z-40" x-show="sidebarOpen" style="display: none;">
        <div class="fixed inset-0 bg-gray-600 bg-opacity-75" @click="sidebarOpen = false"></div>
        <div class="relative flex flex-col w-72 max-w-xs bg-white">
            <div class="flex items-center h-16 px-4 bg-blue-600">
                <div class="flex items-center">
                    <i class="fas fa-leaf text-white text-2xl mr-2"></i>
                    <span class="text-white text-xl font-semibold">Crop Advisory</span>
                </div>
                <button class="ml-auto text-white" @click="sidebarOpen = false">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            <div class="flex-1 overflow-y-auto">
                <nav class="px-2 py-5 space-y-1">
                    <a href="{{ route('admin.dashboard') }}" 
                       class="sidebar-item group flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('admin.dashboard') ? 'active text-blue-600' : 'text-gray-600 hover:text-gray-900' }}">
                        <i class="fas fa-tachometer-alt mr-3 {{ request()->routeIs('admin.dashboard') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}"></i>
                        Dashboard
                    </a>
                    <a href="{{ route('admin.crops.index') }}" 
                       class="sidebar-item group flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('admin.crops.*') ? 'active text-blue-600' : 'text-gray-600 hover:text-gray-900' }}">
                        <i class="fas fa-seedling mr-3 {{ request()->routeIs('admin.crops.*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}"></i>
                        Manage Crops
                    </a>
                    <a href="{{ route('admin.pests.index') }}" 
                       class="sidebar-item group flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('admin.pests.*') ? 'active text-blue-600' : 'text-gray-600 hover:text-gray-900' }}">
                        <i class="fas fa-bug mr-3 {{ request()->routeIs('admin.pests.*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}"></i>
                        Pest Alerts
                    </a>
                    <a href="{{ route('admin.weather.index') }}" 
                       class="sidebar-item group flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('admin.weather.*') ? 'active text-blue-600' : 'text-gray-600 hover:text-gray-900' }}">
                        <i class="fas fa-cloud-sun-rain mr-3 {{ request()->routeIs('admin.weather.*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}"></i>
                        Weather Alerts
                    </a>
                    <a href="{{ route('admin.users.index') }}" 
                       class="sidebar-item group flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('admin.users.*') ? 'active text-blue-600' : 'text-gray-600 hover:text-gray-900' }}">
                        <i class="fas fa-users mr-3 {{ request()->routeIs('admin.users.*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}"></i>
                        Manage Users
                    </a>
                </nav>
            </div>
        </div>
    </div>

    <!-- Alpine.js for interactivity -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('sidebar', {
                open: false,
                toggle() {
                    this.open = !this.open
                }
            })
        })
    </script>
</body>
</html>