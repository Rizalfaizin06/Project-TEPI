<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'avatar' => $this->faker->randomElement(['/images/avatars/mina.jpg', '/images/avatars/tulus.jpg']), // Generate random avatar URLs
            // 'avatar' => $this->faker->imageUrl(250, 250), // Generate random avatar URLs
            'NIM' => $this->faker->unique()->numerify('##########'), // Unique student IDs
            'email' => $this->faker->unique()->safeEmail,
            'rfid' => $this->faker->numerify('################'), // Unique RFID tags

        ];
    }
}
