<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Property;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Property::class;
    public function definition(): array
    {

        $defaultImages = [
            "properties/WcDYI6xUPgykfKiOmLgDJ4Bch7nuGtx2c2ilvF7k.png",
            "properties/k1rvd5M5XV3ztB0uXj7jUFngDAv5O4q5tXvjpsP8.png",
            "properties/eeOIglj980Zr9jg3LJ503zX2EpqLtkt5WG61qZWc.png",
        ];
        return [
            'name' => $this->faker->name,
            "description" => $this->faker->text,
            "price" => $this->faker->numberBetween(100, 1000),
            "category" => $this->faker->randomElement(["Apartment", "House", "Villa"]),
            "user_id" => $this->faker->numberBetween(1, 10),
            "rating" => $this->faker->numberBetween(1, 5),
            "location" => $this->faker->randomElement(["Baalbek", "Nabatieh", "South", "North", "Beirut"]),
            "area" => $this->faker->numberBetween(100, 1000),
            "bedrooms" => $this->faker->numberBetween(1, 5),
            "bathrooms" => $this->faker->numberBetween(1, 5),
            "parking_spaces" => $this->faker->numberBetween(1, 5),
            "furnished" => $this->faker->boolean,
            "booked" => $this->faker->boolean,
            "number_of_guests" => $this->faker->numberBetween(1, 8),
            "image" => null,
            'images' => json_encode($this->faker->randomElements($defaultImages, rand(1, 3))), // Randomly select 1-3 images
            "latitude" => $this->faker->latitude(33.8547, 35.7),
            "longitude" => $this->faker->longitude(35.8623, 36.6),

        ];
    }
}
