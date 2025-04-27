<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Crop Advisory</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="hidden md:flex md:flex-shrink-0">
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
                           class="group flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <i class="fas fa-tachometer-alt mr-3 {{ request()->routeIs('admin.dashboard') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}"></i>
                            Dashboard
                        </a>
                        <a href="{{ route('admin.crops.index') }}" 
                           class="group flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('admin.crops.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <i class="fas fa-seedling mr-3 {{ request()->routeIs('admin.crops.*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}"></i>
                            Manage Crops
                        </a>
                        <a href="{{ route('admin.pests.index') }}" 
                           class="group flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('admin.pests.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <i class="fas fa-bug mr-3 {{ request()->routeIs('admin.pests.*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}"></i>
                            Pest Alerts
                        </a>
                        <a href="{{ route('admin.weather.index') }}" 
                           class="group flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('admin.weather.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <i class="fas fa-cloud-sun-rain mr-3 {{ request()->routeIs('admin.weather.*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}"></i>
                            Weather Alerts
                        </a>
                        <a href="{{ route('admin.users.index') }}" 
                           class="group flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('admin.users.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <i class="fas fa-users mr-3 {{ request()->routeIs('admin.users.*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}"></i>
                            Manage Users
                        </a>
                    </nav>
                </div>
                <div class="flex-shrink-0 flex border-t border-gray-200 p-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                <span class="text-blue-600 font-medium">{{ substr(auth()->user()->name, 0, 1) }}</span>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-700">{{ auth()->user()->name }}</p>
                            <form method="POST" action="{{ route('logout') }}" class="mt-1">
                                @csrf
                                <button type="submit" class="text-xs text-gray-500 hover:text-gray-700">
                                    <i class="fas fa-sign-out-alt mr-1"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main content -->
        <div class="flex flex-col w-0 flex-1 overflow-hidden">
            <div class="md:hidden pl-1 pt-1 sm:pl-3 sm:pt-3">
                <button type="button" class="-ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open sidebar</span>
                    <i class="fas fa-bars h-6 w-6"></i>
                </button>
            </div>
            
            <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
                <div class="py-6">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Mobile menu -->
    <div class="md:hidden hidden" id="mobile-menu">
        <div class="fixed inset-0 flex z-40">
            <div class="fixed inset-0 bg-gray-600 bg-opacity-75" aria-hidden="true"></div>
            <div class="relative flex-1 flex flex-col max-w-xs w-full bg-white">
                <div class="absolute top-0 right-0 -mr-12 pt-2">
                    <button type="button" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        <span class="sr-only">Close sidebar</span>
                        <i class="fas fa-times h-6 w-6 text-white"></i>
                    </button>
                </div>
                <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
                    <div class="flex-shrink-0 flex items-center px-4">
                        <div class="flex items-center">
                            <i class="fas fa-leaf text-blue-600 text-2xl mr-2"></i>
                            <span class="text-blue-600 text-xl font-semibold">Crop Advisory</span>
                        </div>
                    </div>
                    <nav class="mt-5 px-2 space-y-1">
                        <a href="{{ route('admin.dashboard') }}" 
                           class="group flex items-center px-4 py-3 text-base font-medium rounded-md {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <i class="fas fa-tachometer-alt mr-3 {{ request()->routeIs('admin.dashboard') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}"></i>
                            Dashboard
                        </a>
                        <a href="{{ route('admin.crops.index') }}" 
                           class="group flex items-center px-4 py-3 text-base font-medium rounded-md {{ request()->routeIs('admin.crops.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <i class="fas fa-seedling mr-3 {{ request()->routeIs('admin.crops.*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}"></i>
                            Manage Crops
                        </a>
                        <a href="{{ route('admin.pests.index') }}" 
                           class="group flex items-center px-4 py-3 text-base font-medium rounded-md {{ request()->routeIs('admin.pests.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <i class="fas fa-bug mr-3 {{ request()->routeIs('admin.pests.*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}"></i>
                            Pest Alerts
                        </a>
                        <a href="{{ route('admin.weather.index') }}" 
                           class="group flex items-center px-4 py-3 text-base font-medium rounded-md {{ request()->routeIs('admin.weather.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <i class="fas fa-cloud-sun-rain mr-3 {{ request()->routeIs('admin.weather.*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}"></i>
                            Weather Alerts
                        </a>
                        <a href="{{ route('admin.users.index') }}" 
                           class="group flex items-center px-4 py-3 text-base font-medium rounded-md {{ request()->routeIs('admin.users.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <i class="fas fa-users mr-3 {{ request()->routeIs('admin.users.*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-gray-500' }}"></i>
                            Manage Users
                        </a>
                    </nav>
                </div>
                <div class="flex-shrink-0 flex border-t border-gray-200 p-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                <span class="text-blue-600 font-medium">{{ substr(auth()->user()->name, 0, 1) }}</span>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-base font-medium text-gray-700">{{ auth()->user()->name }}</p>
                            <form method="POST" action="{{ route('logout') }}" class="mt-1">
                                @csrf
                                <button type="submit" class="text-sm text-gray-500 hover:text-gray-700">
                                    <i class="fas fa-sign-out-alt mr-1"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-shrink-0 w-14"></div>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.querySelector('[aria-controls="mobile-menu"]');
        const mobileMenu = document.getElementById('mobile-menu');
        const closeButton = mobileMenu.querySelector('button');

        if (mobileMenuButton) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.remove('hidden');
            });
        }

        if (closeButton) {
            closeButton.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        }
    </script>
</body>
</html> 