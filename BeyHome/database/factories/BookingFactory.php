<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Booking;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Booking::class;
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'property_id' => $this->faker->numberBetween(1, 10),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'cancelled']),
            'total_price' => $this->faker->randomFloat(2, 100, 1000),
        ];
    }
}
