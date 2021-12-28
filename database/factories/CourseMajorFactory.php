<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseMajorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->jobTitle(),
            'details' => Str::limit($this->faker->paragraphs(3, true), 255, ''),
            'is_enabled' => $this->faker->randomElement([1, 0]),
        ];
    }
}
