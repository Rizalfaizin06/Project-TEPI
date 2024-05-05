<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FacilityCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category' => $this->faker->randomElement(['ac', 'computer', 'electrical_plug', 'headphone', 'lan', 'mic', 'projector', 'speaker', 'webcam', 'whiteboard', 'wifi']),
        ];
    }
}
