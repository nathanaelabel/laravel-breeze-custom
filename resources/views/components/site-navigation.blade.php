<nav x-data="{ open: false }" class="bg-white/90 backdrop-blur-sm shadow-lg border-b border-indigo-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <div class="flex items-center gap-2">
                    <a href="/" class="flex items-center gap-2">
                        <x-application-logo class="w-8 h-8" />
                        <h1 class="text-xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Car Marketplace</h1>
                    </a>
                </div>
            </div>
            
            <div class="flex items-center gap-4">
                @auth
                    <!-- Authenticated User Links -->
                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-indigo-600 font-medium transition-colors">Dashboard</a>
                    <a href="{{ route('cars.index') }}" class="text-gray-700 hover:text-indigo-600 font-medium transition-colors">My Cars</a>
                    
                    <!-- User Section -->
                    <div class="hidden sm:flex sm:items-center sm:ms-2 sm:space-x-6">
                        <!-- User Name -->
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center">
                                <span class="text-white text-sm font-semibold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                            <span class="text-gray-700 font-medium">{{ Auth::user()->name }}</span>
                        </div>

                        <!-- Profile Link -->
                        <a href="{{ route('profile.edit') }}" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">
                            Profile
                        </a>

                        <!-- Logout Form -->
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-700 hover:text-red-600 font-medium transition-colors">
                                Logout
                            </button>
                        </form>
                    </div>
                @else
                    <!-- Guest Links -->
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-600 font-medium transition-colors">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-2 rounded-full hover:shadow-lg hover:scale-105 transition-all duration-200 font-medium">Register</a>
                    @endif
                @endauth
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    @auth
        <div x-data="{ mobileOpen: false }" class="sm:hidden">
            <!-- Mobile menu button -->
            <div class="flex items-center justify-end px-4 py-2">
                <button @click="mobileOpen = !mobileOpen" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': mobileOpen, 'inline-flex': !mobileOpen }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !mobileOpen, 'inline-flex': mobileOpen }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Mobile menu panel -->
            <div x-show="mobileOpen" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-100"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="border-t border-gray-200/50 bg-white/95 backdrop-blur-sm"
                 style="display: none;">
                
                <!-- Mobile Navigation Links -->
                <div class="pt-2 pb-3 space-y-1 px-4">
                    <a href="{{ route('dashboard') }}" class="block py-2 text-gray-700 hover:text-indigo-600 font-medium">Dashboard</a>
                    <a href="{{ route('cars.index') }}" class="block py-2 text-gray-700 hover:text-indigo-600 font-medium">My Cars</a>
                </div>

                <!-- Mobile User Section -->
                <div class="pt-4 pb-3 border-t border-gray-200/50 px-4">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center">
                            <span class="text-white font-semibold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        </div>
                        <div>
                            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <a href="{{ route('profile.edit') }}" class="block py-2 text-gray-700 hover:text-blue-600 font-medium">Profile</a>
                        
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block py-2 text-gray-700 hover:text-red-600 font-medium text-left w-full">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endauth
</nav>