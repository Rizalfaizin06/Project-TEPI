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
            'title' => 'Lab ' . $this->faker->sentence(1),  // Ensure unique emails
            'description' => $this->faker->realText(200),    // Generate realistic descriptions
            'picture' => $this->faker->imageUrl(640, 480),  // Create placeholder images
            'status' => $this->faker->boolean,              // Randomize status

        ];
    }
}
