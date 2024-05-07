<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentGroupCategorieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category' => $this->faker->randomElement(['TI 21', 'SI 21', 'Management 21', 'Psikologi 21', 'Perpajakan 21']),
        ];
    }
}
