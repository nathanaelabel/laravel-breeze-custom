<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Car') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('cars.update', $car) }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PATCH')

                        <div>
                            <x-input-label for="make_model" :value="__('Make & Model')" />
                            <x-text-input id="make_model" class="block mt-1 w-full" type="text" name="make_model" :value="old('make_model', $car->make_model)" required autofocus />
                            <x-input-error :messages="$errors->get('make_model')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="year" :value="__('Year')" />
                            <x-text-input id="year" class="block mt-1 w-full" type="number" name="year" :value="old('year', $car->year)" required min="1900" :max="date('Y') + 1" />
                            <x-input-error :messages="$errors->get('year')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="price" :value="__('Price ($)')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price', $car->price)" required min="0" />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" name="description" rows="4" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>{{ old('description', $car->description) }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        @if ($car->photo)
                            <div>
                                <x-input-label :value="__('Current Photo')" />
                                <img src="{{ asset('storage/' . $car->photo) }}" alt="{{ $car->make_model }}" class="mt-2 w-32 h-32 object-cover rounded-lg">
                            </div>
                        @endif

                        <div>
                            <x-input-label for="photo" :value="__('New Photo (optional)')" />
                            <input id="photo" class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" type="file" name="photo" accept="image/*" />
                            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end gap-4">
                            <x-secondary-button>
                                <a href="{{ route('cars.index') }}" class="no-underline text-gray-700">{{ __('Cancel') }}</a>
                            </x-secondary-button>
                            <x-primary-button>{{ __('Update Car') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>