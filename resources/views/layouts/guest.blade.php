<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Car Marketplace</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-brand-gradient font-sans antialiased min-h-screen text-brand-dark">
    <!-- Unified Navigation -->
    <x-site-navigation />

    <!-- Auth Card -->
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <!-- Decorative elements -->
        <div
            class="absolute top-20 left-10 w-20 h-20 bg-gradient-to-r from-[#1C4D8D] to-[#4988C4] rounded-full opacity-20 animate-pulse">
        </div>
        <div
            class="absolute bottom-20 right-10 w-16 h-16 bg-gradient-to-r from-[#0F2854] to-[#1C4D8D] rounded-full opacity-20 animate-pulse delay-1000">
        </div>
        <div
            class="absolute top-40 right-20 w-12 h-12 bg-gradient-to-r from-[#4988C4] to-[#BDE8F5] rounded-full opacity-20 animate-pulse delay-500">
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-8 py-8 bg-white/90 backdrop-blur-sm shadow-2xl overflow-hidden sm:rounded-2xl border border-white/20 relative">
            <div class="absolute inset-0 bg-gradient-to-br from-white/80 to-white/40 rounded-2xl"></div>
            <div class="relative">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>
