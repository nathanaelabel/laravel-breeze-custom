<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $car->make_model }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            @if ($car->photo)
                                <img src="{{ asset('storage/' . $car->photo) }}" alt="{{ $car->make_model }}" class="w-full h-64 object-cover rounded-lg">
                            @else
                                <div class="w-full h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                                    <span class="text-gray-500">No Photo Available</span>
                                </div>
                            @endif
                        </div>

                        <div class="space-y-4">
                            <div>
                                <h3 class="font-semibold text-lg text-gray-700">Make & Model</h3>
                                <p class="text-xl">{{ $car->make_model }}</p>
                            </div>

                            <div>
                                <h3 class="font-semibold text-lg text-gray-700">Year</h3>
                                <p class="text-xl">{{ $car->year }}</p>
                            </div>

                            <div>
                                <h3 class="font-semibold text-lg text-gray-700">Price</h3>
                                <p class="text-2xl font-bold text-green-600">${{ number_format($car->price) }}</p>
                            </div>

                            <div>
                                <h3 class="font-semibold text-lg text-gray-700">Description</h3>
                                <p class="text-gray-800 leading-relaxed">{{ $car->description }}</p>
                            </div>

                            <div class="pt-4">
                                <div class="flex gap-4">
                                    <a href="{{ route('cars.edit', $car) }}" class="inline-flex items-center px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold rounded-lg transition duration-150">
                                        Edit Car
                                    </a>
                                    <a href="{{ route('cars.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-lg transition duration-150">
                                        Back to My Cars
                                    </a>
                                    <form action="{{ route('cars.destroy', $car) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this car?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-lg transition duration-150">
                                            Delete Car
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>