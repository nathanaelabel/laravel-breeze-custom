<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $makes = ['Toyota Camry', 'Honda Accord', 'Ford Mustang', 'BMW X3', 'Audi A4', 'Mercedes C-Class', 'Tesla Model 3', 'Volkswagen Golf', 'Subaru Outback', 'Mazda CX-5'];

        return [
            'user_id' => User::factory(),
            'make_model' => fake()->randomElement($makes),
            'description' => fake()->paragraph(3),
            'year' => fake()->numberBetween(2010, 2024),
            'price' => fake()->numberBetween(5000, 75000),
            'photo' => null, // Will be populated by cars:generate-images command
        ];
    }
}
