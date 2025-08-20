<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} - Car Marketplace</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 font-sans antialiased min-h-screen">
    <!-- Unified Navigation -->
    <x-site-navigation />

    <!-- Hero Section -->
    <div class="relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600/10 to-purple-600/10"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="text-center">
                <div class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-100 to-purple-100 px-4 py-2 rounded-full mb-6">
                    <span class="w-2 h-2 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full animate-pulse"></span>
                    <span class="text-sm font-medium text-gray-700">Latest Cars Available</span>
                </div>
                <h1 class="text-5xl md:text-6xl font-bold tracking-tight mb-6">
                    <span class="bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 bg-clip-text text-transparent">
                        Find Your Perfect Car
                    </span>
                </h1>
                <p class="mt-6 text-xl leading-8 text-gray-600 max-w-2xl mx-auto">
                    Browse through our curated selection of quality cars for sale. From economy to luxury, find exactly what you're looking for.
                </p>
                <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#cars" class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-3 rounded-full hover:shadow-xl hover:scale-105 transition-all duration-200 font-semibold">
                        Browse Cars
                    </a>
                    @auth
                        <a href="{{ route('cars.create') }}" class="bg-white text-gray-700 px-8 py-3 rounded-full border-2 border-gray-200 hover:border-indigo-300 hover:shadow-lg transition-all duration-200 font-semibold">
                            Sell Your Car
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="bg-white text-gray-700 px-8 py-3 rounded-full border-2 border-gray-200 hover:border-indigo-300 hover:shadow-lg transition-all duration-200 font-semibold">
                            Start Selling
                        </a>
                    @endauth
                </div>
            </div>
        </div>
        
        <!-- Decorative elements -->
        <div class="absolute top-20 left-10 w-20 h-20 bg-gradient-to-r from-blue-400 to-purple-400 rounded-full opacity-20 animate-pulse"></div>
        <div class="absolute bottom-20 right-10 w-16 h-16 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full opacity-20 animate-pulse delay-1000"></div>
        <div class="absolute top-40 right-20 w-12 h-12 bg-gradient-to-r from-indigo-400 to-blue-400 rounded-full opacity-20 animate-pulse delay-500"></div>
    </div>

    <!-- Cars Grid -->
    <div id="cars" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        @if ($cars->count() > 0)
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 bg-clip-text text-transparent mb-4">
                    Featured Cars
                </h2>
                <p class="text-gray-600">Discover amazing deals from trusted sellers</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($cars as $car)
                    <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 border border-gray-100">
                        <div class="relative">
                            @if ($car->photo)
                                <img src="{{ asset('storage/' . $car->photo) }}" alt="{{ $car->make_model }}" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                            @else
                                <div class="w-full h-48 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                                    <div class="text-center">
                                        <svg class="w-12 h-12 text-gray-400 mx-auto mb-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-gray-500 text-sm">No Photo</span>
                                    </div>
                                </div>
                            @endif
                            <div class="absolute top-3 right-3 bg-white/90 backdrop-blur-sm px-2 py-1 rounded-full">
                                <span class="text-xs font-semibold text-gray-700">{{ $car->year }}</span>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <h3 class="font-bold text-lg text-gray-900 mb-2 line-clamp-1">{{ $car->make_model }}</h3>
                            <div class="flex items-center gap-2 mb-3">
                                <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-gray-600 text-sm">{{ $car->year }} Model</span>
                            </div>
                            
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-2xl font-bold bg-gradient-to-r from-green-600 to-emerald-600 bg-clip-text text-transparent">
                                    ${{ number_format($car->price) }}
                                </span>
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <span class="text-sm text-gray-500">Featured</span>
                                </div>
                            </div>
                            
                            <a href="mailto:{{ $car->user->email }}?subject=Interested in your {{ $car->make_model }}&body=Hi, I'm interested in your {{ $car->year }} {{ $car->make_model }} listed for ${{ number_format($car->price) }}. Please let me know if it's still available." 
                               class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white px-4 py-3 rounded-xl hover:shadow-lg hover:scale-[1.02] transition-all duration-200 inline-block text-center font-semibold group">
                                <span class="flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4 group-hover:scale-110 transition-transform duration-200" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                    </svg>
                                    Email Owner
                                </span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-20">
                <div class="bg-white rounded-3xl shadow-xl p-12 max-w-md mx-auto">
                    <div class="w-20 h-20 bg-gradient-to-r from-blue-100 to-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">No cars available yet</h3>
                    <p class="text-gray-600 mb-8">Be the first to list your car and start connecting with buyers!</p>
                    @auth
                        <a href="{{ route('cars.create') }}" class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-3 rounded-full hover:shadow-lg hover:scale-105 transition-all duration-200 font-semibold inline-block">
                            Add Your Car
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-3 rounded-full hover:shadow-lg hover:scale-105 transition-all duration-200 font-semibold inline-block">
                            Register to List Your Car
                        </a>
                    @endauth
                </div>
            </div>
        @endif
    </div>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-gray-900 to-gray-800 text-white mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">Car Marketplace</h3>
                    </div>
                    <p class="text-gray-300">Find your perfect car or sell your current vehicle with ease. Connect with trusted buyers and sellers in your area.</p>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#cars" class="text-gray-300 hover:text-white transition-colors">Browse Cars</a></li>
                        @auth
                            <li><a href="{{ route('cars.index') }}" class="text-gray-300 hover:text-white transition-colors">My Cars</a></li>
                            <li><a href="{{ route('cars.create') }}" class="text-gray-300 hover:text-white transition-colors">Sell Car</a></li>
                        @else
                            <li><a href="{{ route('register') }}" class="text-gray-300 hover:text-white transition-colors">Register</a></li>
                            <li><a href="{{ route('login') }}" class="text-gray-300 hover:text-white transition-colors">Login</a></li>
                        @endauth
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Get Started</h4>
                    <p class="text-gray-300 mb-4">Ready to buy or sell? Join our community today!</p>
                    @guest
                        <a href="{{ route('register') }}" class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-2 rounded-full hover:shadow-lg hover:scale-105 transition-all duration-200 font-semibold inline-block">
                            Join Now
                        </a>
                    @endguest
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <p class="text-gray-400">&copy; {{ date('Y') }} Car Marketplace. All rights reserved. Built with ❤️ using Laravel 12.</p>
            </div>
        </div>
    </footer>
</body>
</html>