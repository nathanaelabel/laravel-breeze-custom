<?php

use App\Models\Car;
use App\Models\User;

beforeEach(function () {
    $this->user = User::factory()->create();
});

it('can create a car', function () {
    $carData = [
        'make_model' => 'Toyota Corolla',
        'description' => 'Reliable daily driver',
        'year' => 2020,
        'price' => 15000,
    ];

    $car = $this->user->cars()->create($carData);

    expect($car)->toBeInstanceOf(Car::class);
    expect($car->make_model)->toBe('Toyota Corolla');
    expect($car->description)->toBe('Reliable daily driver');
    expect($car->year)->toBe(2020);
    expect($car->price)->toBe(15000);
    expect($car->user_id)->toBe($this->user->id);
});

it('can read a car', function () {
    $car = Car::factory()->for($this->user)->create([
        'make_model' => 'Honda Civic',
        'year' => 2019,
        'price' => 12000,
    ]);

    $retrievedCar = Car::find($car->id);

    expect($retrievedCar)->not->toBeNull();
    expect($retrievedCar->make_model)->toBe('Honda Civic');
    expect($retrievedCar->year)->toBe(2019);
    expect($retrievedCar->price)->toBe(12000);
    expect($retrievedCar->user_id)->toBe($this->user->id);
});

it('can update a car', function () {
    $car = Car::factory()->for($this->user)->create([
        'make_model' => 'Ford Focus',
        'price' => 10000,
    ]);

    $car->update([
        'make_model' => 'Ford Focus ST',
        'price' => 12000,
    ]);

    expect($car->fresh()->make_model)->toBe('Ford Focus ST');
    expect($car->fresh()->price)->toBe(12000);
});

it('can delete a car', function () {
    $car = Car::factory()->for($this->user)->create();

    expect(Car::count())->toBe(1);

    $car->delete();

    expect(Car::count())->toBe(0);
    expect(Car::find($car->id))->toBeNull();
});

it('belongs to a user', function () {
    $car = Car::factory()->for($this->user)->create();

    expect($car->user)->toBeInstanceOf(User::class);
    expect($car->user->id)->toBe($this->user->id);
});

it('user can have multiple cars', function () {
    Car::factory()->for($this->user)->count(3)->create();

    expect($this->user->cars()->count())->toBe(3);
    expect($this->user->cars)->toHaveCount(3);
});

it('requires user_id when creating a car', function () {
    expect(function () {
        Car::create([
            'make_model' => 'BMW X5',
            'description' => 'Luxury SUV',
            'year' => 2021,
            'price' => 45000,
        ]);
    })->toThrow(\Illuminate\Database\QueryException::class);
});

it('can filter cars by year', function () {
    Car::factory()->for($this->user)->create(['year' => 2020]);
    Car::factory()->for($this->user)->create(['year' => 2021]);
    Car::factory()->for($this->user)->create(['year' => 2022]);

    $recentCars = Car::where('year', '>=', 2021)->get();

    expect($recentCars)->toHaveCount(2);
});

it('can filter cars by price range', function () {
    Car::factory()->for($this->user)->create(['price' => 10000]);
    Car::factory()->for($this->user)->create(['price' => 25000]);
    Car::factory()->for($this->user)->create(['price' => 50000]);

    $affordableCars = Car::where('price', '<=', 30000)->get();

    expect($affordableCars)->toHaveCount(2);
});

it('can order cars by price', function () {
    $expensive = Car::factory()->for($this->user)->create(['price' => 50000]);
    $cheap = Car::factory()->for($this->user)->create(['price' => 10000]);
    $medium = Car::factory()->for($this->user)->create(['price' => 25000]);

    $orderedCars = Car::orderBy('price')->get();

    expect($orderedCars->first()->id)->toBe($cheap->id);
    expect($orderedCars->last()->id)->toBe($expensive->id);
});

it('validates required fields', function (string $field) {
    $carData = [
        'make_model' => 'Toyota Prius',
        'description' => 'Hybrid vehicle',
        'year' => 2022,
        'price' => 20000,
    ];

    unset($carData[$field]);

    expect(function () use ($carData) {
        $this->user->cars()->create($carData);
    })->toThrow(\Illuminate\Database\QueryException::class);
})->with(['make_model', 'year', 'price']);

it('can update specific fields only', function () {
    $car = Car::factory()->for($this->user)->create([
        'make_model' => 'Nissan Altima',
        'description' => 'Sedan',
        'year' => 2018,
        'price' => 15000,
    ]);

    $car->update(['price' => 17000]);

    $updatedCar = $car->fresh();
    expect($updatedCar->price)->toBe(17000);
    expect($updatedCar->make_model)->toBe('Nissan Altima');
    expect($updatedCar->year)->toBe(2018);
});

it('can soft delete and restore a car if soft deletes are implemented', function () {
    $car = Car::factory()->for($this->user)->create();

    $carId = $car->id;
    $car->delete();

    if (method_exists($car, 'trashed')) {
        expect($car->trashed())->toBeTrue();

        $car->restore();
        expect($car->fresh()->trashed())->toBeFalse();
    } else {
        expect(Car::find($carId))->toBeNull();
    }
});

it('can count cars by user', function () {
    $user2 = User::factory()->create();

    Car::factory()->for($this->user)->count(2)->create();
    Car::factory()->for($user2)->count(3)->create();

    expect($this->user->cars()->count())->toBe(2);
    expect($user2->cars()->count())->toBe(3);
    expect(Car::count())->toBe(5);
});
