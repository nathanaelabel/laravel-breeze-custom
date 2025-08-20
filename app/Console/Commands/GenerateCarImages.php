<?php

namespace App\Console\Commands;

use App\Models\Car;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class GenerateCarImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cars:generate-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate placeholder car images for all cars in database';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $cars = Car::all();

        if ($cars->isEmpty()) {
            $this->info('No cars found in database.');

            return Command::SUCCESS;
        }

        $this->info("Found {$cars->count()} cars. Generating images...");

        $bar = $this->output->createProgressBar($cars->count());
        $bar->start();

        foreach ($cars as $car) {
            try {
                $this->generateImageForCar($car);
                $bar->advance();
            } catch (\Exception $e) {
                $this->error("Failed to generate image for car {$car->id}: ".$e->getMessage());
            }
        }

        $bar->finish();
        $this->newLine();
        $this->info('Car images generated successfully!');

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
        // 800x600 resolution, specific seed for consistency
        $imageUrl = "https://picsum.photos/seed/{$seed}/800/600";

        try {
            // Download the image
            $response = Http::timeout(30)->get($imageUrl);

            if ($response->successful()) {
                // Create filename
                $filename = 'cars/'.$car->id.'_'.time().'.jpg';

                // Store the image
                Storage::disk('public')->put($filename, $response->body());

                // Update car record
                $car->update(['photo' => $filename]);
            }
        } catch (\Exception $e) {
            // Fallback: use a simple placeholder URL that we store as reference
            $car->update(['photo' => 'https://via.placeholder.com/800x600/3B82F6/FFFFFF?text='.urlencode($car->make_model)]);
        }
    }
}
