<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->randomElement(['Lab Pemrograman', 'Lab Multimedia', 'Lab Bahasa']),  // Ensure unique emails
            'description' => $this->faker->realText(200),    // Generate realistic descriptions
            // 'picture' => $this->faker->imageUrl(640, 480),  // Create placeholder images
            'picture' => $this->faker->randomElement(['/images/rooms/Lab-202.jpg', '/images/rooms/Lab-203.jpg', '/images/rooms/Lab-Bahasa.png']),  // Create placeholder images
            'status' => $this->faker->boolean,              // Randomize status

        ];
    }
}
