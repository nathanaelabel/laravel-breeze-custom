<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl bg-gradient-to-r from-[#0F2854] to-[#1C4D8D] bg-clip-text text-transparent">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div
                class="bg-white/90 backdrop-blur-sm overflow-hidden shadow-2xl sm:rounded-2xl border border-white/20 mb-8">
                <div class="p-8">
                    <div class="flex items-center gap-4 mb-6">
                        <div
                            class="w-12 h-12 bg-gradient-to-r from-[#0F2854] to-[#1C4D8D] rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900">Welcome back, {{ Auth::user()->name }}!</h3>
                            <p class="text-gray-600">Manage your car listings and explore the marketplace</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <a href="{{ route('cars.index') }}"
                            class="bg-gradient-to-r from-[#BDE8F5] to-[#4988C4]/15 p-6 rounded-xl hover:shadow-lg transition-all duration-200 group">
                            <div class="flex items-center gap-3 mb-3">
                                <div
                                    class="w-8 h-8 bg-[#BDE8F5] rounded-lg flex items-center justify-center group-hover:bg-[#4988C4]/20 transition-colors">
                                    <svg class="w-4 h-4 text-[#0F2854]" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd"
                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-900">My Cars</h4>
                            </div>
                            <p class="text-gray-600 text-sm">View and manage your car listings</p>
                        </a>

                        <a href="{{ route('cars.create') }}"
                            class="bg-gradient-to-r from-[#BDE8F5] to-[#4988C4]/15 p-6 rounded-xl hover:shadow-lg transition-all duration-200 group">
                            <div class="flex items-center gap-3 mb-3">
                                <div
                                    class="w-8 h-8 bg-[#4988C4]/15 rounded-lg flex items-center justify-center group-hover:bg-[#4988C4]/25 transition-colors">
                                    <svg class="w-4 h-4 text-[#1C4D8D]" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-900">Add Car</h4>
                            </div>
                            <p class="text-gray-600 text-sm">List a new car for sale</p>
                        </a>

                        <a href="/"
                            class="bg-gradient-to-r from-[#BDE8F5] to-[#4988C4]/15 p-6 rounded-xl hover:shadow-lg transition-all duration-200 group">
                            <div class="flex items-center gap-3 mb-3">
                                <div
                                    class="w-8 h-8 bg-[#BDE8F5] rounded-lg flex items-center justify-center group-hover:bg-[#4988C4]/20 transition-colors">
                                    <svg class="w-4 h-4 text-[#0F2854]" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" />
                                    </svg>
                                </div>
                                <h4 class="font-semibold text-gray-900">Browse Cars</h4>
                            </div>
                            <p class="text-gray-600 text-sm">Explore cars for sale</p>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Stats -->
            @php
                $userCarsCount = Auth::user()->cars()->count();
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div
                    class="bg-white/90 backdrop-blur-sm overflow-hidden shadow-xl rounded-2xl border border-[#BDE8F5]/60 p-6">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-[#BDE8F5] rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-[#0F2854]" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd"
                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-gray-900">{{ $userCarsCount }}</p>
                            <p class="text-gray-600 text-sm">Cars Listed</p>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white/90 backdrop-blur-sm overflow-hidden shadow-xl rounded-2xl border border-[#BDE8F5]/60 p-6">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-[#4988C4]/15 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-[#1C4D8D]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-gray-900">{{ $userCarsCount }}</p>
                            <p class="text-gray-600 text-sm">Active Listings</p>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white/90 backdrop-blur-sm overflow-hidden shadow-xl rounded-2xl border border-[#BDE8F5]/60 p-6">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-[#4988C4]/15 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-[#1C4D8D]" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-gray-900">0</p>
                            <p class="text-gray-600 text-sm">Views Today</p>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white/90 backdrop-blur-sm overflow-hidden shadow-xl rounded-2xl border border-[#BDE8F5]/60 p-6">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-[#BDE8F5] rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-[#0F2854]" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-gray-900">0</p>
                            <p class="text-gray-600 text-sm">Messages</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
