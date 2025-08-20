<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('My Cars') }}
            </h2>
            <x-primary-button>
                <a href="{{ route('cars.create') }}" class="text-white no-underline">
                    {{ __('Add New Car') }}
                </a>
            </x-primary-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if ($cars->count() > 0)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                            @foreach ($cars as $car)
                                <div class="border border-gray-200 rounded-lg p-4">
                                    @if ($car->photo)
                                        <img src="{{ asset('storage/' . $car->photo) }}" alt="{{ $car->make_model }}" class="w-full h-48 object-cover rounded-lg mb-4">
                                    @else
                                        <div class="w-full h-48 bg-gray-200 rounded-lg mb-4 flex items-center justify-center">
                                            <span class="text-gray-500">No Photo</span>
                                        </div>
                                    @endif
                                    
                                    <h3 class="font-semibold text-lg">{{ $car->make_model }}</h3>
                                    <p class="text-gray-600 mb-2">{{ $car->year }}</p>
                                    <p class="text-gray-700 mb-2 truncate">{{ Str::limit($car->description, 100) }}</p>
                                    <p class="font-bold text-green-600 mb-4">${{ number_format($car->price) }}</p>
                                    
                                    <div class="flex gap-2">
                                        <a href="{{ route('cars.show', $car) }}" class="text-blue-600 hover:text-blue-800">View</a>
                                        <a href="{{ route('cars.edit', $car) }}" class="text-yellow-600 hover:text-yellow-800">Edit</a>
                                        <form action="{{ route('cars.destroy', $car) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this car?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 text-center">
                        <p class="mb-4">You haven't added any cars yet.</p>
                        <x-primary-button>
                            <a href="{{ route('cars.create') }}" class="text-white no-underline">
                                {{ __('Add Your First Car') }}
                            </a>
                        </x-primary-button>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>