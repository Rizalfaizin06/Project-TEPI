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
            'title' => $this->faker->randomElement(['Lab Pemrograman', 'Lab Multimedia', 'Lab Bahasa']),
            'description' => $this->faker->realText(200),
            // 'picture' => $this->faker->imageUrl(640, 480),
            'picture' => $this->faker->randomElement(['/images/rooms/Lab-202.jpg', '/images/rooms/Lab-203.jpg', '/images/rooms/Lab-Bahasa.png']),
            'status' => $this->faker->boolean,

        ];
    }
}
