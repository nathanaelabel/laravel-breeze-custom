<?php

namespace App\Console\Commands;

use App\Models\Car;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class GenerateSingleCarImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cars:generate-image {car : The ID of the car}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate placeholder image for a specific car';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $carId = $this->argument('car');
        $car = Car::find($carId);

        if (! $car) {
            $this->error("Car with ID {$carId} not found.");

            return Command::FAILURE;
        }

        $this->info("Generating image for {$car->make_model} ({$car->year})...");

        try {
            $this->generateImageForCar($car);
            $this->info('Image generated successfully!');
            $this->line("Photo path: {$car->fresh()->photo}");
        } catch (\Exception $e) {
            $this->error('Failed to generate image: '.$e->getMessage());

            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }

    private function generateImageForCar(Car $car): void
    {
        // Remove old photo if it exists
        if ($car->photo && Storage::disk('public')->exists($car->photo)) {
            Storage::disk('public')->delete($car->photo);
        }

        // Generate a seed based on car model for consistent images
        $seed = crc32($car->make_model.$car->year);

        // Use Lorem Picsum for high-quality placeholder images
        $imageUrl = "https://picsum.photos/seed/{$seed}/800/600";

        try {
            $response = Http::timeout(30)->get($imageUrl);

            if ($response->successful()) {
                $filename = 'cars/'.$car->id.'_'.time().'.jpg';
                Storage::disk('public')->put($filename, $response->body());
                $car->update(['photo' => $filename]);
            }
        } catch (\Exception $e) {
            $car->update(['photo' => 'https://via.placeholder.com/800x600/3B82F6/FFFFFF?text='.urlencode($car->make_model)]);
            throw $e;
        }
    }
}
